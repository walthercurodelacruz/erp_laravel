@extends('home') 
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/table-style.css') }}">
<div class="p-30">
    <div class="row">
        <div class="col-md-12 main-datatable">
            <div class="card_body">
                <div class="d-flex">
                    <div class="add_flex">
                    	<p>Clientes</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-cliente')
                            <a href="{{route('Cliente.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                        @endcan
                    </div>
                </div>
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:100px;">RUC cliente</td>
                                <td style="min-width:100px;">Razon social</td>
                                <td style="min-width:100px;">Contacto</td>
                                <td style="min-width:100px;">Celular</td>
                                <td style="min-width:100px;">Email</td>
                                <!-- <td style="min-width:100px;">Estado</td> -->
                                <td style="width:130px;">Accion</td>
                            </tr>
                        </thead>  
                        <tbody>
                        	<tr class="tr-buscar"><form method="GET">
                                <td><input type="text" name="cod" placeholder="Buscar" value="{{$cod}}"></td>
                                <td><input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}"></td>
                                <td><input type="text" name="razon" placeholder="Buscar" value="{{$razon}}"></td>
                                <td><input type="text" name="contact" placeholder="Buscar" value="{{$contact}}"></td>
                                <td><input type="text" name="cel" placeholder="Buscar" value="{{$cel}}"></td>
                                <td><input type="text" name="mail" placeholder="Buscar" value="{{$mail}}"></td>
                                <!-- <td><input type="text" name="est" placeholder="Buscar" value="{{$est}}"></td> -->
                                <td><button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button></td>
                                </form>
                            </tr>
                            @if(count($clientes)<=0)
                                <tr>
                                    <td colspan="9">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($clientes as $cliente)
                            <tr>
                                <td><a href="{{route('Cliente.show', $cliente->id_clie)}}">{{$cliente->cod_clie}}</a></td>
                                <td>{{$cliente->ruc_clie}}</td>					
                                <td>{{$cliente->razons_clie}}</td>
								<td>{{$cliente->contacto_clie}}</td>
								<td>{{$cliente->cel1_clie}}</td>
								<td>{{$cliente->email1_clie}}</td>
								<!-- <td>{{$cliente->estado}}</td> -->
                                <td class="action">
                                    <span class="actionCust">
                                        @can('editar-cliente')
                                            <a href="{{route('Cliente.edit', $cliente->id_clie)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-cliente')
                                        <form action="{{route('Cliente.destroy', $cliente->id_clie)}}" method="post">
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
                        {!!$clientes->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection