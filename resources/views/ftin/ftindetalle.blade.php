@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de Factura Recibida</div>
	</section>
	<section class="details">
		<div>	
			<p class="cod">CODIGO: <span>{{$ftin->cod_ftin}}</span></p>
			<p>RUC Proveedor: <span>{{$ftin->ruc_ftin}}</span></p>
			<p>Razón Social: <span>{{$ftin->razons_ftin}}</span></p>
			<p>N° de Factura: <span>{{$ftin->desc_ftin}}</span></p>
			<p>Moneda: <span>{{$ftin->moneda_ftin}}</span></p>
			<p>Archivo Adjunto: <span>{{$ftin->arch_ftin}}</span>
			<p>OCP: <span>{{$ftin->cot_ftin}}</span></p>
			<p>COT PROV:<span>{{$ftin->entrega_ftin}}</span></p>
			<p>Sub Total: <span>{{$ftin->subtotal_ftin}}</span></p>
			<p>Total: <span>{{$ftin->total_ftin}}</span></p>
			<p>F. Emisión: <span>{{$ftin->femi_ftin}}</span></p>
			<p>F. Caduca: <span>{{$ftin->fcaduca_ftin}}</span></p>
			
		</div>
	</section>
	<div class="return">
		<a href="{{route('Ftin.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>	
</div>
</div>
@endsection