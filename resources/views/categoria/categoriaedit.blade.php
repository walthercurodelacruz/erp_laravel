@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Categoría</div>
	<form action="{{route('Categorias.update', $categ->id_categ)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Nombre de categoria</label>
					<input type="text" maxlength="50" name="nom_categ" value="{{$categ->nom_categ}}" required="">
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('Categorias.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	