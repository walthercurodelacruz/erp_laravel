@extends('home')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                        <p>Roles</p>
                    </div>                         
                    <div class="createSegment">
                        @can('crear-rol')
                                <a class="btn btn-warning" href="{{route('roles.create')}}">Nuevo</a>
                            @endcan
                    </div>
                </div>
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">N°</td>
                                <td style="min-width:100px;">Rol</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>                 
                        <tbody>
                            <input type="hidden" value="{{$i = 0}}">
                            @foreach($roles as $role)
                            <input type="hidden" value="{{$i++}}">
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$role->name}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        @can ('editar-rol')
                                            <a href="{{route('roles.edit', $role->id)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can ('borrar-rol')
                                            <form action="{{route('roles.destroy', $role->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"><i class='bx bx-x' ></i></button>
                                            </form>
                                        @endcan
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$roles->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection