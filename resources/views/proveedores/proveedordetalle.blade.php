@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles del Proveedor</div>
	</section>
	<section class="details">
		<div>
			<p class="cod">CODIGO: <span>{{$proveedor->cod_prov}}</span></p>
			<p>RUC proveedor: <span>{{$proveedor->ruc_prov}}</span></p>
			<p>Razón Social: <span>{{$proveedor->razons_prov}}</span></p>
			<p>Dirección: <span>{{$proveedor->direc_prov}}</span></p>
			<p>Contacto: <span>{{$proveedor->contacto_prov}}</span></p>
			<p>Celular 1: <span>{{$proveedor->cel1_prov}}</span></p>
			<p>Celular 2: <span>{{$proveedor->cel2_prov}}</span></p>	
		</div>
		<div>
			<p>Email 1: <span>{{$proveedor->email1_prov}}</span></p>
			<p>Email 2: <span>{{$proveedor->email2_prov}}</span></p>
			<p>Página Web: <span>{{$proveedor->pagweb_prov}}</span></p>
			<p>Estado: <span>{{$proveedor->estado_prov}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Proveedor.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>
</div>
</div>

@endsection
