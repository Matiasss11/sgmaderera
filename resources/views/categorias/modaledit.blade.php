<style>
    .select2-container .select2-selection {
	line-height: 1.6 !important;
	height: 2.375rem !important;
	border-radius: 3px !important;
    }

</style>

<div class="modal fade" id="modal-edit-{{$categoria->id}}" data-backdrop="static" tabindex="-1" role="dialog" enctype="multipart/form-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar datos de la Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {{Form::Open(array(
                    'route'=>['categorias.update',$categoria], 'files' => true, 
                    'method'=>'patch'
                ))}}
                    <div class="row">   
                        <div class="col-4">
                            <div class="form-group">
                                <label for="razon_social">Nombre</label>
                                <input type="string"name="nombre"maxlength="30"value="{{$categoria->nombre}}"class="form-control"
                                    placeholder="Ingrese el nombre..."title="Introduzca el nombre">
                            </div>
                            <div class="form-group">
                                <label for="nombre"> Descripcion</label>
                                <textarea name="descripcion" rows="3" cols="30"title="Introduzca la descripcion""class="form-control"
                                    placeholder="Introduzca la descripcion">
                                    {{$categoria->descripcion}}
                                </textarea>
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
        </div>
    </div>
</div>

@push('scripts')

@endpush