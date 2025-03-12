@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Orden de pedido N° {{$opedido->cod_op}}</div>
    <form action="{{route('Compras.store')}}" method="post">
    @csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="id_op" value="{{$opedido->id_op}}">
				<input type="hidden" name="cod_op" value="{{$opedido->cod_op}}">
				<div class="box-input">
					<label>Cliente</label>
					<input type="text" value="{{$opedido->cliente_op}}" readonly="">
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<input type="text" name="asig_eval" value="{{$opedido->asig_op}}" readonly="">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<textarea type="text" readonly="">{{$opedido->direc_op}}</textarea>
				</div>
				<div class="box-input">
					<label>Fecha de proceso</label>
					<input type="Tiempo" value="{{$opedido->update_op}}" readonly="">
				</div>			
			</div>		
			<div class="details-box">
				<div class="box-input">
					<label>Estado</label>
					<input type="text" value="{{$opedido->estado_op}}" readonly="">
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<input type="text" name="entrega_eval" value="{{$opedido->entrega_op}}" readonly="">
				</div>
				<div class="box-input">
					<label>Fecha de creación</label>
					<input type="Tiempo" value="{{$opedido->creacionot_op}}" readonly="">
				</div>
				<div class="box-input">
					<label>Orden de trabajo</label>
					<input type="text" value="{{$opedido->ot_op}}" readonly="">
				</div>
			</div>	
		</div>


		<table class="table cust-datatable">
            <thead>
                <tr>
                    <td style="min-width:100px;">Item</td>
                    <td style="min-width:100px;">Nota</td>
                    <td style="min-width:100px;">Cantidad</td>
                    <td style="min-width:100px;">Observaciones</td>
                </tr>
            </thead>
            <tbody>
				<input type="hidden" value="{{$i = -1}}">
				@foreach($items as $it)
					@if($opedido->cod_op == $it->cod_op)
					<input type="hidden" value="{{$i++}}" name="contar">
					<tr>
						<td><input type="text" name="item_eval[{{$i}}]" value="{{$it->item_op}}" readonly=""></td>
						<td><input type="text" name="nota_eval[{{$i}}]" value="{{$it->nota_op}}" readonly=""></td>
						<td><input type="text" name="cant_eval[{{$i}}]" value="{{$it->cant_op}}" readonly=""></td>
						<td><input type="text" value="{{$it->obser_op}}" readonly=""></td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>


		<div class="details-box">
			<div class="box-input">
				<label>Responsable </label>
				<select name="tecnico_eval">
						<option value="{{$opedido->tecnico_op}}">Asignado | {{$opedido->tecnico_op}}</option>
						@foreach($usuarios as $usuario)
							@if($usuario->id_cargo == "Logistico")
							<option value="{{$usuario->name}} {{$usuario->lastname}}">{{$usuario->name}} {{$usuario->lastname}}</option>
							@endif
						@endforeach
				</select>
			</div>
			<div class="box-input">
				<label>Operaciones</label>
				<textarea rows="7" cols="30" readonly="">{{$opedido->detalle_op}}</textarea>
			</div>
			<div class="box-input">
				<label>Requiere</label>
				<textarea rows="7" cols="30" readonly="">{{$opedido->requiere_op}}</textarea>
			</div>				
		</div>
		<div class="return">
    		<a href="{{route('Evaluaciones_vista_eva')}}">Regresar</a>
    		<button type="submit">Procesar a compras</button>
		</div>
	</form>
</div>
</div>
<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

@endsection