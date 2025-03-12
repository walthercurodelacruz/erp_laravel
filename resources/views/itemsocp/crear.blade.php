@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
	<form action="{{route('guardar_item_ocp', $cod->id_ocp)}}" method="post">
	@csrf 
		<div class="title-input"><input class="codigo" type="text" name="cod_ocp" readonly="" value="{{$cod->cod_ocp}}"></div>
		<table class="table cust-datatable">
            <thead>
                <tr>
                	<td style="min-width:100px;">OP</td>
                    <td style="min-width:100px;">ITEM</td>
                    <td style="min-width:100px;">NOTA</td>
                    <td style="min-width:100px;">CANTIDAD</td>
                    <td style="min-width:100px;">COSTO</td>
                    <td style="min-width:100px;" colspan="2">PRECIO NETO</td>
                </tr>
            </thead>
            <tbody>
            	<input type="hidden" name="id_compras" id="id-compras">
            	<input type="hidden" name="prov_compras" value="{{$cod->razons_ocp}}">
            	<input type="hidden" name="mon_compras" value="{{$cod->mon_ocp}}">
            	<input type="hidden" name="cot_prov_compras" value="{{$cod->cod_cot}}">
            	<input type="hidden" name="ocp_compras" value="{{$cod->cod_ocp}}">
				<tr>
					<td><input type="text" required="" maxlength="10" name="cod_op" id="cod-op" placeholder="codigo op"></td>
					<td><input type="text" required="" maxlength="50" name="item_ocp" id="search-prod-op" placeholder="item"></td>
					<td><input type="text" required="" maxlength="100" name="nota_ocp" id="nota-ocp" placeholder="nota"></td>
					<td><input type="text" required="" maxlength="9" name="cant_ocp" id="cant" placeholder="cantidad"></td>
					<td><input type="text" required="" name="costo_ocp" id="prec" placeholder="costo"></td>
					<td><input type="text" required="" name="total_ocp" id="precio_neto" placeholder="resultado" readonly=""></td>
					<td><button class="check" type="submit"><i class='bx bx-check' ></i></button></td>
	</form>
				</tr>
				<input type="hidden" value="{{$i = -1}}">
				@foreach($item as $it)
					@if($it->cod_ocp == $cod->cod_ocp)
					<input type="hidden" value="{{$i++}}">
					<tr class="body">
						<td>{{$it->cod_op}}</td>
						<td><input type="text" name="cant_items" value="{{$it->item_ocp}}" readonly=""></td>
						<td>{{$it->nota_ocp}}</td>
						<td>{{$it->cant_ocp}}</td>
						<td>{{$it->costo_ocp}}</td>
						<td><input type="text" id="precio_neto{{$i}}" value="{{$it->total_ocp}}" readonly=""></td>
						<td>
							@can('borrar-itemsocp')
							<form action="{{route('eliminar_item_ocp', ['id_it' => $it->id_ocpi, 'id_co' => $cod->id_ocp])}}" method="post">
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
    		<a href="{{route('OcProveedor.index')}}">Regresar</a>
		</div> 
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search-prod-op').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('item_compras')}}",
					dataType: 'json',
					data: {
						h: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search-prod-op').val(ui.item.label);
	          $('#nota-ocp').val(ui.item.nota);
	          $('#cant').val(ui.item.cant);
	          $('#id-compras').val(ui.item.id);
	          $('#cod-op').val(ui.item.cod);
	          return false;
	        }
		});
</script>
<script src="{{asset('vendor/js/multiplicar.js')}}"></script>
<script src="{{asset('vendor/js/sumar.js')}}"></script>

@endsection