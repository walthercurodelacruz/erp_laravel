@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Crear cotización</div>
	<form action="{{route('Cotizacion.store')}}" method="post">
		@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="num" value="{{$coda}}">
				<div class="box-input">
					<label>Cotización N°:</label>
					<input type="text" name="cod_cot" value="{{$codigo}}" readonly="">
				</div>
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="100" id="search" name="nom" required="">
				</div>
				<div class="box-input">
					<label>Ruc cliente</label>
					<input type="text" maxlength="13" id="ruc_clie" name="rucc_cot" required="">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" maxlength="100" id="contacto_clie" name="contacto" required="">
				</div>
				<div class="box-input">
					<label>Cargo</label>
					<input type="text" maxlength="100" id="area" name="cargo" >
				</div>
				<div class="box-input">
					<label>Garantía</label>
					<input type="text" maxlength="100" id="garantia" name="garantia" value="1 Año de Fábrica" >
				</div>
				<div class="box-input">
					<label>Condición del Producto</label>
					<input type="text" maxlength="100" id="condproduc" name="condproduc" value="100% Original">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<textarea type="text" maxlength="500" name="direc" id="di" required=""></textarea>
				</div>	
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Fase de Estado</label>
					<select name="estado" required="">
						<option>Seleciona una opcion</option>
						@foreach($estado as $est)
							<option value="{{$est->nom_estado}}">{{$est->nom_estado}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Forma de pago</label>
					<select name="fpago" required="">
						<option>Seleciona una opcion</option>
						@foreach($fpago as $pago)
							<option value="{{$pago->nom_fpago}}">{{$pago->nom_fpago}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<select name="tentrega" required="">
						<option>Seleciona una opcion</option>
						@foreach($tentrega as $entrega)
							<option value="{{$entrega->nom_tentrega}}">{{$entrega->nom_tentrega}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Validez de oferta</label>
					<select name="expira" required="">
						<option>Seleciona una opcion</option>
						@foreach($expira as $exp)
							<option value="{{$exp->nom_expira}}">{{$exp->nom_expira}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<select name="asignado">
						<option value="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</option>
						@foreach($usuarios as $usuario)
							@if($usuario->id_cargo == "Ejecutivo Comercial")
								<option value="{{$usuario->name}} {{$usuario->lastname}}">{{$usuario->name}} {{$usuario->lastname}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="moneda" required="">
						<option>Seleciona una opcion</option>
						@foreach($moneda as $mon)
							<option value="{{$mon->nom_moneda}}">{{$mon->nom_moneda}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Simbolo</label>
					<input type="text" id="simbolo" name="simbolo" value="$">
				</div>
				<div class="box-input">
					<label>Impuestos</label>
					<input type="text" id="impuestos" name="impuestos" value="Precio Unitario no Inc. IGV">
				</div>
			</div>	
		</div>
		<div class="details-box-center">
			<div class="box-input">
				<label>Cuentas Bancarias</label>
				@foreach($condgeneral as $general)
					<textarea name="condgeneral" required="" cols="20" rows="7">{{$general->nom_condgeneral}}</textarea>
				@endforeach
			</div>
			<div class="box-input">
				<label>Pie de pagina</label>
				@foreach($pie as $pi)
					<textarea name="pie" required="" rows="7" cols="30">{{$pi->nom_pie}}</textarea>
				@endforeach
			</div>
		</div>
		<div class="return">
			<a href="{{route('Cotizacion.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.6.0.js')}}"></script>
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
		$('#search').autocomplete({
			source: function(request, response){
				$.ajax({
					url: "{{route('buscar_cliente')}}",
					dataType: 'json',
					data: {
						b: request.term
					},
					success: function(data){
						response(data);
					}
				});
			},
			select: function (event, ui) {
	          $('#search').val(ui.item.label);
	          $('#di').val(ui.item.direc_clie);
	          $('#ruc_clie').val(ui.item.ruc_clie);
			  $('#contacto_clie').val(ui.item.contacto_clie);
			  $('#area').val(ui.item.area);
	          return false;
	        }
		});
</script>
@endsection