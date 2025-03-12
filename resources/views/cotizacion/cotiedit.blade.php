@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Actualizar Cotización</div>
	<form action="{{route('Cotizacion.update', $cotizacion->id_cot)}}" method="post">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Cotización N°:</label>
					<input type="text" name="cod_cot" value="{{$cotizacion->cod_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Razon Rocial</label>
					<input type="text" name="nom" value="{{$cotizacion->cliente_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Ruc cliente</label>
					<input type="text" name="rucc_cot" value="{{$cotizacion->rucc_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" id="contacto_clie" name="contacto" value="{{$cotizacion->cliente_cot}}" readonly="" >
				</div>
				<div class="box-input">
					<label>Cargo</label>
					<input type="text" id="area" name="cargo" value="{{$cotizacion->cargo_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Garantía</label>
					<input type="text" id="garantia" name="garantia" value="{{$cotizacion->garantia}}">
				</div>
				<div class="box-input">
					<label>Condición del Producto</label>
					<input type="text" id="condproduc" name="condproduc" value="{{$cotizacion->condproduc}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<textarea type="text" name="direc" id="di" >{{$cotizacion->direc_cot}}</textarea>
				</div>	
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Fase de Estado</label>
					<select name="estado">
						<option value="{{$cotizacion->estado_cot}}">Asignado | {{$cotizacion->estado_cot}}</option>
						@foreach($estado as $est)
							<option value="{{$est->nom_estado}}">{{$est->nom_estado}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Forma de pago</label>
					<select name="fpago">
						<option value="{{$cotizacion->fpago_cot}}">Asignado | {{$cotizacion->fpago_cot}}</option>
						@foreach($fpago as $pago)
							<option value="{{$pago->nom_fpago}}">{{$pago->nom_fpago}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Tiempo de entrega</label>
					<select name="tentrega">
						<option value="{{$cotizacion->tentrega_cot}}">Asignado | {{$cotizacion->tentrega_cot}}</option>
						@foreach($tentrega as $entrega)
							<option value="{{$entrega->nom_tentrega}}">{{$entrega->nom_tentrega}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Validez de oferta</label>
					<select name="expira" >
						<option value="{{$cotizacion->expira_cot}}">Asignado | {{$cotizacion->expira_cot}}</option>
						@foreach($expira as $exp)
							<option value="{{$exp->nom_expira}}">{{$exp->nom_expira}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<input type="text" id="asignado" name="asignado" value="{{$cotizacion->asignado_cot}}" readonly="">
				</div>
				<div class="box-input">
					<label>Moneda</label>
					<select name="moneda">
						<option value="{{$cotizacion->moneda_cot}}">Asignado | {{$cotizacion->moneda_cot}}</option>
						@foreach($moneda as $mon)
							<option value="{{$mon->nom_moneda}}">{{$mon->nom_moneda}}</option>
						@endforeach
					</select>
				</div>
				<div class="box-input">
					<label>Simbolo</label>
					<input type="text" maxlength="100" id="simbolo" name="simbolo" value="{{$cotizacion->simbolo}}">
				</div>
				<div class="box-input">
					<label>Impuestos</label>
					<input type="text" maxlength="100" id="impuestos" name="impuestos" value="{{$cotizacion->impuestos}}">
				</div>	
			</div>	
		</div>
		<div class="details-box-center">
			<div class="box-input">
					<label>Cuentas Bancarias</label>
					<textarea name="condgeneral" required="" cols="20" rows="7" readonly="">{{$cotizacion->condgeneral_cot}}</textarea>
			</div>
			<div class="box-input">
					<label>Pie de pagina</label>
					<textarea name="pie" rows="7" cols="30" readonly="">{{$cotizacion->pie_cot}}</textarea>
			</div>	
		</div>		
		<div class="return">
    		<a href="{{route('Cotizacion.index')}}">Regresar</a>			
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection