@extends('layouts.admin')  <!-- Extiende de layout -->

@section('navegacion')
    <li class="breadcrumb-item"><a href="configuracion">Menu Configuraciones</a></li>
    <li class="breadcrumb-item active">Indice de sucursal</li>
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
                <p style="font-size:130%"> <i aria-hidden="true"></i> Indice de sucursal</p>
            </div>
            <div class="card-tools">
                <a href= {{ route('sucursales.create')}}>
                    <button class="btn btn-primary">
                        <i class=""></i> Nueva
                    </button>
                </a>
            </div>
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
                    @foreach ($sucursales as $sucursal)
                    
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td style="text-align: center">
                            @if($sucursal->empresa->logo == null)
                                <img src="{{ asset('imagenes/default.png')}}" width="50px" class="img-circle elevation-2" alt="">
                            @else
                                <img src="{{ asset('imagenes/logo/'.$sucursal->empresa->logo)}}" width="50px" class="img-circle elevation-2" alt="">
                            @endif
                        </td>
                        <td>{{ $sucursal->razon_social }}</td>
                        <td>{{ $sucursal->cuit }}</td>
                        
                        <td style="text-align: center" colspan="3">
                            <a data-backdrop="static" data-keyboard="false" data-target="#modal-edit-{{ $sucursal->id }}" data-toggle="modal">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            @include('sucursal.modaledit')
                            
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
                    url:'{!!URL::to('sucursal/create/encontrarProvincia')!!}',
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



                $.ajax({
                    type:'get',
                    url:'{!!URL::to('sucursal/create/encontrarCiudad')!!}',
                    data:{'id':provincia_id},
                    success:function(data){
                        op+='<option value="0" selected disabled>-Seleccione una ciudad-</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
                        }
                        div.find('.ciudad_id').html(" ");
                        div.find('.ciudad_id').append(op);
                    },
                    error:function(){
                    }
                });
            });
        
        
            $('#telefono').mask('(0000) 00-0000');
            $('#cuit').mask('00-00000000-0');
        
        });



</script>

@endpush
@endsection

