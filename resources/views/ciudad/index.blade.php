@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="configuracion">Menu Configuraciones</a></li>
    <li class="breadcrumb-item active">Indice de Ciudades</li>
@endsection


@section('content') <!-- Contenido -->

<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="card ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        <div class="card-header">
            <div class="card-title">
                <p style="font-size:130%"> <i aria-hidden="true"></i> Indice de Ciudades</p>
            </div>
            <div class="card-tools">
                <a data-keyboard="false" data-target="#modal-create" data-toggle="modal">
                    <button title="" class="btn btn-primary btn-responsive">
                        <i class="">Nuevo</i>
                    </button>
                </a>
                @include('ciudad.modalcreate')
            </div>
        </div>
        <div class="card-body">
            

            
            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="30%" >nombre</th>
                        <th width="20%" >código postal</th>
                        <th width="30%" >provincia</th>
                        <th width="20%" >Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($ciudades as $ciudad)
                    
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td>{{ $ciudad->nombre }}</td>
                        <td>{{ $ciudad->codigo_postal }}</td>
                        <td>{{ $ciudad->provincia->nombre }}</td>
                        <td style="text-align: center" colspan="3">
                                                      
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



            $(document).on('change','.pais_id',function(){
                var pais_id=$(this).val();
                var div=$(this).parent();
                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('alumno/create/encontrarProvincia')!!}',
                    data:{'id':pais_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-Seleccione una provincia-</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        div.find('.provincia_id').html(" ");
                        div.find('.provincia_id').append(op);
                    },
                    error:function(){
                    }
                });
            });

            $(document).on('change','.provincia_id',function(){
                var provincia_id=$(this).val();
                var div=$(this).parent();
                var op=" ";

            });




        });



</script>

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

