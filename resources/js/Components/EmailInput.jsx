export default function EmailInput({ value, onChange, error }) {
  return (
    <div className="flex flex-col gap-1">
      <input
        type="email"
        value={value}
        onChange={(e) => onChange(e.target.value)}
        placeholder="Email"
        className="border border-gray-300 rounded p-4"
      />
      {error && <span className="text-red-500 text-sm">{error}</span>}
    </div>
  )
}