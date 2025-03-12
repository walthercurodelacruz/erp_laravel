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
                    	<p>Ordenes de pedido</p>
                    </div>
                    <div class="createSegment">
                        <form method="GET">
                            <input type="text" name="ruc" placeholder="Buscar ruc" value="{{$ruc}}">
                            <button class="btn-buscar" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div> 
                <div>
                    <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                        <thead>
                            <tr>
                                <td style="min-width:100px;">N°</td>
                                <td style="min-width:100px;">Ruc cliente</td>
                                <td style="min-width:100px;">Cliente</td>
                                <td style="min-width:100px;">Estado</td>
                                <td style="min-width:100px;">Creación</td>
                                <td style="width:170px;">Accion</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($opedidos)<=0)
                                <tr>
                                    <td colspan="6">
                                        <h4 style="color: black; float: left; font-size: 20px;">No hay resultados</h4>
                                    </td>
                                </tr>
                            @else
                        	@foreach ($opedidos as $opedido)
                                <tr>
                                    <td><a href="{{route('Opedido.show', $opedido->id_op)}}">{{$opedido->cod_op}}</a></td>
                                    <td>{{$opedido->rucc_op}}</td>
                                    <td>{{$opedido->cliente_op}}</td>
                                    <td>{{$opedido->estado_op}}</td>
                                    <td>{{$opedido->update_op}}</td>
                                    <td class="action">
                                        <span class="actionCust">
                                            @can('crear-compras')
                                            <a href="{{route('Opedido.edit', $opedido->id_op)}}"><i class='bx bxs-edit-alt'></i></a>
                                            @endcan
                                        </span>
                                        <span class="actionCust add_flex">
                                            @can('borrar-op')
                                        <form action="{{route('Opedido.destroy', $opedido->id_op)}}" method="post">
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
                        {!!$opedidos->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection