@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
    <div class="box-sub">
        <div class="title">Crear Rol</div>

        {!! Form::open(array('route'=>'roles.store', 'method'=>'POST')) !!}
            <div class="details-content">
                <div class="head-input">
                    <label for="name">Nombre del rol</label>
                    <input type="text" name="name" required="">
                </div>
                <label>Permisos del rol</label>
                <div class="box-input">
	                @foreach($permission as $value)
	                    <div class="input-check">{{ Form::checkbox('permission[]', $value->id, false, array('class'=>'name'))}}{{$value->name}}</div>
	                @endforeach                	
                </div>
            </div>
            <div class="return">
                <a href="{{route('roles.index')}}">Regresar</a>
                <button type="submit">Guardar</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection