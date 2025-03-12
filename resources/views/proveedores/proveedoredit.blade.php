@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Proveedor</div>
	<form action="{{route('Proveedor.update', $proveedor->id_prov)}}" method="post">
		@csrf
		@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Cod.Proveedor</label>
					<input type="text" readonly="" name="cod" value="{{$proveedor->cod_prov}}">
				</div>
				<div class="box-input">
					<label>RUC proveedor</label>
					<input type="text" maxlength="13" name="ruc" required="" value="{{old('ruc', $proveedor->ruc_prov)}}">
				</div>
				<div class="box-input">
					<label>Dirección</label>
					<input type="text" maxlength="100" name="direc" required="" value="{{old('direc', $proveedor->direc_prov)}}">
				</div>
				<div class="box-input">
					<label>Celular 1</label>		
					<input type="text" maxlength="9" name="cel1" required="" value="{{old('cel1', $proveedor->cel1_prov)}}">
				</div>
				<div class="box-input">
					<label>Email 1</label>		
					<input type="text" maxlength="50" name="email1" required="" value="{{old('email1', $proveedor->email1_prov)}}">
				</div>
				<div class="box-input">
					<label>Pagina WEB (opcional)</label>	
					<input type="text" maxlength="200" name="web" value="{{old('web', $proveedor->pagweb_prov)}}">
				</div>				
			</div>
			<div class="details-box">
				<div class="box-input">
					<label>Razon social</label>
					<input type="text" maxlength="100" name="razon" required="" value="{{old('razon', $proveedor->razons_prov)}}">
				</div>
				<div class="box-input">
					<label>Contacto</label>
					<input type="text" name="contact" maxlength="100" required="" value="{{old('contact', $proveedor->contacto_prov)}}">
				</div>
				<div class="box-input">
					<label>Celular 2 (opcional)</label>		
					<input type="text" maxlength="9" name="cel2" value="{{old('cel1', $proveedor->cel2_prov)}}">
				</div>
				<div class="box-input">
					<label>Email 2 (opcional)</label>		
					<input type="text" maxlength="50" name="email2" value="{{old('email2', $proveedor->email2_prov)}}">
				</div>
				<div class="box-input">
	            	<label>Estado</label>
					<select name="estado">
						<option value="{{$proveedor->estado_prov}}">{{$proveedor->estado_prov}}</option>
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