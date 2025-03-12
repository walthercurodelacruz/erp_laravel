@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Usuarios</p>
                    </div>      
                    <div class="createSegment"> 
                        @can('crear-user')
                            <a href="{{route('User-admin.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a> 
                        @endcan
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:150px;">Nombre</td>
                                <td style="min-width:150px;">Apellido</td>
                                <td style="min-width:150px;">Correo</td>
                                <td style="min-width:100px;">DNI</td>
                                <td style="min-width:100px;">Estado</td>
                                <td style="min-width:100px;">Tipo Usuario</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
							@if(count($usuarios)<=0)
								<tr>
									<td colspan="9">
										<h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
									</td>
								</tr>
							@else
                        	@foreach ($usuarios as $usuario)
                            <tr>
                                <td><a href="{{route('User-admin.show', $usuario->id)}}">{{$usuario->cod_emp}}</a></td>
								<td>{{$usuario->name}}</td>
								<td>{{$usuario->lastname}}</td>
								<td>{{$usuario->email}}</td>
								<td>{{$usuario->dni}}</td>
								<td>@if($usuario->estado == 1) Activo @else Inactivo @endif</td>
								<td>{{$usuario->id_cargo}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        @can('editar-user')
                                            <a href="{{route('User-admin.edit', $usuario->id)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-user')
                                            <form action="{{route('User-admin.destroy', $usuario->id)}}" method="post">
    											@csrf
    											@method('DELETE')
    											<button type="submit"><i class='bx bx-x' ></i></button>
    										</form>
                                        @endcan
                                    </span>
                                </td>						
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        {!!$usuarios->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection