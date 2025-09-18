import { useForm } from '@inertiajs/react'
import { Link } from '@inertiajs/react'
import { route } from 'ziggy-js'
import EmailInput from '../../Components/EmailInput'
import PasswordInput from '../../Components/PasswordInput'
import Button from '../../Components/Button'
import Background from '../Assets/background.svg'


export default function Login() {
  const { data, setData, post, processing, errors } = useForm({
    email: '',
    password: '',
    remember: false,
  })

  const submitLogin = (e) => {
    e.preventDefault()
    post(route('authenticate'))
  }

  return (
    <div className='flex w-screen h-screen items-center justify-center'>

      <div className='flex flex-col h-full w-1/2 items-center justify-around px-24'>

        <div className='flex w-full px-4 items-center justify-center'>
          LOGO
        </div>

        <div className='flex flex-col gap-4 w-full px-4 items-center justify-center'>
          <form onSubmit={submitLogin} className="flex flex-col gap-4 w-full">
              <EmailInput
                value={data.email}
                onChange={(val) => setData('email', val)}
                error={errors.email}
              />

              <PasswordInput
                value={data.password}
                onChange={(val) =>setData('password', val)}
                error={errors.password}
              />

              <Button type="submit" disabled={processing} color={"blue"}>
                {processing ? "Entrando..." : "Entrar"}
              </Button>

          </form>
          <ResetPassword/>

          <RegisterButton/>
        </div>

      </div>

      <div className='flex w-1/2 h-full items-center justify-center'>
        <Background></Background>
      </div>

    </div>
  )
}

export function ResetPassword() {
  return (
    <Link href={route('forgot_password')} className="text-gray-600 text-center">
      Esqueceu a senha?
    </Link>
  )
}

export function RegisterButton() {
  return (
    <form action={route('register')} className='w-full'>
      <Button type="submit" color={"white"} className={"w-full"}>
        Cadastro
      </Button>
    </form>
  )
}
