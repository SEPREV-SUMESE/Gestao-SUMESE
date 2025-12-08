// import { Link } from '@inertiajs/react'
import Sidebar from '../Components/Sidebar'

export default function Layout({ children }) {
  return (
    <main className='main-layout'>
      <Sidebar/>
      <article className='main-container'>{children}</article>
    </main>
  )
}
