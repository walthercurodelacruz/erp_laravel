@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles del Empleado</div>
		<p>Creado: <span>{{$usuario->created_at}}</span></p>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$usuario->cod_emp}}</span></p>
			<p>Nombre: <span>{{$usuario->name}}</span></p>
			<p>Apellido: <span>{{$usuario->lastname}}</span></p>
			<p>Email: <span>{{$usuario->email}}</span></p>
			<p>DNI: <span>{{$usuario->dni}}</span></p>
			<p>Estado: <span>{{$usuario->estado}}</span></p>
			<p>Tipo Usuario <span>{{$usuario->tipo_user}}</span></p>
		</div>
		<div>						
			<p>Cargo: <span>{{$usuario->id_cargo}}</span></p>
			<p>Fecha de Ingreso: <span>{{$usuario->ingreso}}</span></p>
			
			<p>Actualizado: <span>{{$usuario->updated_at}}</span></p>
		</div>
	</section>	
	<div class="return">
		<a href="{{route('User-admin.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>
</div>
</div>
@endsection