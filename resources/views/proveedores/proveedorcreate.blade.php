@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar Proveedor</div>
	<form action="{{route('Proveedor.store')}}" method="post">
		@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="cod" value="{{$codigo}}">
				<input type="hidden" name="num" value="{{$coda}}">
				<div class="box-input">
					<label>RUC proveedor</label>
					<input type="text" maxlength="13" name="ruc" required="" value="{{old('ruc')}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<input type="text" maxlength="100" name="direc" required="" value="{{old('direc')}}">
				</div>
				<div class="box-input">
					<label>Celular 1</label>	
					<input type="text" maxlength="9" name="cel1" required="" value="{{old('cel1')}}">
				</div>
				<div class="box-input">
					<label>Email 1</label>		
					<input type="text" maxlength="50" name="email1" required="" value="{{old('email1')}}">
				</div>
				<div class="box-input">
					<label>Pagina WEB (opcional)</label>	
					<input type="text" maxlength="200" name="web" value="{{old('web')}}">
				</div>				
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="100" name="razon" required="" value="{{old('razon')}}">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" maxlength="100" name="contact" required="" value="{{old('contact')}}">
				</div>
				<div class="box-input">
					<label>Celular 2 (opcional)</label>		
					<input type="text" maxlength="9" name="cel2" value="{{old('cel1')}}">
				</div>
				<div class="box-input">
					<label>Email 2 (opcional)</label>	
					<input type="text" maxlength="50" name="email2" value="{{old('email2')}}">
				</div>
				<div class="box-input">
	            	<label>Estado</label>
					<select name="estado" required="">
						<option></option>
						@foreach ($estado as $est)
						<option value="{{$est->nom_estado}}">{{$est->nom_estado}}</option>
						@endforeach			
					</select>
				</div>
			</div>
		</div>
		<div class="return">
			<a href="{{route('Proveedor.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection