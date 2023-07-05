@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <p style="font-size:130%"> <i aria-hidden="true"></i>Entregas</p>

                            <div class="float-right">
                                <a href="{{ route('presupuestos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nueva
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tablaDetalle"  class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Estado</th>
                                        <th>Cliente</th>
                                        {{-- <th>Domicilio</th> --}}
                                        <th>Fecha de Entrega</th>
                                        <th>Sucursal</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entregas as $entrega)
                                        <tr>
                                            <td>@if ($entrega->estado_entrega_id == 1)
                                                    <label style="font-size: 70%" class="badge badge-warning">PENDIENTE</label>
                                                @else
                                                    <label style="font-size: 70%" class="badge badge-success">ENTREGADO</label>
                                                @endif
                                            </td>
                                            <td>@if (isset($entrega->venta->presupuesto->cliente))
                                                    {{$entrega->venta->presupuesto->cliente->nombre}} {{$entrega->venta->presupuesto->cliente->apellido}}
                                                @else
                                                    {{$entrega->venta->presupuesto->cliente->razon_social}}
                                                @endif
                                            </td>
                                            {{-- <td>{{ $entrega->venta->presupuesto->cliente->ciudad }}</td> --}}
                                            <td>{{ $entrega->created_at->format('d M, Y'); }}</td>
                                            <td>{{ $entrega->venta->sucursal() }}</td>

                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary " href="{{ route('reservas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a> --}}
                                                {{-- <a class="btn btn-sm btn-success" href=""><i class="fa fa-fw fa-edit"></i> Editar fecha ???</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $entregas->links() !!}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('js/tablaDetalle.js')}}"></script>
    @endpush
@endsection
