@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="configuracion">Menu Configuraciones</a></li>
    <li class="breadcrumb-item active">Indice de Tipos de Movimiento</li>
@endsection


@section('content') <!-- Contenido -->

<div class="card ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i aria-hidden="true"></i> Indice de Tipos de Movimiento</p>
            </div>
            <div class="card-tools">
                <!--modalcreate-->
            </div>
        </div>
        <div class="card-body">
            

            
            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="30%" >nombre</th>
                        <th width="50%" >descripcion</th>
                        <th width="20%" >Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipomovimientos as $tipomovimiento)
                    
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td>{{ $tipomovimiento->nombre }}</td>
                        <td>{{ $tipomovimiento->descripcion }}</td>
                        
                        <td style="text-align: center" colspan="3">
                            <a data-backdrop="static" data-keyboard="false" data-target="#modal-edit-{{ $tipomovimiento->id }}" data-toggle="modal">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>@include('tipomovimiento.modaledit')                         
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

    <script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
    
        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
    
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
  </script>

<script>
    function soloNumeros(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        letras = " 1234567890";
        especiales = [8, 37, 39, 46];
    
        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
    
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }
  </script>

@endpush
@endsection

