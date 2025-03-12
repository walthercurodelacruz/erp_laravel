@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
	<p><h5 align="right">Ayuda | Ingresar N° de Guia / Luego Razon Social</h5></p>	
    <div class="title">Registrar Guia de Salida</div>
	<form action="{{route('Guia_Sa.store')}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="cod" value="{{$codigo}}">
				<div class="box-input">
					<label>RUC cliente</label>
					<input type="text" required="" maxlength="13" name="rucc_guia" id="clie_ruc">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" required="" maxlength="50" name="razons_guia" id="clie_razons">
				</div>
			</div>
		</div>
		<div class="details-box-center">
			<div class="box-input">
				<label>Direccion origen</label>
				<input type="text" required="" maxlength="100" name="direc_guia" id="clie_direc">
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Fecha salida</label>
					<input type="date" required="" name="fecha_guia">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Hora salida</label>
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
					<label>OCC</label>
					<input type="text" required="" maxlength="12" name="occ_guia" id="clie_occ">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Numero Guia de Salida</label>
					<input type="text" required="" maxlength="12" name="num_guia" id="guia_sal">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Guia_Sa.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#clie_razons').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('cli_razons')}}",
					dataType: 'json',
					data: {
						f: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#clie_razons').val(ui.item.label);
	          $('#clie_ruc').val(ui.item.ruc_clie);
	          $('#clie_direc').val(ui.item.direc_clie);
	          return false;
	        }
		});
</script>
<script>
		$('#guia_sal').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('guia_salida')}}",
					dataType: 'json',
					data: {
						u: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#guia_sal').val(ui.item.label);
	          $('#clie_ruc').val(ui.item.rucc_sal);
	          $('#clie_razons').val(ui.item.razons_sal);
	          $('#clie_occ').val(ui.item.occ_sal);
	          return false;
	        }
		});
</script>

@endsection