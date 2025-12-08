import { BUTTON_COLORS } from '../Utils/colors'

export default function Button({ 
  children, 
  type = "button", 
  onClick, 
  disabled = false, 
  className = "",
  color = "blue"
}) 

{
    let colorClasses = BUTTON_COLORS[color] || BUTTON_COLORS.blue
    console.log(colorClasses);
    
    return (
        <button
        type={type}
        onClick={onClick}
        disabled={disabled}
        className={`
            px-4 py-4 rounded-4xl font-semibold 
            ${colorClasses}
            disabled:bg-gray-400 disabled:cursor-not-allowed
            transition-all duration-200
            ${className}
        `}
        >
      {children}
    </button>
  )
}
