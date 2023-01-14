@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="configuracion">Menu Configuraciones</a></li>
    <li class="breadcrumb-item active">Indice de empresa</li>
@endsection

<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

@section('content') <!-- Contenido -->

<div class="card ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i aria-hidden="true"></i> Indice de empresa</p>
            </div>
        @foreach ($empresas as $empresa)
            @if(is_null($empresa))
            <div class="card-tools">
                <a href= {{ route('empresa.create')}}>
                    <button class="btn btn-primary">
                        <i class=""></i> Nueva
                    </button>
                </a>
            </div>
            @endif
        @endforeach
        </div>
        <div class="card-body">
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa fa-filter" aria-hidden="true"></i> Filtrar
                    </a>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">

                   
                        
                    </div>
                </div>
            </div>
            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="20%" >Logo</th>   
                        <th width="40%" >Razon Social</th>
                        <th width="20%" >CUIT</th>
                        <th width="20%" >Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                    
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td style="text-align: center">
                            @if($empresa->logo == null)
                                <img src="{{ asset('imagenes/default.png')}}" width="50px" class="img-circle elevation-2" alt="">
                            @else
                                <img src="{{ asset('imagenes/logo/'.$empresa->logo)}}" width="50px" class="img-circle elevation-2" alt="">
                            @endif
                        </td>
                        <td>{{ $empresa->razon_social }}</td>
                        <td>{{ $empresa->cuit }}</td>
                        
                        <td style="text-align: center" colspan="3">
                            <a data-backdrop="static" data-keyboard="false" data-target="#modal-edit-{{ $empresa->id }}" data-toggle="modal">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>@include('empresa.modaledit')
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')

    <script src="{{asset('js/tablaDetalle.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function(){


            $("select").select2({width:'100%'});
        
            $('#telefono').mask('(0000) 00-0000');
            $('#cuit').mask('00-00000000-0');
        
        });



</script>

@endpush
@endsection

