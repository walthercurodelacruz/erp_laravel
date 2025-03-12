@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/detalles.css')}}">
<div class="box">
<div class="box-sub">
	<section class="heading">
		<div class="title">Detalle de Orden de Pedido</div>
		<p>Procesado: <span>{{$opedido->update_op}}</span></p>
	</section>
	<section class="details">
		<div>
			<p class="cod">Cod. OP: <span>{{$opedido->cod_op}}</span></p>
			<p>Estado: <span>{{$opedido->estado_op}}</span></p>
			<p>Tiempo de entrega: <span>{{$opedido->entrega_op}}</span></p>
		</div>
		<div>
			<p>Ruc cliente: <span>{{$opedido->rucc_op}}</span></p>
			<p>Cliente: <span>{{$opedido->cliente_op}}</span></p>
			<p>Dirección: <span>{{$opedido->direc_op}}</span></p>
		</div>
		<div>
			<p>Vendedor: <span>{{$opedido->asig_op}}</span></p>
			<p>Cod. OT: <span>{{$opedido->ot_op}}</span></p>
			<p>COT creada: <span>{{$opedido->creacionot_op}}</span></p>
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
					@if($opedido->cod_op == $it->cod_op)
					<tr>
						<td>{{$it->item_op}}</td>
						<td>{{$it->nota_op}}</td>
						<td>{{$it->cant_op}}</td>
						<td>{{$it->obser_op}}</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</section>
	<section>
		<p>Responsable: <span>{{$opedido->tecnico_op}}</span></p>
		<p>Operaciones: <span>{{$opedido->detalle_op}}</span></p>
		<p>Requiere: <span>{{$opedido->requiere_op}}</span></p>
	</section>
	<div class="return">
		<a href="{{route('Opedido.index')}}"><i class='bx bx-left-arrow-alt'></i> Regresar</a>
	</div>
</div>
</div>

@endsection