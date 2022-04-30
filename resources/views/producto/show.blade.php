<!-- Modals detalles -->
<div class="modal fade" id="productoModal{{$producto->id}}" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $producto->nombre }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <strong>Descripcion:</strong>
                        {{ $producto->descripcion }}
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $producto->estado ? "Activo" : "Inactivo" }}
                    </div>
                    <div class="form-group">
                        <strong>Caracteristicas:</strong>
                        {{ $producto->caracteristicas }}
                    </div>
                    <div class="form-group">
                        <strong>Stock:</strong>
                        {{ $producto->stock }}
                    </div>
                    <div class="form-group">
                        <strong>Precio Base:</strong>
                        {{ $producto->precio_base }}
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('storage')."/productos/".$producto->imagen }}" alt="" class="img-thumbnail img-fluid" width="200">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>