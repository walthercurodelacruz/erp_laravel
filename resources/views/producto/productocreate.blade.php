@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar Producto/Servicio</div>
	<form action="{{route('Producto.store')}}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="details-box">
			<div class="box-input">
				<label>Nombre/Item</label>
				<input type="text" maxlength="100" name="item_prod" required="">
			</div>
		</div>
		<div class="details">
			<input type="hidden" name="cod" value="{{$codigo}}">
			<input type="hidden" name="num" value="{{$coda}}">
			<div class="details-box">
				<div class="box-input">
					<label>P/Number</label>
					<input type="text" maxlength="20" name="sn_prod" required="">
				</div>
				<div class="box-input">
					<label>Modelo</label>
					<input type="text" maxlength="100" name="modelo_prod">
				</div>
				<div class="box-input">
					<label>Precio Costo</label>
					<input type="text" name="pcosto_prod">
				</div>
				<div class="box-input">
					<label>SKU</label>	
					<input type="text" maxlength="9" name="dispo_prod">
				</div>
				<div class="box-input">
					<label>Descripción</label>
					<textarea cols="20" rows="8" maxlength="10000" name="desc_prod"></textarea>
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Fabricante</label>	
					<input type="text" maxlength="50" name="fabric_prod" required="">
				</div>
				<div class="box-input">
					<label>Categorias</label>
					<select name="categ_prod" required="">
						@foreach ($categorias as $categoria)
						<option value="{{$categoria->nom_categ}}">{{$categoria->nom_categ}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Precio Venta</label>	
					<input type="text" name="pventa_prod">
				</div>
				<div class="box-input">
					<label>Ruc Proveedor</label>
					<input type="text" name="ruc_prov" id="search_ruc">
				</div>
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" name="razons_prov" id="razons">
				</div>
				<div class="box-input">
					<label>P/S</label>
					<select name="prod_serv" required="">
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