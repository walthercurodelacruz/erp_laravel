@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de OC Cliente</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$occliente->cod_occliente}}</span></p>
			<p>RUC cliente: <span>{{$occliente->ruc_occliente}}</span></p>
			<p>Razón Social: <span>{{$occliente->razons_occliente}}</span></p>
			<p>Descripción: <span>{{$occliente->desc_occliente}}</span></p>
			<p>Archivo Adjunto: <span>{{$occliente->arch_occliente}}</span>
			<p>COT: <span>{{$occliente->cot_occliente}}</span></p>
			<p>N° OC Cliente:<span>{{$occliente->entrega_occliente}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Occliente.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection