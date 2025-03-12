@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar OC Cliente</div>
	<form action="{{route('Occliente.store')}}" method="post" enctype="multipart/form-data">
	@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<input type="hidden" name="cod_occ" value="{{$codigo}}">
				<div class="box-input">
					<label>RUC cliente</label>
					<input type="text" required="" maxlength="13" name="ruc_occ" id="rucc_cot">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" required="" maxlength="255" name="razons_occ" id="cliente_cot">
				</div>
			</div>
		</div>
		<div class="details-box-center">
			<div class="box-input">
				<label>Descripción</label>
				<textarea name="desc_occ" maxlength="500" cols="20" rows="7"></textarea>
			</div>
			<div class="box-input">
				<label>Adjuntar archivo</label>
				<input type="file" name="arch_occ" required="" accept=".pdf, .doc, .docx, ppt, .pptx, .xlsx">
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
					<input type="text" required="" maxlength="15" name="cot_occ" id="search_codcot">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>N° OC Cliente</label>
					<input type="text" maxlength="15" name="entrega_occ">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Occliente.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search_codcot').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('codcot_entrega')}}",
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
	          $('#search_codcot').val(ui.item.label);
			  $('#rucc_cot').val(ui.item.rucc_cot);
	          $('#cliente_cot').val(ui.item.cliente_cot);
	          return false;
	        }
		});
</script>

@endsection