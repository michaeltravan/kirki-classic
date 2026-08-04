import KirkiSliderForm from './KirkiSliderForm';

const wpReactRender = ( target, reactNode, control ) => {
	if ( ! target ) {
		return;
	}

	// React 18+ root API. The root is cached on the control because calling
	// createRoot() more than once for the same container leaks a root (and warns)
	// on React 18, and unmountComponentAtNode() is removed in React 19.
	if ( wp.element && typeof wp.element.createRoot === 'function' ) {
		if ( control._kirkiRootTarget !== target ) {
			wpReactUnmount( target, control );
			control._kirkiRoot = wp.element.createRoot( target );
			control._kirkiRootTarget = target;
		}

		control._kirkiRoot.render( reactNode );
		return;
	}

	// Legacy React < 18 fallback.
	wp.element.render( reactNode, target );
};

const wpReactUnmount = ( target, control ) => {
	if ( control._kirkiRoot ) {
		control._kirkiRoot.unmount();
		control._kirkiRoot = null;
		control._kirkiRootTarget = null;
		return;
	}

	// Legacy React < 18 fallback.
	if ( target && wp.element && typeof wp.element.unmountComponentAtNode === 'function' ) {
		wp.element.unmountComponentAtNode( target );
	}
};

/**
 * KirkiSliderControl.
 *
 * Global objects brought:
 * - wp
 * - React
 * - ReactDOM
 *
 * @class
 * @augments wp.customize.Control
 * @augments wp.customize.Class
 */
const KirkiSliderControl = wp.customize.Control.extend({

	/**
	 * Initialize.
	 *
	 * @param {string} id - Control ID.
	 * @param {object} params - Control params.
	 */
	initialize: function (id, params) {
		const control = this;

		// Bind functions to this control context for passing as React props.
		control.setNotificationContainer = control.setNotificationContainer.bind(control);

		wp.customize.Control.prototype.initialize.call(control, id, params);

		// The following should be eliminated with <https://core.trac.wordpress.org/ticket/31334>.
		function onRemoved(removedControl) {
			if (control === removedControl) {
				control.destroy();
				if (control.container[0] && control.container[0].remove) {
					control.container[0].remove();
				} else if (control.container[0] && control.container[0].parentNode) {
					control.container[0].parentNode.removeChild(control.container[0]);
				}
				wp.customize.control.unbind('removed', onRemoved);
			}
		}
		wp.customize.control.bind('removed', onRemoved);
	},

	/**
	 * Set notification container and render.
	 *
	 * This is called when the React component is mounted.
	 *
	 * @param {Element} element - Notification container.
	 * @returns {void}
	 */
	setNotificationContainer: function setNotificationContainer(element) {
		const control = this;

		control.notifications.container = element;
		control.notifications.render();
	},

	/**
	 * Render the control into the DOM.
	 *
	 * This is called from the Control#embed() method in the parent class.
	 *
	 * @returns {void}
	 */
	renderContent: function renderContent() {
		const control = this;

		const reactElement = (
			<KirkiSliderForm
				{...control.params}
				control={control}
				customizerSetting={control.setting}
				setNotificationContainer={control.setNotificationContainer}
				value={control.params.value}
			/>
		);

		wpReactRender(control.container[0], reactElement, control);

		if (false !== control.params.choices.allowCollapse) {
			control.container[0].classList.add('allowCollapse');
		}
	},

	/**
	 * After control has been first rendered, start re-rendering when setting changes.
	 *
	 * React is able to be used here instead of the wp.customize.Element abstraction.
	 *
	 * @returns {void}
	 */
	ready: function ready() {
		const control = this;

		/**
		 * Update component value's state when customizer setting's value is changed.
		 */
		control.setting.bind((val) => {
			control.updateComponentState(val);
		});
	},

	/**
	 * This method will be overridden by the rendered component.
	 */
	updateComponentState: (val) => { },

	/**
	 * Handle removal/de-registration of the control.
	 *
	 * This is essentially the inverse of the Control#embed() method.
	 *
	 * @link https://core.trac.wordpress.org/ticket/31334
	 * @returns {void}
	 */
	destroy: function destroy() {
		const control = this;

		// Garbage collection: undo mounting that was done in the embed/renderContent method.
		wpReactUnmount(control.container[0], control);

		// Call destroy method in parent if it exists (as of #31334).
		if (wp.customize.Control.prototype.destroy) {
			wp.customize.Control.prototype.destroy.call(control);
		}
	}
});

export default KirkiSliderControl;
