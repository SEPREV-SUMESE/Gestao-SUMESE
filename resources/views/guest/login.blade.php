@extends("layouts.main")

@section("title", "Login")

@section("css")
<link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endsection

@section("container")
<div class="login-page">
    <div class="login-card">
        <div class="login-left">
            <div style="justify-content: center;" class="logo">
                <img src="{{ asset('assets/img/logo-full.svg') }}" alt="SUMESE">
            </div>

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Senha" required>
                 </div>

                <button type="submit" class="btn-login">Entrar</button>
            </form>

            <a href="{{ route('forgot_password') }}" class="forgot-password">Esqueceu a senha?</a>
            <a href="{{ route('register') }}" class="btn-register">Cadastro</a>
        </div>

        <div class="login-right">
            <!-- Painel de formas geométricas -->
            <div class="geometric-pattern">
                <!-- Use CSS para criar os círculos e quadrados iguais ao modelo -->
            </div>
        </div>
    </div>

    <div class="footer">
        <img src="{{ asset('assets/img/logo-alagoas.svg') }}" alt="Governo de Alagoas">
    </div>
</div>
@endsection

@section("js")
@endsection
