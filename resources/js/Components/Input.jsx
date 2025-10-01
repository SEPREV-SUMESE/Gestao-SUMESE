import '../../css/input.css';
import { useRef } from "react";



export default function Input({
    label,
    name,
    type = "text",
    value,
    onChange,
    placeholder = " ",
    required = false,
    error = "",
    as = "input", // 'input' 'textarea' 'select'
    ...rest
}) {
    const Component = as;
    const inputRef = useRef(null);

    return (
        <div className={`input-component-container ${error ? "has-error" : ""}`}  onClick={() => inputRef.current?.focus()}>
            <Component
                ref={inputRef}
                type={as === "input" ? type : undefined} 
                name={name}
                id={name}
                placeholder={placeholder}
                value={value}
                onChange={onChange}
                required={required}
                {...rest}
            />
            <label className="input-component-label" htmlFor={name}>
                {label}
            </label>
            {error && <span className="input-component-error">{error}</span>}
        </div>
    );
}
