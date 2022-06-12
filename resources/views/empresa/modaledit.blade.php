<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="modal fade" id="modal-edit-{{$empresa->id}}" data-backdrop="static" tabindex="-1" role="dialog" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos de la Organización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {{Form::Open(array(
                    'route'=>['empresa.update',$empresa->id], 'files' => true, 
                    'method'=>'patch'
                ))}}
                    <div class="row">   
                        <div class="col-4">
                            <div class="form-group">
                                <label for="razon_social"> Razon Social</label>
                                <input type="string"name="razon_social"maxlength="30"value="{{$empresa->razon_social}}"class="form-control"
                                    placeholder="Ingrese la razon social..."title="Introduzca el razon_social" onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cuit"> CUIT</label>
                                <input type="text"name="cuit"id="cuit"maxlength="30"value="{{$empresa->cuit}}"class="form-control"
                                    placeholder="Ingrese el cuit..."title="Introduzca el cuit" onkeypress="return soloNumeros(event)">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="telefono"> Telefono</label>
                                <input type="text"name="telefono"id="telefono"maxlength="30"value="{{$empresa->telefono}}"class="form-control"
                                    placeholder="Ingrese el telefono..."title="Introduzca el telefono" onkeypress="return soloNumeros(event)">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="descripcion"> E-mail</label>
                                <input type="email"name="email"value="{{$empresa->email}}"class="input-group form-control"
                                placeholder="uncorreo@mail.com..."title="Introduzca un correo electrónico">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="fecha_creacion">Fecha de Inicio</label>
                                <input type="date"name="fecha_creacion"value="{{ $empresa->fecha_creacion }}"class="form-control"
                                title="fecha de inicio">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                {!! Form::file('logo') !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                            <label>Pais</label>
                            <select name="pais_id"id="pais_id"class="pais_id custom-select"required>
                                <option value="0"disabled="true"selected="true"title="Seleccione un pais">
                                    -Seleccione un pais-
                                </option>
                                @foreach($paises as $pais)
                                    @if (old('paises', $empresa->domicilio->ciudad->provincia->pais_id)== $pais->id)
                                        <option value="{{$pais->id}}" selected>
                                            {{$pais->nombre}}
                                        </option>
                                    @else
                                        <option value="{{$pais->id}}">
                                            {{$pais->nombre}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <label>Provincia</label>
                            <select name="provincia_id"id="provincia_id"class="provincia_id custom-select"required>
                                <option value="0"disabled="true"selected="true"title="Seleccione una provincia">
                                    -Seleccione una provincia-
                                </option>
                                @foreach($provincias as $provincia)
                                    @if (old('provincias', $empresa->domicilio->ciudad->provincia_id)== $provincia->id)
                                        <option value="{{$provincia->id}}" selected>
                                            {{$provincia->nombre}}
                                        </option>
                                    @else
                                        <option value="{{$provincia->id}}">
                                            {{$provincia->nombre}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <br>
                            <label>Ciudad</label>
                            <select name="ciudad_id"id="ciudad_id"class="ciudad_id custom-select"required>
                                <option value="0"disabled="true"selected="true"title="Seleccione un barrio">
                                    -Seleccione una ciudad-
                                </option>
                                @foreach($ciudades as $ciudad)
                                    @if (old('ciudades', $empresa->domicilio->ciudad_id)== $ciudad->id)
                                        <option value="{{$ciudad->id}}" selected>
                                            {{$ciudad->nombre}}
                                        </option>
                                    @else
                                        <option value="{{$ciudad->id}}">
                                            {{$ciudad->nombre}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="direccion">
                                    Dirección
                                </label>
                                <input
                                    type="string"
                                    name="direccion"
                                    value="{{$empresa->domicilio->direccion}}"
                                    class="form-control"
                                    placeholder="Introdusca la direccion"
                                    title="Introduzca la direccion">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="piso">
                                    Piso
                                </label>
                                <input
                                    type="string"
                                    name="piso"
                                    value="{{$empresa->domicilio->piso}}"
                                    class="form-control"
                                    placeholder="Introdusca el piso"
                                    title="Introduzca el piso">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="departamento">
                                    Departamento
                                </label>
                                <input
                                    type="string"
                                    name="departamento"
                                    value="{{$empresa->domicilio->departamento}}"
                                    class="form-control"
                                    placeholder="Introdusca el departamento"
                                    title="Introduzca la departamento">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="text-align:center">
                    <button title="Limpiar" class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                    <button title="Guardar" id="confirmar" class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
            {{csrf_field()}}
            {{Form::Close()}}
            </form>
        </div>
    </div>
</div>

@push('scripts')

@endpush