
@extends('layouts.admin')
@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Indice de Configuraciones</li>
@endsection



@section('content')
    <div class="card-body">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#D2D6DE">
            @include('errors.request')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" >
                        <i class="fa fa-cogs" aria-hidden="true"></i>Configuraciones
                    </h4>
                </div>
                <div class="card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Empresa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-industry"></i>
                                    </div>
                                    <a href="{{ route('empresas.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Sucursal</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <a href="{{ route('sucursales.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Parametros de Cobro</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Paises</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-globe-americas"></i>
                                    </div>
                                    <a href="{{ route('pais.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Provincias</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <a href="{{ route('provincia.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Ciudades</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <a href="{{ route('ciudad.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Categorias de Productos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <a href="{{ route('categorias.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Tipos de Documento</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3></h3>
                                        <p style="font-size:150%">Tipos de Movimiento</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-balance-scale"></i>
                                    </div>
                                    <a href="{{ route('tipomovimiento.index') }}" class="small-box-footer">
                                        Más Información <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    @push('scripts')
    <script src="{{asset('js/tablaDetalle.js')}}"></script>


    @endpush
    @endsection