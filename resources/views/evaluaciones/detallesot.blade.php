@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalles de orden de trabajo</div>
		<p>Procesado: <span>{{$evaluacion->update_eval}}</span></p>
	</section>
	<section class="details">
		<div>
			<p class="cod">Codigo: <span>{{$evaluacion->cod_eval}}</span></p>
			<p>Ruc cliente: <span>{{$evaluacion->rucc_eval}}</span></p>
			<p>Cliente: <span>{{$evaluacion->cliente_eval}}</span></p>
		</div>
		<div>
			<p>Dirección: <span>{{$evaluacion->direc_eval}}</span></p>
			<p>Estado:<span>{{$evaluacion->estado_eval}}</span></p>
			<p>Fecha de entrega: <span>{{$evaluacion->entrega_eval}}</span></p>
		</div>
		<div>
			<p>COT Nº: <span>{{$evaluacion->cot_eval}}</span></p>
			<p>COT creada: <span>{{$evaluacion->creacion_eval}}</span></p>
			<p>Vendedor: <span>{{$evaluacion->asig_eval}}</span></p>

		</div>
	</section>
	<section>
		<table class="table cust-datatable">
	        <thead>
	            <tr>
	                <td>Item</td>
	                <td>Nota</td>
	                <td>Cantidad</td>
	                <td>Observaciones</td>
	            </tr>
	        </thead>
	        <tbody>
				@foreach($item as $it)
					@if($evaluacion->cod_eval == $it->cod_eval)
					<tr>
						<td>{{$it->item_eval}}</td>
						<td>{{$it->nota_eval}}</td>
						<td>{{$it->cant_eval}}</td>
						<td>{{$it->obser_eval}}</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</section>
	<section>
		<p>Responsable: <span>{{$evaluacion->tecnico_eval}}</span></p>
		<p>Operaciones: <span>{{$evaluacion->detalle_eval}}</span></p>
		<p>Requiere: <span>{{$evaluacion->requiere_eval}}</span></p>
	</section>
	<div class="return">
		<a href="{{route('Evaluaciones_vista_eva')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>
</div>
</div>

@endsection
