{{--ventanita modal cuando se haga clic en eliminar--}}


<div class="modal fade modal-slide-in-right"
    aria-hidden="true"
    role="dialog"
    tabindex="-1"
    id="modal-show-{{$user->id}}">



    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="">
                <h3 class="modal-title" style="color: black"><i style="color: black" class="" aria-hidden="true"></i> Detalle del Usuario {{ $user->name }}</h3>
                <div class="modal-body">
                    <table class="table table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Nombre de Usuario</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Rol</th>
                                <td>{{ $user->getRoleNames() }}</td>
                            </tr>                    
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

