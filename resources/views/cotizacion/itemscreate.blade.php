@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
	<form action="{{route('guardar_item', $cod->id_cot)}}" method="post">
	@csrf 
		<div class="title-input"><input class="codigo" type="text" name="cod_cot" readonly="" value="{{$cod->cod_cot}}"></div>
		<table class="table cust-datatable">
            <thead>
                <tr>
					<td style="min-width:30px;">ITEM</td>
                    <td style="min-width:100px;">DESCRIPCIÓN</td>
                    <td style="min-width:100px;">N° PARTE</td>
                    <td style="min-width:30px;">CANTIDAD</td>
                    <td style="min-width:100px;">PRECIO VENTA</td>
                    <td style="min-width:100px;" colspan="2">PRECIO NETO</td>
                </tr>
            </thead>
            <tbody>
				<tr>
					<td><input type="text" required="" name="numitem" id="numitem"></td>
					<td><textarea cols="30" rows="4" required="" name="item" id="search-prod"></textarea></td>
					<td><textarea cols="20" rows="4" required="" name="nota" id="sn_prod"></textarea></td>
					<td><input type="text" required="" name="cant" id="cant"></td>
					<td><input type="text" required="" name="prec" id="prec"></td>
					<td><input type="text" required="" name="resultado" id="precio_neto" readonly=""></td>
					<td><button class="check" type="submit"><i class='bx bx-check' ></i></button></td>
	</form>
				</tr>
				<input type="hidden" value="{{$i = -1}}">
				@foreach($item as $it)
					@if($it->cod_cot == $cod->cod_cot)
					<input type="hidden" value="{{$i++}}">
					<tr class="body">
						<td>{{$it->numitem}}</td>
						<td><input type="text" name="cant_items" value="{{$it->detalle_items}}" readonly=""></td>
						<td>{{$it->nota_items}}</td>
						<td>{{$it->cant_items}}</td>
						<td>{{$it->precio_items}}</td>
						<td><input type="text" id="precio_neto{{$i}}" value="{{$it->total_items}}" readonly=""></td>
						<td>
							@can('borrar-itemscot')
							<form action="{{route('eliminar_item', ['id_it' => $it->id_items, 'id_co' => $cod->id_cot])}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit"><i class='bx bx-x'></i></button>
							</form>
							@endcan
						</td>
					</tr>
					@endif
				@endforeach					   
				<tr class="result">
					<td colspan="4"></td>
					<td>Sub Total:</td>
					<td colspan="2"><input type="text" name="subt" id="subtotal" readonly=""></td>
				</tr>
				<tr class="result">
					<td colspan="4"></td>
					<td class="igv">IGV de <input id="valor_igv" value="{{$igv->valor_igv}}" readonly="">%:</td>
					<td colspan="2"><input type="text" name="igv" id="igv" readonly=""></td>
				</tr>
				<tr class="result">
					<td colspan="4"></td>
					<td>Total:</td>
					<td colspan="2"><input type="text" name="total" id="total" readonly=""></td>
				</tr>
            </tbody>
        </table>
        <div class="return">
    		<a href="{{route('Cotizacion.index')}}">Regresar</a>
		</div> 
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search-prod').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('cotizacion_prod')}}",
					dataType: 'json',
					data: {
						e: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search-prod').val(ui.item.desc_prod);
	          $('#sn_prod').val(ui.item.sn_prod);
			  $('#prec').val(ui.item.pventa_prod);
	          return false;
	        }
		});
</script>
<script>
		$('#sn_prod').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('num_parte')}}",
					dataType: 'json',
					data: {
						d: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
			  $('#sn_prod').val(ui.item.label);
	          $('#search-prod').val(ui.item.desc_prod);
			  $('#prec').val(ui.item.pventa_prod);
	          return false;
	        }
		});
</script>
<script src="{{asset('vendor/js/multiplicar.js')}}"></script>
<script src="{{asset('vendor/js/sumar.js')}}"></script>
@endsection