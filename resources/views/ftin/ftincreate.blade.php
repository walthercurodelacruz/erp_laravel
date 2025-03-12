@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
	<p><h5 align="right">Ayuda | Ingresar OCP</h5></p>	
    <div class="title">Registrar Factura Recibida</div>
	<form action="{{route('Ftin.store')}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="cod_ftin" value="{{$codigo}}">
				<div class="box-input">
					<label>RUC Proveedor</label>
					<input type="text" required="" maxlength="13" name="ruc_ftin" id="ruc_prov">
				</div>
				<div class="box-input">
				<label>N° de Factura</label>
				<input type="text" required="" maxlength="50" name="desc_ftin">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" required="" maxlength="250" name="razons_ftin" id="razons_ocp">
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="moneda_ftin" required="">
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
				<input type="file" name="arch_ftin" required="" accept=".pdf, .doc, .docx, ppt, .pptx, .xlsx">
				@error('arch_occ')
                	<br>
                	<small>*{{$message}}</small>
                @enderror
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>OCP</label>
					<input type="text" maxlength="15" name="cot_ftin" id="buscar_ocp">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>COT PROV</label>
					<input type="text" maxlength="15" name="entrega_ftin" id="cod_cot">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Sub Total</label>
					<input type="text" maxlength="15" name="subtotal_ftin">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Total</label>
					<input type="text" maxlength="15" name="total_ftin">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>F. Emisión</label>
					<input type="date" maxlength="15" name="femi_ftin">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>F. Vencimiento</label>
					<input type="date" maxlength="15" name="fcaduca_ftin">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Ftin.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#buscar_ocp').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('buscar_ocp')}}",
					dataType: 'json',
					data: {
						r: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#buscar_ocp').val(ui.item.label);
	          $('#ruc_prov').val(ui.item.ruc_prov);
	          $('#razons_ocp').val(ui.item.razons_ocp);
	          $('#cod_cot').val(ui.item.cod_cot);
	          $('#estado_ocp').val(ui.item.estado_ocp);
	          $('#respon_ocp').val(ui.item.respon_ocp);
	          return false;
	        }
		});
</script>
<script>
		$('#ruc_prov').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('ruc_proveedor')}}",
					dataType: 'json',
					data: {
						g: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#ruc_prov').val(ui.item.label);
	          $('#razons_ocp').val(ui.item.razons);
	          return false;
	        }
		});
</script>
<script>
		$('#razons_ocp').autocomplete({
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
	          $('#razons_ocp').val(ui.item.label);
	          $('#ruc_prov').val(ui.item.ruc_prov);
	          return false;
	        }
		});
</script>
@endsection