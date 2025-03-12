@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Nuevo Usuario</div>
    <form method="POST" action="{{ route('User-admin.store') }}">
    	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<div class="box-input">
	                <label>Nombre</label>
	                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
				</div>
				<div class="box-input">
	                <label>Apellido</label>
	                <input type="text" name="lastname" value="{{ old('apellido') }}" maxlength="255" required="">
				</div>
				<div class="box-input">
	                <label>Email</label>
	                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
	                @error('email')
	                	<br>
	                	<small>*{{$message}}</small>
	                @enderror
				</div>
	            <br>
				<div class="box-input">
	                <label>Contraseña</label>
	                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
	                <i class='bx bxs-show' onclick="show()"></i>
	                @error('password')
	                	<br>
	                	<small>*{{$message}}</small>
	                @enderror
				</div>
	            <br>				
				<div class="box-input">
	                <label>Confirma contraseña</label>
	                <input id="password-confirm" type="password" class="form-control" name="confirm-password" required autocomplete="new-password">
	                <i class='bx bxs-show a' onclick="show1()"></i>
	                @error('password_confirmation')
	                	<br>
	                	<small>*{{$message}}</small>
	                @enderror
				</div>
	            <br>
	            <div class="box-input">
	                <label>Celular</label>
	                <input type="text" name="celular" maxlength="9" value="{{ old('cel') }}" required="">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
	                <label>DNI</label>
	                <input type="text" name="dni" value="{{ old('dni') }}" maxlength="8" required="">
				</div>
				<div class="box-input">
	                <label>Codigo de empleado</label>
	                <input type="text" name="cod_emp" maxlength="10" value="{{ old('cod', $codigo) }}" required="">
				</div>
				<div class="box-input">
	                <label>Fecha de nacimiento</label>
	                <input type="date" name="f_nac" required="">
				</div>
				<div class="box-input">
	            	<label>Rol</label>
	                {!! Form::select('roles[]', $roles, []) !!}
				</div>
				<div class="box-input">
	            	<label>Cargo</label>
	                <select name="id_cargo" required="">
	                    @foreach ($cargos as $cargo)
	                    <option value="{{$cargo->nom_cargo}}">{{$cargo->nom_cargo}}</option>
	                    @endforeach
	                </select>
				</div>
				<div class="box-input">
	            	<label>Fecha de ingreso</label>
	            	<input type="date" name="ingreso" required="">
				</div>
			</div>	
		</div>	    	
	    <div class="return">
        	<a href="{{route('User-admin.index')}}">Regresar</a>
            <button type="submit">Guardar</button>
        </div>
   	</form>
</div>
</div>

<script>
        function show(){
     		var pswrd = document.getElementById('password');
      		var icon = document.querySelector('.bxs-show');
          	if (pswrd.type === "password") {
        		pswrd.type = "text";
       			icon.style.color = "#000";
      		}else{
           		pswrd.type = "password";
           		icon.style.color = "grey";
        	}
     	}
     	function show1(){
         	var pswrd = document.getElementById('password-confirm');
          	var icon = document.querySelector('.a');
          	if (pswrd.type === "password") {
       			pswrd.type = "text";
       			icon.style.color = "#000";
          	}else{
       		pswrd.type = "password";
           		icon.style.color = "grey";
          	}
         }         	
</script>
@endsection