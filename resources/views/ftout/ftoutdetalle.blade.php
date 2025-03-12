@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de Factura Emitida</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$ftout->cod_ftout}}</span></p>
			<p>RUC cliente: <span>{{$ftout->ruc_ftout}}</span></p>
			<p>Razón Social: <span>{{$ftout->razons_ftout}}</span></p>
			<p>N° Factura: <span>{{$ftout->desc_ftout}}</span></p>
			<p>Moneda: <span>{{$ftout->moneda_ftout}}</span></p>
			<p>Archivo Adjunto: <span>{{$ftout->arch_ftout}}</span>
			<p>COT: <span>{{$ftout->cot_ftout}}</span></p>
			<p>N° OCC:<span>{{$ftout->entrega_ftout}}</span></p>
			<p>Sub Total:<span>{{$ftout->subtotal_ftout}}</span></p>
			<p>Total:<span>{{$ftout->total_ftout}}</span></p>
			<p>F. Emisión:<span>{{$ftout->femi_ftout}}</span></p>
			<p>F. Vencimiento:<span>{{$ftout->fcaduca_ftout}}</span></p>
		</div>
	</section>
	<div class="return">
		<a href="{{route('Ftout.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection