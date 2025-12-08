export default function PasswordInput({ value, onChange, error }) {
  return (
    <div className="flex flex-col gap-1">
      <input
        type="password"
        value={value}
        onChange={(e) => onChange(e.target.value)}
        placeholder="Senha"
        className="border border-gray-300 rounded p-4"
      />
      {error && <span className="text-red-500 text-sm">{error}</span>}
    </div>
  )
}