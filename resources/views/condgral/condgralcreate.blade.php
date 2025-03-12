@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
<div class="box-sub">
    <div class="title">Ingresar Condición General</div>
	<form action="{{route('CondicionGral.store')}}" method="post">
	@csrf
		<div class="details">
			<div class="details-box">
				<div class="box-input">
					<label>Condicion general</label>
					<textarea cols="20" rows="8" maxlength="500" required="" name="nom_condgeneral"></textarea>
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