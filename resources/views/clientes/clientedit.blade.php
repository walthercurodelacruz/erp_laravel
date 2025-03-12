@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Cliente</div>
	<form action="{{route('Cliente.update', $cliente->id_clie)}}" method="post">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Cod. Cliente</label>
					<input type="text" readonly="" name="cod" value="{{$cliente->cod_clie}}">					
				</div>
				<div class="box-input">
	            	<label>RUC cliente</label>
					<input type="text" maxlength="13" name="ruc" required="" value="{{old('ruc', $cliente->ruc_clie)}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<input type="text" maxlength="200" name="direc" required="" value="{{old('direc', $cliente->direc_clie)}}">
				</div>
				<div class="box-input">
					<label>Telefono 1</label>		
					<input type="text" maxlength="9" name="tel1" required="" value="{{old('tel1', $cliente->tel1_clie)}}">
				</div>
				<div class="box-input">
					<label>Celular 1</label>		
					<input type="text" maxlength="9" name="cel1" required="" value="{{old('cel1', $cliente->cel1_clie)}}">
				</div>
				<div class="box-input">
					<label>Email 1</label>	
					<input type="text" maxlength="100" name="email1" required="" value="{{old('email1', $cliente->email1_clie)}}">
				</div>
				<div class="box-input">
					<label>Pagina WEB (opcional)</label>		
					<input type="text" maxlength="200" name="web" value="{{old('web', $cliente->pagweb_clie)}}">
				</div>									
				<div class="box-input">
	            	<label>Estado</label>
					<select name="estado">
						<option value="{{$cliente->estado}}">{{$cliente->estado}}</option>
						<option></option>
						@foreach ($estado as $est)
						<option value="{{$est->nom_estado}}">{{$est->nom_estado}}</option>
						@endforeach			
					</select>					
				</div>
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="100" name="razon" required="" value="{{old('razon', $cliente->razons_clie)}}">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" maxlength="100" name="contact" required="" value="{{old('contact', $cliente->contacto_clie)}}">
				</div>
				<div class="box-input">
					<label>Telefono 2 (opcional)</label>		
					<input type="text" maxlength="9" name="tel2" value="{{old('tel2', $cliente->tel2_clie)}}">
				</div>
				<div class="box-input">
					<label>Celular 2 (opcional)</label>		
					<input type="text" maxlength="9" name="cel2" value="{{old('cel2', $cliente->cel2_clie)}}">
				</div>
				<div class="box-input">
					<label>Email 2 (opcional)</label>	
					<input type="text" maxlength="100" name="email2" value="{{old('email2', $cliente->email2_clie)}}">
				</div>
				<div class="box-input">
					<label>Area contacto</label>
					<input type="text" value="{{$cliente->area}}" readonly="">
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<input type="text" value="{{$cliente->asignado}}" readonly="">
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Cliente.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection