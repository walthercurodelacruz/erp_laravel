@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Usuario</div>
	<form action="{{route('User-admin.update', $usuario->id)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
	                <label>Nombre</label>
					<input type="text" value="{{$usuario->name}}" readonly="">
				</div>
				<div class="box-input">
	                <label>Email</label>	
					<input type="email" value="{{$usuario->email}}" required="" readonly="">
				</div>
				<div class="box-input">
	            	<label>Rol</label>					
					{!! Form::select('roles[]', $roles, $userRole) !!}
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
	            	<label>Cargo</label>
		            <select name="id_cargo">
		                @foreach ($cargos as $cargo)
		                <option value="{{$cargo->nom_cargo}}">{{$cargo->nom_cargo}}</option>
		                @endforeach
		            </select>
				</div>
				<div class="box-input">
		            <label>Estado</label>
					<select name="estado">
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</div>
				<div class="box-input">
	                <label>Celular</label>
	                <input type="text" name="celular" maxlength="9" value="{{$usuario->celular}}" required="">
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
</script>
@endsection