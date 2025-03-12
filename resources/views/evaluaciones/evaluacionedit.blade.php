@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Orden de Trabajo N° {{$evaluacion->cod_eval}}</div>
    <form action="{{route('Evaluaciones_guardarop')}}" method="post">
    	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="cod_op" value="{{$codigo}}">
				<input type="hidden" name="id_eval" value="{{$evaluacion->id_eval}}">
				<input type="hidden" name="ot_op" value="{{$evaluacion->cod_eval}}">
				<div class="box-input">
					<label>Ruc cliente</label>
					<input type="text" name="rucc_op" value="{{$evaluacion->rucc_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" name="cliente_op" value="{{$evaluacion->cliente_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<input type="text" name="asig_op" value="{{$evaluacion->asig_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<textarea type="text" name="direc_op" readonly="">{{$evaluacion->direc_eval}}</textarea>
				</div>
				<div class="box-input">
					<label>Fecha de proceso</label>
					<input type="Tiempo" value="{{$evaluacion->update_eval}}" readonly="">
				</div>			
			</div>		
			<div class="details-box">
				<div class="box-input">
					<label>Estado</label>
					<input type="text" name="estado_op" value="{{$evaluacion->estado_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<input type="text" name="entrega_op" value="{{$evaluacion->entrega_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Fecha de creación</label>
					<input type="Tiempo" name="update_op" value="{{$evaluacion->creacion_eval}}" readonly="">
				</div>
				<div class="box-input">
					<label>Cotización</label>
					<input type="text" value="{{$evaluacion->cot_eval}}" readonly="">
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
					@if($evaluacion->cod_eval == $it->cod_eval)
					<input type="hidden" value="{{$i++}}" name="contar">
					<tr>
						<td><input type="text" name="item_eval[{{$i}}]" value="{{$it->item_eval}}" readonly=""></td>
						<td><input type="text" name="nota_eval[{{$i}}]" value="{{$it->nota_eval}}" readonly=""></td>
						<td><input type="text" name="cant_eval[{{$i}}]" value="{{$it->cant_eval}}" readonly=""></td>
						<td><input type="text" name="obser_eval[{{$i}}]" value="{{$it->obser_eval}}" readonly=""></td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>


		<div class="details-box-center">
			<div class="box-input">
				<label>Responsable</label>
				<input type="text" required="" maxlength="50" name="tecnico_op" id="search_asig" value="{{$evaluacion->tecnico_eval}}">
			</div>
			<div class="box-input">
				<label>Operaciones</label>
				<textarea name="detalle_op" rows="7" cols="30" readonly="">{{$evaluacion->detalle_eval}}</textarea>
			</div>
			<div class="box-input">
				<label>Requiere</label>
				<textarea name="requiere_op" rows="7" cols="30" readonly="">{{$evaluacion->requiere_eval}}</textarea>
			</div>				
		</div>
		<div class="return">
    		<a href="{{route('Evaluaciones_vista_eva')}}">Regresar</a>
    		<button type="submit">Procesar a op</button>
		</div>
	</form>
</div>
</div>
<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search_asig').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('evaluacion_asignado')}}",
					dataType: 'json',
					data: {
						a: request.term
					},
					success: function(data){
						response(data);
					}
				});
			}
		});
</script>
@endsection