import { useRef } from "react";

const KirkiSliderForm = (props) => {
  const { control, customizerSetting, choices } = props;

  let trigger = "";

  control.updateComponentState = (val) => {
    if ("slider" === trigger) {
      valueRef.current.textContent = val;
    } else if ("input" === trigger) {
      sliderRef.current.value = val;
    } else if ("reset" === trigger) {
      valueRef.current.textContent = val;
      sliderRef.current.value = val;
    }
  };

  const handleChange = (e) => {
    trigger = "range" === e.target.type ? "slider" : "input";

    let value = e.target.value;

    if (value < choices.min) value = choices.min;

    if (value > choices.max) value = choices.max;

    if ("input" === trigger) e.target.value = value;
    customizerSetting.set(value);
  };

  const handleReset = (e) => {
    if ("" !== props.default && "undefined" !== typeof props.default) {
      sliderRef.current.value = props.default;
      valueRef.current.textContent = props.default;
    } else {
      if ("" !== props.value) {
        sliderRef.current.value = props.value;
        valueRef.current.textContent = props.value;
      } else {
        sliderRef.current.value = choices.min;
        valueRef.current.textContent = "";
      }
    }

    trigger = "reset";
    customizerSetting.set(sliderRef.current.value);
  };

  // Preparing for the template.
  const fieldId = `kirki-classic-control-input-${customizerSetting.id}`;
  const value = "" !== props.value ? props.value : 0;

  const sliderRef = useRef(null);
  const valueRef = useRef(null);

  return (
    <div className="kirki-classic-control-form" tabIndex="1">
      <label className="kirki-classic-control-label" htmlFor={fieldId}>
        <span className="customize-control-title">{props.label}</span>
        <span
          className="customize-control-description description"
          dangerouslySetInnerHTML={{ __html: props.description }}
        />
      </label>

      <div
        className="customize-control-notifications-container"
        ref={props.setNotificationContainer}
      ></div>

      <button
        type="button"
        className="kirki-classic-control-reset"
        onClick={handleReset}
      >
        <i className="dashicons dashicons-image-rotate"></i>
      </button>

      <div className="kirki-classic-control-cols">
        <div className="kirki-classic-control-left-col">
          <input
            ref={sliderRef}
            type="range"
            id={fieldId}
            defaultValue={value}
            min={choices.min}
            max={choices.max}
            step={choices.step}
            className="kirki-classic-control-slider"
            onChange={handleChange}
          />
        </div>
        <div className="kirki-classic-control-right-col">
          <div className="kirki-classic-control-value" ref={valueRef}>
            {value}
          </div>
        </div>
      </div>
    </div>
  );
};

export default KirkiSliderForm;
