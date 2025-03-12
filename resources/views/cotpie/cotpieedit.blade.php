@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Pie de Página</div>
	<form action="{{route('PieCot.update', $cotpie->id_pie)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Pie de página</label>
					<textarea cols="20" rows="8" maxlength="500" required="" name="nom_pie" required="">{{$cotpie->nom_pie}}</textarea>
				</div>
			</div>	
		</div>
		<div class="return">
			<a href="{{route('PieCot.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	