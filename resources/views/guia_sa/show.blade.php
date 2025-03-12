@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de guia de salida</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$guia->cod_guia}}</span></p>
			<p>RUC cliente: <span>{{$guia->rucc_guia}}</span></p>
			<p>Razón Social: <span>{{$guia->razons_guia}}</span></p>
			<p>Dirección: <span>{{$guia->direc_guia}}</span></p>
			<p>Fecha de salida: <span>{{$guia->fecha_guia}}</span>
			<p>Hora de salida: <span>{{$guia->hora_guia}}</span>
			<p>Archivo Adjunto: <span>{{$guia->arch_guia}}</span>
			<p>OCC: <span>{{$guia->occ_guia}}</span></p>
			<p>Numero guia de salida: <span>{{$guia->num_guia}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Guia_Sa.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection