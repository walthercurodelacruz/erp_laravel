@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Actualizar Guia</div>
	<form action="{{route('Guia_In.update', $guia->id_guia)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>RUC proveedor</label>
					<input type="text" required="" maxlength="13" name="rucp_guia" id="search_ruc" value="{{$guia->rucp_guia}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" required="" maxlength="50" name="razons_guia" id="razons" value="{{$guia->razons_guia}}">
				</div>
			</div>
		</div>
		<div class="details-box-center">
			<div class="box-input">
				<label>Direccion origen</label>
				<input type="text" required="" maxlength="100" name="direc_guia" id="direc_prov" value="{{$guia->direc_guia}}">
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Fecha llegada</label>
					<input type="date" required="" name="fecha_guia">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Hora llegada</label>
					<input type="time" required="" name="hora_guia">
				</div>
			</div>
		</div>
		<div class="details-box-center">
			<div class="box-input">
				<label>Adjuntar archivo</label>
				<input type="file" required="" name="arch_guia" accept=".pdf, .jpg, .png">
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>OCP</label>
					<input type="text" required="" maxlength="12" id="ocp_ing" name="op_guia" value="{{$guia->ocp_guia}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Numero guia de ingreso</label>
					<input type="text" required="" maxlength="12" id="search_gin" name="num_guia" value="{{$guia->num_guia}}">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Guia_In.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#razons').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('pro_razons')}}",
					dataType: 'json',
					data: {
						m: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#razons').val(ui.item.label);
	          $('#search_ruc').val(ui.item.ruc_prov);
	          $('#direc_prov').val(ui.item.direc_prov);
	          return false;
	        }
		});
</script>
<script>
		$('#search_gin').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('guia_entrada')}}",
					dataType: 'json',
					data: {
						j: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search_gin').val(ui.item.label);
	          $('#item_ing').val(ui.item.item_ing);
	          $('#search_ruc').val(ui.item.rucp_ing);
	          $('#razons').val(ui.item.razons_ing);
	          $('#ocp_ing').val(ui.item.ocp_ing);
	          return false;
	        }
		});
</script>

@endsection