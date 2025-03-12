@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/form_style.css')}}">
<div class="box">
    <div class="box-sub">
        <div class="title">Editar Rol</div>

        {!! Form::model($role, ['method'=>'PUT', 'route'=>['roles.update', $role->id]]) !!}
            <div class="details-content">
                <div class="head-input">
                    <label for="name">Nombre del rol</label>
                    <input type="text" name="name" required="" value="{{$role->name}}">
                </div>
                <label>Permisos del rol</label>
                <div class="box-input">
                    @foreach($permission as $value)
                        <div class="input-check">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermission) ?true : false, array('class' => 'name'))}}{{$value->name}}</div>
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