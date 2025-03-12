@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar unidad de medida</div>
	<form action="{{route('Unidad_M.update', $medida->id_um)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre</label>
					<input type="text" maxlength="50" name="nom_um" required="" value="{{$medida->nom_um}}">
				</div>
			</div>	
		</div>		
		<div class="return">
			<a href="{{route('Unidad_M.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	