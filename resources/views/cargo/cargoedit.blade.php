@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Cargo</div>
	<form action="{{route('Cargo.update', $cargo->id_cargo)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="100" name="nom_cargo" value="{{$cargo->nom_cargo}}" required="">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Cargo.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	