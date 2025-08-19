import { router, usePage } from '@inertiajs/react'

export default function Dashboard() {
  const { auth } = usePage().props // pega os props enviados pelo backend (HandleInertiaRequests)

  const handleLogout = () => {
    router.post(route('logout')) // chama o logout no backend
  }

  return (
    <div className="p-6 max-w-md mx-auto bg-white rounded shadow">
      <h1 className="text-2xl font-bold mb-4">Olá, {auth.user.name}!</h1>

      <button
        onClick={handleLogout}
        className="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
      >
        Sair
      </button>
    </div>
  )
}
