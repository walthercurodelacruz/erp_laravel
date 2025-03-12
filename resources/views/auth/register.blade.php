<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/register-style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
</head>
<body>
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="img/back.png" alt="">

                <div class="text">
                    
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-content">
                <div class="login-form">
                    <div class="title">Regístrate</div>

                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-user"></i>
                            <input id="name" type="text" placeholder="Ingresa tu nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <i class="fas fa-envelope"></i>
                            <input id="email" type="email" placeholder="Ingresa tu email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input id="password" type="password" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input id="password-confirm" type="password" placeholder="Confirma tu contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>                      
                            <!--
                            <div class="text"><a href="#">Olvidaste tu contraseña?</a></div>
                            -->

                        <div class="button input-box">
                            <input type="submit" value="Registrarme">
                        </div>

                        <div class="text sign-up-text">¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión ahora</a></div>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    <a class="back" href="{{ route('home') }}">
        <i class="fas fa-arrow-alt-circle-left"></i>
    </a>

    </body>
</html>
