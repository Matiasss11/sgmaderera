{{--ventanita modal cuando se haga clic en eliminar--}}


<div class="modal fade modal-slide-in-right"
     aria-hidden="true"
     role="dialog"
     tabindex="-1"
     id="modal-delete-{{$role->id}}">

     <form method="POST" action="{{route('roles.destroy', $role->id)}}" style="display: inline;">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#C82333">
              <h3 class="modal-title" style="color: white"><i style="color: white" class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar</h3>
               
              </div>
              <div class="modal-body" style="color: black">
                <p style="font-size:120%">¿Desea dar de baja al siguiente rol <b>{{$role->name}}</b>?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                @include('errors.request')


              </div>
            </div>
          </div>


          
    </form>

</div>

