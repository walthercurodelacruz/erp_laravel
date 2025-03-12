@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de cotizacion</div>
		<p>Creado: <span>{{$cotizacion->fecha_cot}}</span></p>
	</section>
	<section class="details">
		<div>
			<p class="cod">Codigo: <span>{{$cotizacion->cod_cot}}</span></p>
			<p>Ruc cliente: <span>{{$cotizacion->rucc_cot}}</span></p>
			<p>Cliente: <span>{{$cotizacion->cliente_cot}}</span></p>
		</div>
		<div>
			<p>Dirección: <span>{{$cotizacion->direc_cot}}</span></p>
			<p>Estado:<span>{{$cotizacion->estado_cot}}</span></p>
		</div>
		<div>
			<p>Fecha de entrega: <span>{{$cotizacion->tentrega_cot}}</span></p>
			<p>Vendedor: <span>{{$cotizacion->asignado_cot}}</span></p>
		</div>
	</section>
	<section>
		<table class="table cust-datatable">
	        <thead>
	            <tr>
	                <td>Item</td>
	                <td>Nota</td>
	                <td>Cantidad</td>
	            </tr>
	        </thead>
	        <tbody>
				@foreach($item as $it)
					@if($cotizacion->cod_cot == $it->cod_cot)
					<tr>
						<td>{{$it->detalle_items}}</td>
						<td>{{$it->nota_items}}</td>
						<td>{{$it->cant_items}}</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</section>
	<div class="return">
		<a href="{{route('Evaluaciones_vista')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>
</div>
</div>

@endsection
