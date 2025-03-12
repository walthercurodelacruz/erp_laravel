@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Estado</div>
	<form action="{{route('Estado.update', $estado->id_estado)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Estado</label>
					<input type="text" maxlength="50" name="nom_estado" value="{{$estado->nom_estado}}" required="">
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('Estado.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	