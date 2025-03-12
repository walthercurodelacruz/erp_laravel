@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar @if($producto->prod_serv == 1)Producto @else Servicio @endif {{$producto->cod_prod}}</div>
	<form action="{{route('Producto.update', $producto->id_prod)}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre/Item</label>
					<input type="text" maxlength="100" name="item_prod" required="" value="{{$producto->item_prod}}">
				</div>
				<div class="box-input">
					<label>P/Number</label>
					<input type="text" maxlength="20" readonly="" value="{{$producto->sn_prod}}">
				</div>
				<div class="box-input">
					<label>Modelo</label>
					<input type="text" maxlength="100" readonly="" value="{{$producto->modelo_prod}}">
				</div>
				<div class="box-input">
					<label>Precio Costo</label>
					<input type="text" name="pcosto_prod" required="" value="{{$producto->pcosto_prod}}">
				</div>
				<div class="box-input">
					<label>SKU</label>
					<input type="text" maxlength="9" name="dispo_prod" required="" value="{{$producto->dispo_prod}}">
				</div>
				<div class="box-input">
					<label>Descripción</label>
					<textarea cols="20" rows="8" maxlength="10000" name="desc_prod" required="">{{$producto->desc_prod}}</textarea>
				</div>		
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Fabricante</label>	
					<input type="text" maxlength="50" name="fabric_prod" required="" value="{{$producto->fabric_prod}}">

				</div>
				<div class="box-input">
					<label>Categoria</label>	
					<input type="text" value="{{$producto->categ_prod}}" readonly="">
				</div>
				<div class="box-input">
					<label>Precio Venta</label>	
					<input type="text" name="pventa_prod" required="" value="{{$producto->pventa_prod}}">
				</div>
				<div class="box-input">
					<label>Ruc Proveedor</label>
					<input type="text" maxlength="13" name="ruc_prov" id="search_ruc" required="" value="{{$producto->ruc_prov}}">
				</div>
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="50" name="razons_prov" id="razons" required="" value="{{$producto->razons_prov}}">
				</div>
				<div class="box-input">
		            <label>Estado</label>
					<select name="estado_prod" required="">
						<option value="1">Activo</option>
						<option value="0">Inactivo</option>
					</select>
				</div>
				<div class="box-input">
					<label>P/S</label>
					<select name="prod_serv" required="">
						<option value="{{$producto->prod_serv}}">@if ($producto->prod_serv == 1) Producto @else Servicio @endif</option>
						<option></option>
						<option value="1">Producto</option>
						<option value="0">Servicio</option>
					</select>
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('Producto.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search_ruc').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('rucprov_razons')}}",
					dataType: 'json',
					data: {
						i: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search_ruc').val(ui.item.label);
	          $('#razons').val(ui.item.razons);
	          return false;
	        }
		});
</script>

@endsection