import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import '../../css/modal.css';

export default function Modal({
  children,
  open = false,
  onClose = () => {},
  backdropClassName = '',
  contentClassName = '',
  ariaLabel = 'Modal',
  size = 'md', // 'sm', 'md', 'lg', 'xl'
}) {
  useEffect(() => {
    if (!open) return;

    const handleKey = (e) => {
      if (e.key === 'Escape') onClose();
    };

    const previousOverflow = document.body.style.overflow;
    document.body.style.overflow = 'hidden';
    document.addEventListener('keydown', handleKey);

    return () => {
      document.body.style.overflow = previousOverflow;
      document.removeEventListener('keydown', handleKey);
    };
  }, [open, onClose]);

  if (!open) return null;

  const modal = (
    <div
      role="dialog"
      aria-label={ariaLabel}
      className={"modal-backdrop " + backdropClassName}
      onClick={(e) => {
            if (e.target === e.currentTarget) onClose();
        }}
    >
      <div
        className={"modal-content modal-" + size + " " + contentClassName}
        onMouseDown={(e) => e.stopPropagation()}
      >
        {children}
      </div>
    </div>
  );

  return ReactDOM.createPortal(modal, document.body);
}
