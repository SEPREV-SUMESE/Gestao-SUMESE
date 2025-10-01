import '../../css/button.css';
import React from "react";

export default function Button({
  children,
  size = "g",
  variant = "primario",
  as = "button",
  ...props
}) {
  const className = `btn ${size} ${variant}`;

  if (as === "a") {
    return (
      <a className={className} {...props}>
        {children}
      </a>
    );
  }

  return (
    <button className={className} {...props}>
      {children}
    </button>
  );
}
