@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles del Cliente</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$cliente->cod_clie}}</span></p>
			<p>RUC cliente: <span>{{$cliente->ruc_clie}}</span></p>
			<p>Razón Social: <span>{{$cliente->razons_clie}}</span></p>
			<p>Dirección: <span>{{$cliente->direc_clie}}</span></p>
			<p>Contacto: <span>{{$cliente->contacto_clie}}</span></p>
			<p>Telefono 1: <span>{{$cliente->tel1_clie}}</span></p>
			<p>Telefono 2:<span>{{$cliente->tel2_clie}}</span></p>
			<p>Celular 1: <span>{{$cliente->cel1_clie}}</span></p>
			<p>Celular 2:<span>{{$cliente->cel2_clie}}</span></p>
		</div>
		<div>
			<p>Email 1: <span>{{$cliente->email1_clie}}</span></p>
			<p>Email 2: <span>{{$cliente->email2_clie}}</span></p>
			<p>Página Web: <span>{{$cliente->pagweb_clie}}</span></p>
			<p>Area contacto: <span>{{$cliente->area}}</span></p>
			<p>Estado: <span>{{$cliente->estado}}</span></p>
			<p>Vendedor: <span>{{$cliente->asignado}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Cliente.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection
