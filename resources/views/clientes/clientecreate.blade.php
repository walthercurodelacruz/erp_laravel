@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar Cliente</div>
	<form action="{{route('Cliente.store')}}" method="post">
		@csrf
		<div class="details">
			<div class="details-box">
				<input type="hidden" name="cod" value="{{$codigo}}">
				<input type="hidden" name="num" value="{{$coda}}">
				<div class="box-input">
					<label>RUC cliente</label>
					<input type="text" maxlength="13" name="ruc" required="" value="{{old('ruc')}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<input type="text" name="direc" maxlength="200" required="" value="{{old('direc')}}">
				</div>
				<div class="box-input">
					<label>Telefono 1</label>
					<input type="text" maxlength="9" name="tel1" required="" value="{{old('tel1')}}">
				</div>
				<div class="box-input">
					<label>Celular 1</label>
					<input type="text" maxlength="9" name="cel1" required="" value="{{old('cel1')}}">
				</div>
				<div class="box-input">
					<label>Email 1</label>
					<input type="text" maxlength="100" name="email1" required="" value="{{old('email1')}}">
				</div>
				<div class="box-input">
					<label>Pagina WEB (opcional)</label>
					<input type="text" maxlength="200" name="web" value="{{old('web')}}">
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
			<div class="details-box details-right">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="100" name="razon" required="" value="{{old('razon')}}">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" maxlength="100" name="contact" required="" value="{{old('contact')}}">
				</div>
				<div class="box-input">
					<label>Telefono 2 (opcional)</label>
					<input type="text" maxlength="9" name="tel2" value="{{old('tel2')}}">
				</div>
				<div class="box-input">
					<label>Celular 2 (opcional)</label>
					<input type="text" maxlength="9" name="cel2" value="{{old('cel2')}}">
				</div>
				<div class="box-input">
					<label>Email 2 (opcional)</label>
					<input type="text" maxlength="100" name="email2" value="{{old('email2')}}">
				</div>
				<div class="box-input">
	            	<label>Area contacto</label>
					<select name="area" required="">
						<option></option>
						@foreach ($areas as $area)
						<option value="{{$area->nom_area}}">{{$area->nom_area}}</option>
						@endforeach			
					</select>
				</div>
				<div class="box-input">
					<label>Vendedor</label>
					<select name="asignado">
						<option value="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</option>
						@if(Auth::user()->tipo_user = 'Ventas')
							@foreach($usuarios as $usuario)
								<option value="{{$usuario->name}} {{$usuario->lastname}}">{{$usuario->name}} {{$usuario->lastname}}</option>
							@endforeach
						@endif
					</select>					
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