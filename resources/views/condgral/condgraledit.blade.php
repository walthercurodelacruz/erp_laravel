@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Editar Condición General</div>
	<form action="{{route('CondicionGral.update', $condgral->id_condgeneral)}}" method="post">
	@csrf
	@method('PUT')
		<div class="details">
			<div class="details-box">
				<div class="box-input">
	            	<label>Condicion general</label>
					<textarea cols="20" rows="8" maxlength="500" required="" name="nom_condgeneral">{{$condgral->nom_condgeneral}}</textarea>
				</div>
			</div>	
		</div>	
		<div class="return">
			<a href="{{route('CondicionGral.index')}}">Regresar</a>
			<button type="submit">Guardar</button>
		</div>
	</form>
</div>
</div>
@endsection	