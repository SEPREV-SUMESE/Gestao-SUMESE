import { router, usePage } from '@inertiajs/react'
import Layout from '../Layout'

function Dashboard() {
  const { auth } = usePage().props // pega os props enviados pelo backend (HandleInertiaRequests)

  const handleLogout = () => {
    router.post(route('logout')) // chama o logout no backend
  }

  return (
    <div className="">
      página de dashboard
    </div>
  )
}

Dashboard.layout = page => <Layout children={page} title="Dashboard" />

export default Dashboard