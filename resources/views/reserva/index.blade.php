@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <p style="font-size:130%"> <i aria-hidden="true"></i>Reservas</p>

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
                                        <th>No</th>
                                        <th>Cliente</th>
                                        <th>Fecha de reserva</th>
                                        <th>Fecha de retiro</th>
                                        <th>Precio total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            <td>@if (isset($venta->presupuesto->cliente))
                                                    {{$venta->presupuesto->cliente->nombre}} {{$venta->presupuesto->cliente->apellido}}
                                                @else
                                                    {{$venta->presupuesto->cliente->razon_social}}
                                                @endif
                                            </td>
                                            <td>{{ $venta->created_at->format('d M, Y');}}</td>
                                            <td>{{ $venta->fecha_de_retiro->format('d M, Y');}}</td>
                                            <td>${{ number_format($venta->precio_total, 2, '.', ',')}}</td>

                                            <td>
                                                <a class="btn btn-sm btn-primary " href="{{ route('reservas.show',$venta->id) }}"><i class="fa fa-fw fa-eye"></i> Detalle</a>
                                                {{-- <a class="btn btn-sm btn-success" href=""><i class="fa fa-fw fa-edit"></i> Editar fecha ???</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $ventas->links() !!}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('js/tablaDetalle.js')}}"></script>
    @endpush
@endsection
