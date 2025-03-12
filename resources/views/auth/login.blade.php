<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/user-login.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
        	@csrf
        		<div class="title">Iniciar Sesión</div>
                <div class="input-box">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
					<div class="underline"></div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-box">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
					<div class="underline"></div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-box button">
                    <input type="submit" value="Iniciar Sesión">
                </div>
        </form>
    </div>
</body>
</html>