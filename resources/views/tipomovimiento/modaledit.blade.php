<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="modal fade" id="modal-edit-{{$tipomovimiento->id}}" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar una tipomovimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{Form::Open(array(
                    'route'=>['tipomovimiento.update',$tipomovimiento->id],
                    'method'=>'patch'
                ))}}
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="nombre"> Nombre</label>
                                <input type="string"name="nombre"maxlength="30"value="{{$tipomovimiento->nombre}}"class="form-control"
                                    placeholder="Ingrese el nombre..."title="Introduzca el nombre" onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="descripcion"> Descripcion</label>
                                <input type="string"name="descripcion" value="{{$tipomovimiento->descripcion}}"class="form-control"
                                    placeholder="Ingrese la descripcion..."title="Introduzca la descripcion" onkeypress="return soloLetras(event)">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="text-align:center">
                    <label>

                    </label>
                    <br>
                    <button title="Limpiar" class="btn btn-danger" type="reset"><i class="fa fa-eraser"></i> Limpiar</button>
                    <button title="Guardar" id="confirmar" class="btn btn-primary" type="submit"> <i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
            {{Form::Close()}}
        </div>
    </div>
</div>

@push('scripts')

@endpush