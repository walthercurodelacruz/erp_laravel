@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de guia de ingreso</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$guia->cod_guia}}</span></p>
			<p>RUC proveedor: <span>{{$guia->rucp_guia}}</span></p>
			<p>Razón Social: <span>{{$guia->razons_guia}}</span></p>
			<p>Dirección: <span>{{$guia->direc_guia}}</span></p>
			<p>Fecha de llegada: <span>{{$guia->fecha_guia}}</span>
			<p>Hora de llegada: <span>{{$guia->hora_guia}}</span>
			<p>Archivo Adjunto: <span>{{$guia->arch_guia}}</span>
			<p>OCP: <span>{{$guia->ocp_guia}}</span></p>
			<p>Numero guia de ingreso: <span>{{$guia->num_guia}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Guia_In.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection