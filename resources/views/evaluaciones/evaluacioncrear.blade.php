@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Crear evaluacion</div>
	<form action="{{route('Evaluaciones_guardar')}}" method="post">
		@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="cod_eval" value="{{$codigo}}">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="id_cot" value="{{$cotizacion->id_cot}}">
				<input type="hidden" name="cot_eval" value="{{$cotizacion->cod_cot}}">
				<div class="box-input">
					<label>Ruc cliente</label>
					<input type="text" name="rucc_eval" value="{{$cotizacion->rucc_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" name="cliente_eval" value="{{$cotizacion->cliente_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<input type="text" name="asig_eval" value="{{$cotizacion->asignado_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<textarea type="text" name="direc_eval" readonly="">{{$cotizacion->direc_cot}}</textarea>
				</div>	
			</div>		
			<div class="details-box">
				<div class="box-input">
					<label>Estado</label>
					<input type="text" name="estado_eval" value="{{$cotizacion->estado_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<input type="text" name="entrega_eval" value="{{$cotizacion->tentrega_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Fecha de creación</label>
					<input type="Tiempo" name="creacion_eval" value="{{$cotizacion->fecha_cot}}" readonly="">
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
					@if($cotizacion->cod_cot == $it->cod_cot)
					<input type="hidden" value="{{$i++}}" name="contar">
					<tr>
						<td><input type="text" name="item_eval[{{$i}}]" value="{{$it->detalle_items}}" readonly=""></td>
						<td><input type="text" name="nota_eval[{{$i}}]" value="{{$it->nota_items}}" readonly=""></td>
						<td><input type="text" name="cant_eval[{{$i}}]" value="{{$it->cant_items}}" readonly=""></td>
						<td><input type="text" required="" maxlength="500" name="obser_eval[{{$i}}]"></td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>


		<div class="details-box-center">
			<div class="box-input">
				<label>Responsable</label>
				<input type="text" required="" maxlength="50" name="tecnico_eval" id="search_asig">
			</div>
			<div class="box-input">
				<label>Operaciones</label>
				<textarea name="detalle_eval" required="" maxlength="500" rows="7" cols="30"></textarea>
			</div>
			<div class="box-input">
				<label>Requiere</label>
				<textarea name="requiere_eval" required="" maxlength="500" rows="7" cols="30"></textarea>
			</div>				
		</div>
		<div class="return">
    		<a href="{{route('Evaluaciones_vista')}}">Regresar</a>
			<button type="submit">Procesar a ot</button>
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