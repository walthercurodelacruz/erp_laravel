@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar almacen</div>
	<form action="{{route('Almacen.update', $alma->id_alm)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="50" name="nom_alm" value="{{$alma->nom_alm}}" required="">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Almacen.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	