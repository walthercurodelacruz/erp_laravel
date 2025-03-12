@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar OC Proveedor</div>
	<form action="{{route('OcProveedor.update', $ocp->id_ocp)}}" method="post">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>RUC Proveedor</label>
					<input type="text" maxlength="13" id="search_ruc" name="ruc_prov" readonly value="{{old('ruc_prov', $ocp->ruc_prov)}}">
				</div>
				<div class="box-input">
					<label>Responsable</label>
					<select name="respon_ocp">
						<option value="{{$ocp->respon_ocp}}">Asignado | {{$ocp->respon_ocp}}</option>
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
						<option value="{{$ocp->entrega_ocp}}">Asignado | {{$ocp->entrega_ocp}}</option>
						@foreach ($entrega as $ent)
						<option value="{{$ent->nom_tentrega}}">{{$ent->nom_tentrega}}</option>
						@endforeach			
					</select>	
				</div>
				<div class="box-input">
					<label>Contacto</label>		
					<input type="text" maxlength="50" name="contacto_ocp" id="contacto" required="" value="{{old('contacto_ocp', $ocp->contacto_ocp)}}">
				</div>
				<div class="box-input">
					<label>Cotización proveedor</label>		
					<input type="text" maxlength="12" name="cod_cot" required="" value="{{old('cod_cot', $ocp->cod_cot)}}">
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
	            	<label>Estado</label>
					<select name="estado_ocp" required="">
						<option value="{{$ocp->estado_ocp}}">Asignado | {{$ocp->estado_ocp}}</option>
						@foreach ($estados as $estado)
						<option value="{{$estado->nom_ocp}}">{{$estado->nom_ocp}}</option>
						@endforeach			
					</select>
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="mon_ocp" required="">
						<option value="{{$ocp->mon_ocp}}">Asignado | {{$ocp->mon_ocp}}</option>
						@foreach ($moneda as $mon)
						<option value="{{$mon->nom_moneda}}">{{$mon->nom_moneda}}</option>
						@endforeach			
					</select>
				</div>
				<div class="box-input">
					<label>Razon social</label>		
					<input type="text" maxlength="50" readonly name="razons_ocp" id="razons" value="{{old('razons_ocp', $ocp->razons_ocp)}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>	
					<input type="text" maxlength="100" required="" name="direc_ocp" id="direc" value="{{old('direc_ocp', $ocp->direc_ocp)}}">
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
		$('#search_ruc').autocomplete({
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
	          $('#search_ruc').val(ui.item.label);
	          $('#direc').val(ui.item.direc);
	          $('#razons').val(ui.item.razons);
	          $('#contacto').val(ui.item.contacto);
	          return false;
	        }
		});
</script>

@endsection