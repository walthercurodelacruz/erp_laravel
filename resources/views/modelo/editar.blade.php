@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar modelo</div>
	<form action="{{route('Modelo.update', $modelo->id_modelo)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="100" name="nom_modelo" value="{{$modelo->nom_modelo}}" required="">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Modelo.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	