@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
	<p><h5 align="right">Ayuda | Ingresar el N° de OCC</h5></p>	
    <div class="title">Registrar Facturas Emitidas</div>
	<form action="{{route('Ftout.store')}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="cod_ftout" value="{{$codigo}}">
				<div class="box-input">
					<label>RUC cliente</label>
					<input type="text" required="" maxlength="13" name="ruc_ftout" id="ruc_occliente">
				</div>
				<div class="box-input">
				<label>N° de Factura</label>
				<input type="text" required="" maxlength="50" name="desc_ftout">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" required="" maxlength="250" name="razons_ftout" id="razons_occliente">
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="moneda_ftout" required="">
						<option>Seleciona una opcion</option>
							<option value="DOLARES">DOLARES</option>
							<option value="SOLES">SOLES</option>
					</select>
				</div>
			</div>
		</div>
		<div class="details-box-center">
			
			<div class="box-input">
				<label>Adjuntar archivo</label>
				<input type="file" name="arch_ftout" required="" accept=".pdf, .doc, .docx, ppt, .pptx, .xlsx">
				@error('arch_occ')
                	<br>
                	<small>*{{$message}}</small>
                @enderror
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>COT</label>
					<input type="text" maxlength="15" name="cot_ftout" id="cot_occliente">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>N° OCC</label>
					<input type="text" maxlength="15" name="entrega_ftout" id="buscar_numocc">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Sub Total</label>
					<input type="text" maxlength="15" name="subtotal_ftout">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Total</label>
					<input type="text" maxlength="15" name="total_ftout">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>F. Emisión</label>
					<input type="date" maxlength="15" name="femi_ftout">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>F. Vencimiento</label>
					<input type="date" maxlength="15" name="fcaduca_ftout">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Ftout.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#buscar_numocc').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('buscar_numocc')}}",
					dataType: 'json',
					data: {
						w: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#buscar_numocc').val(ui.item.label);
	          $('#ruc_occliente').val(ui.item.ruc_occliente);
	          $('#razons_occliente').val(ui.item.razons_occliente);
	          $('#cot_occliente').val(ui.item.cot_occliente);
	          return false;
	        }
		});
</script>
<script>
		$('#cot_occliente').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('cod_occliente')}}",
					dataType: 'json',
					data: {
						t: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#cot_occliente').val(ui.item.label);
	          $('#ruc_occliente').val(ui.item.ruc_occliente);
	          $('#razons_occliente').val(ui.item.razons_occliente);
	          $('#buscar_numocc').val(ui.item.entrega_occliente);
	          return false;
	        }
		});
</script>
<script>
		$('#razons_occliente').autocomplete({
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
	          $('#razons_occliente').val(ui.item.label);
	          $('#ruc_occliente').val(ui.item.ruc_clie);
	          return false;
	        }
		});
</script>
<script>
		$('#ruc_occliente').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('ruc_cliente')}}",
					dataType: 'json',
					data: {
						n: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#ruc_occliente').val(ui.item.label);
	          $('#razons_occliente').val(ui.item.razons);
	          return false;
	        }
		});
</script>
@endsection