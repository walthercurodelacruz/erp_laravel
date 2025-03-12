@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Categorias</p>
                    </div>      
                    <div class="createSegment"> 
                     <a href="{{route('Categorias.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>                  
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">ID</td>
                                <td style="min-width:150px;">Nombre de categoria</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($categorias as $categoria)
                            <tr>
								<td>{{$categoria->id_categ}}</td>
								<td>{{$categoria->nom_categ}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        <a href="{{route('Categorias.edit', $categoria->id_categ)}}"><i class='bx bxs-edit-alt'></i></a>
                                    </span>
                                    <span class="actionCust add_flex">
                                        <form action="{{route('Categorias.destroy', $categoria->id_categ)}}" method="post">
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