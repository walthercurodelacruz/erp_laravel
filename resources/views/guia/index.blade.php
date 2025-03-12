@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
				<p><h5 align="right">Conectado | {{ Auth::user()->name }} {{ Auth::user()->lastname }}</h5></p>	
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Listado de guias de entrada</p>
                    </div>
                    <div class="createSegment">
                        @can('crear-guia')
                         <a href="{{route('Guia_In.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i>Crear nuevo</a>    
                        @endcan
                         <form method="GET">
                            <input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}"></td>
                            <button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>               
                    </div>  
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:150px;">Ruc proveedor</td>
                                <td style="min-width:150px;">Razon S.</td>
                                <td style="min-width:150px;">Fecha llegada</td>
                                <td style="min-width:150px;">Archivo</td>
                                <td style="min-width:150px;">N° guia de ingreso</td>
                                <td style="width:130px;">Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                             @if(count($guias)<=0)
                                <tr>
                                    <td colspan="7">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else 
                        	@foreach ($guias as $guia)
                            <tr>
								<td><a href="{{route('Guia_In.show', $guia->id_guia)}}">{{$guia->cod_guia}}</a></td>
								<td>{{$guia->rucp_guia}}</td>
                                <td>{{$guia->razons_guia}}</td>
                                <td>{{$guia->fecha_guia}}</td>
                                <td><form action="{{route('download')}}" method="post">
                                        @csrf
                                        <input hidden="" type="text" name="archivo" value="{{$guia->arch_guia}}">
                                        <button type="submit"><i class='bx bx-download'></i></button>
                                    </form></td>
                                <td>{{$guia->num_guia}}</td>
                                <td class="action">
                                <span class="actionCust">
                                        @can('editar-guia')
                                        <a href="{{route('Guia_In.edit', $guia->id_guia)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-guia')
                                        <form action="{{route('Guia_In.destroy', $guia->id_guia)}}" method="post">
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
                        {!!$guias->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection