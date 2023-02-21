@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    @can('listar membresias')
    <li class="breadcrumb-item"><a href="/ventas">Ventas</a></li>
    @endcan
    <li class="breadcrumb-item active">Indice de Movimientos</li>
@endsection

@section('content') <!-- Contenido -->

<div class="card ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <div class="card-body">
        <p style="font-size:130%"> <i aria-hidden="true"></i>Movimientos</p>
        <hr>
            <h6><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</h6>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @include('movimiento.search')
            <br>
            </div>

            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="20%">Fecha</th>   
                        <th width="10">Movimiento</th>
                        <th width="25%">Concepto</th>
                        <th width="25%">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0;?>
                    @foreach ($movimientos as $movimiento)
                    
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        
                        <td>{{ Carbon\Carbon::parse($movimiento->created_at)->format('d/m/Y') }}</td>
                        <td>{{ $movimiento->subtipo_movimiento->tipo->nombre }}</td> 
                        <td>{{ $movimiento->subtipo_movimiento->nombre }}</td>
                        <td style="text-align:right">$ {{ $movimiento->monto }}</td>
                    </tr>
                    <?php
                        $total=$total+$movimiento->monto;
                    ?>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <td style="font-size:110%" width="20%"><b>Total</b></td>
                        <td width="10%"></td>
                        <td width="25%"></td>
                        <td style="text-align:right; font-size:110%" width="25%"><b>$ {{ $total }}</b></td>
                    </tr>
                </tfoot>
            </table>
            
            
        </div>
    </div>
</div>

    @push('scripts')
        <script src="{{asset('js/tablaDetalle.js')}}"></script>
    @endpush
@endsection

