@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Estados</p>
                    </div>      
                    <div class="createSegment"> 
                     <a href="{{route('EstadoOcp.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>                  
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">ID</td>
                                <td style="min-width:150px;">Nombre de estado</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($estados as $estado)
                            <tr>
								<td>{{$estado->id_ocp}}</td>
								<td>{{$estado->nom_ocp}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        <a href="{{route('EstadoOcp.edit', $estado->id_ocp)}}"><i class='bx bxs-edit-alt'></i></a>
                                    </span>
                                    <span class="actionCust add_flex">
                                        <form action="{{route('EstadoOcp.destroy', $estado->id_ocp)}}" method="post">
											@csrf
											@method('DELETE')
											<button type="submit"><i class='bx bx-x' ></i></button>
										</form>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection