@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Factura Recibida N° {{$ftin->cod_ftin}}</div>
	<form action="{{route('Ftin.update', $ftin->id_ftin)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>RUC Proveedor</label>
					<input type="text" maxlength="13" required="" name="ruc_ftin" id="ruc_prov" value="{{$ftin->ruc_ftin}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="250" required="" name="razons_ftin" id="razons_ocp" value="{{$ftin->razons_ftin}}">
				</div>
			</div>
		</div>
		<div class="details">
		<div class="details-box">
			<div class="box-input">
				<label>N° de Factura</label>
				<input type="text" required="" maxlength="50" name="desc_ftin" value="{{$ftin->desc_ftin}}">
			</div>
		</div>
		<div class="details-box">
			<div class="box-input">
				<label>Moneda</label>
				<input type="text" readonly maxlength="50" name="moneda_ftin" value="{{$ftin->moneda_ftin}}">
			</div>
		</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>OCP</label>
					<input type="text" maxlength="15" name="cot_ftin" id="buscar_ocp" value="{{$ftin->cot_ftin}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>COT PROV</label>
					<input type="text" maxlength="15" name="entrega_ftin" id="cod_cot" value="{{$ftin->entrega_ftin}}">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Sub Total</label>
					<input type="text" maxlength="15" name="subtotal_ftin" value="{{$ftin->subtotal_ftin}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Total</label>
					<input type="text" maxlength="15" name="total_ftin" value="{{$ftin->total_ftin}}">
				</div>
			</div>
		</div>
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>F. Emisión</label>
					<input type="text" maxlength="15" name="femi_ftin" value="{{$ftin->femi_ftin}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>F. Vencimiento</label>
					<input type="text" maxlength="15" name="fcaduca_ftin" value="{{$ftin->fcaduca_ftin}}">
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