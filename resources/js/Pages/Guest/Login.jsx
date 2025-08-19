import { useForm } from '@inertiajs/react'
import { route } from 'ziggy-js'


export default function Login() {
  const { data, setData, post, processing, errors } = useForm({
    email: '',
    password: '',
    remember: false,
  })

  const submit = (e) => {
    e.preventDefault()
    post(route('authenticate'))
  }

  return (
    <form onSubmit={submit}>
      <input
        type="email"
        value={data.email}
        onChange={(e) => setData('email', e.target.value)}
      />
      {errors.email && <div>{errors.email}</div>}

      <input
        type="password"
        value={data.password}
        onChange={(e) => setData('password', e.target.value)}
      />

      <button type="submit" disabled={processing}>
        Entrar
      </button>
    </form>
  )
}
