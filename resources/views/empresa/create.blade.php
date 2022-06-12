@extends('layouts.admin')
  <!-- Extiende de layout -->

@section('content')

<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Registrar Organización</h3>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/empresa">Indice de Organizacion</a></li>
            <li class="breadcrumb-item active">Registrar Organización</li>
        </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        @include('errors.request')
        @include('empresa.mensaje')
        {!!Form::open(array('url'=>'empresa','method'=>'POST','autocomplete'=>'off','files' => true,))!!}
        {{Form::token()}}

        <div class="card card-dark">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="nomrazon_socialbres"> Razón Social</label>
                        <input type="string"name="razon_social"maxlength="30"value="{{old('razon_social')}}"class="form-control"
                            placeholder="Ingrese la razón social..."title="Introduzca la razón social">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="cuit">CUIT</label>
                        <input type="string"name="cuit"maxlength="30"value="{{old('cuit')}}"class="form-control"
                            placeholder="Ingrese el cuit..."title="Introduzca el cuit">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="fecha_creacion">Fecha de Creación</label>
                        <input  type="date"name="fecha_creacion"value="{{old('fecha_creacion')}}"class="form-control"
                            placeholder="dia/mes/año"title="Introduzca la fecha de creacion">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="telefono">Telefono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="telefono"name="telefono"value="{{old('telefono')}}"class="input-group form-control"
                            placeholder="Introduzca el número"title="Introduzca un número de telefono">
                    </div>
                </div><br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="email">E-mail</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email"name="email"value="{{old('email')}}"class="input-group form-control"
                            placeholder="uncorreo@mail.com..."title="Introduzca un correo electrónico">
                    </div>
                </div><br>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="logo_sistema">Logo del Sistema</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-file-image" aria-hidden="true"></i></span>
                            </div>
                            <input id="file"type="file" name="logo_sistema"class="form-control img-responsive">
                        </div>
                        <hr>
                        <div id="preview"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card card-dark">
            <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="logo_reportes">Logo para Reportes</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-file-image" aria-hidden="true"></i></span>
                            </div>
                            <input id="file"type="file"name="logo_reportes"class="form-control img-responsive">
                        </div>
                        <hr>
                        <div id="preview"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label>Pais</label>
                        <select  name="pais_id"id="pais_id"class="pais_id form-control"required>
                            <option value="0"disabled="true"selected="true"title="Seleccione un pais">
                                -Seleccione un pais-
                            </option>
                            @foreach ($paises as $pais)
                                <option
                                    value="{{$pais->id }}">{{$pais->nombre}}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        <label>Provincia</label>
                        <select name="provincia_id"id="provincia_id"class="provincia_id form-control"required>
                            <option value="0"disabled="true"selected="true"title="Seleccione una provincia">
                                -Seleccione una provincia-
                            </option>
                        </select>
                        <br>
                        <label>Ciudad</label>
                        <select name="ciudad_id"id="ciudad_id"class="ciudad_id form-control"required>
                            <option value="0"disabled="true"selected="true"title="Seleccione una ciudad">
                                -Seleccione una ciudad-
                            </option>
                        </select>
                        <br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="direccion">
                                        Dirección
                                    </label>
                                    <input type="string"name="direccion"value="{{old('direccion')}}"class="form-control"
                                        placeholder="Introdusca la direccion"title="Introduzca la direccion">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="piso">
                                        Piso
                                    </label>
                                    <input type="string"name="piso"value="{{old('piso')}}"class="form-control"
                                        placeholder="Introdusca el piso"title="Introduzca el piso">
                                </div>
                            </div>
                            
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="departamento">
                                        Departamento
                                    </label>
                                    <input type="string"name="departamento"value="{{old('departamento')}}"class="form-control"
                                        placeholder="Introdusca el departamento"title="Introduzca la departamento">
                                </div>
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group" style="text-align:center">
                                    <button title="Limpiar" class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                                    <button title="Guardar" id="confirmar" class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
    
</div>

{!!Form::close()!!}

    @push('scripts')
    <script type="text/javascript">

        $(document).ready(function(){


            $("select").select2({width:'100%'});



            $(document).on('change','.pais_id',function(){
                var pais_id=$(this).val();
                var div=$(this).parent();
                var op=" ";

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('empresa/create/encontrarProvincia')!!}',
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
                    url:'{!!URL::to('empresa/create/encontrarCiudad')!!}',
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
        });



</script>
@endpush

@endsection

