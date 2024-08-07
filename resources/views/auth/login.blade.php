<!DOCTYPE html>
<html lang="en">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>VUTEQ | Log In</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            min-width: 100vw;
    min-height: 100vh;
    background-image: url('/img/fondo 1.png');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-color: #f5f5f5; /* Color de fondo de la página */
    justify-content: center;
    align-items: center;
   
        }
    </style>
</head>
<body>
    <div class="login-container box">
        <div class="has-text-centered">
            <img src="/img/logo.png" width="100" height="100">
        </div>
        <form method="POST" action="{{ route('login') }}" class="has-text-centered">
            @csrf
            <div class="field">
                <label class="label">Correo Electrónico</label>
                <div class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    <span class="icon is-small is-left">
                        <i class='bx bx-envelope'></i>
                    </span>
                </div>
                @error('email')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">Contraseña</label>
                <div class="control has-icons-left">
                    <input class="input" type="password" placeholder="Password" name="password" required>
                    <span class="icon is-small is-left">
                        <i class='bx bx-lock-alt'></i>
                    </span>
                </div>
                @error('password')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-info">
                        Entrar
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
