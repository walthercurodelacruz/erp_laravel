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
                    	<p>Facturas Recibidas</p>
                    </div>      
                    <div class="createSegment">
                        @can('crear-occ')
                            <a href="{{route('Ftin.create')}}" class="btn dim_button create_new"><i class='bx bx-plus-medical' ></i> Crear Nuevo</a>
                        @endcan
                        <form method="GET">
                            <input type="text" name="ruc" placeholder="Buscar" value="{{$ruc}}">
                            <button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>   
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">Codigo</td>
                                <td style="min-width:100px;">RUC Proveedor</td>
                                <td style="min-width:100px;">Razon Social</td>
                                <td style="min-width:100px;">N° Factura</td>
                                <td style="min-width:100px;">Archivo</td>
                                <td style="min-width:100px;">OCP</td>
                                <td style="width:130px;">Accion</td>
                            </tr>
                        </thead>  
                        <tbody>
                            @if(count($ftins)<=0)
                                <tr>
                                    <td colspan="7">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($ftins as $ftin)
                            <tr>
                                <td><a href="{{route('Ftin.show', $ftin->id_ftin)}}">{{$ftin->cod_ftin}}</a></td>
                                <td>{{$ftin->ruc_ftin}}</td>					
                                <td>{{$ftin->razons_ftin}}</td>
                                <td>{{$ftin->desc_ftin}}</td>
                                <td><form action="{{route('download')}}" method="post">
                                        @csrf
                                        <input hidden="" type="text" name="archivo" value="{{$ftin->arch_ftin}}">
                                        <button type="submit"><i class='bx bx-download'></i></button>
                                    </form>
								</td>
								<td>{{$ftin->cot_ftin}}</td>
                                <td class="action">
                                    <span class="actionCust">
                                        @can('editar-occ')
                                            <a href="{{route('Ftin.edit', $ftin->id_ftin)}}"><i class='bx bxs-edit-alt'></i></a>
                                        @endcan
                                    </span>
                                    <span class="actionCust add_flex">
                                        @can('borrar-occ')
                                        <form action="{{route('Ftin.destroy', $ftin->id_ftin)}}" method="post">
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
                        {!!$ftins->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection