@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Crear OC Proveedor</div>
	<form action="{{route('OcProveedor.store')}}" method="post">
		@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="cod" value="{{$codigo}}">
				<input type="hidden" name="num" value="{{$coda}}">
				<div class="box-input">
					<label>RUC Proveedor</label>
					<input type="text" maxlength="13" id="ruc_prov" name="ruc_prov" required="" value="{{old('ruc_prov')}}">
				</div>
				<div class="box-input">
					<label>Responsable</label>
					<select name="respon_ocp">
						@foreach($usuarios as $usuario)
							@if($usuario->id_cargo == "Logistico")
							<option value="{{$usuario->name}} {{$usuario->lastname}}">{{$usuario->name}} {{$usuario->lastname}}</option>
							@endif
						@endforeach
						</select>	
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<select name="entrega_ocp" required="">
						<option></option>
						@foreach ($entrega as $ent)
						<option value="{{$ent->nom_tentrega}}">{{$ent->nom_tentrega}}</option>
						@endforeach			
					</select>	
				</div>
				<div class="box-input">
					<label>Contacto</label>		
					<input type="text" maxlength="50" name="contacto_ocp" id="contacto_prov" required="" value="{{old('contacto_ocp')}}">
				</div>
				<div class="box-input">
					<label>Cotización proveedor</label>		
					<input type="text" maxlength="12" name="cod_cot" required="" value="{{old('cod_cot')}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
	            	<label>Estado</label>
					<select name="estado_ocp" required="">
						<option></option>
						@foreach ($estados as $estado)
						<option value="{{$estado->nom_ocp}}">{{$estado->nom_ocp}}</option>
						@endforeach			
					</select>
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="mon_ocp" required="">
						<option></option>
						@foreach ($moneda as $mon)
						<option value="{{$mon->nom_moneda}}">{{$mon->nom_moneda}}</option>
						@endforeach			
					</select>
				</div>
				<div class="box-input">
					<label>Razon social</label>		
					<input type="text" maxlength="50" required="" name="razons_ocp" id="search_razons" value="{{old('razons_ocp')}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>	
					<input type="text" maxlength="100" required="" name="direc_ocp" id="direc_prov" value="{{old('direc_ocp')}}">
				</div>
			</div>	
		</div>
		<div class="return">
			<a href="{{route('OcProveedor.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search_razons').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('buscar_proveedor')}}",
					dataType: 'json',
					data: {
						c: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search_razons').val(ui.item.label);
	          $('#ruc_prov').val(ui.item.ruc_prov);
	          $('#direc_prov').val(ui.item.direc_prov);
	          $('#contacto_prov').val(ui.item.contacto_prov);
	          return false;
	        }
		});
</script>

@endsection