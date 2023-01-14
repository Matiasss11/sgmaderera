{{--ventanita modal cuando se haga clic en ver--}}
<div class="modal fade modal-slide-in-right"
     aria-hidden="true"
     role="dialog"
     tabindex="-1"
     id="modal-show-{{$a->id}}">



    {{Form::Open(array(
        'action'=>array('AuditController@index',$a->id),
        'method'=>'get'
        ))}}  



        <div class="modal-dialog">
            <!--contenido del modal-->
            <div class="modal-content">
                
                <!-- cabecera del modal -->
                <div class="modal-header" style="background-color:#357CA5">
                    <h3 class="modal-title" style="color:#FFFFFF">Detalles del Usuario <b>{{$a->user->name}}</b></h3>
                </div>

                <!--cuerpo del modal-->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-md-12">
                                    <h5><b>Ficha Técnica</b></h5>
                                    <ul class="list-group">
                                        <li>Enlace : {{$a->url }}</li>
                                        <li>Navegador : {{$a->user_agent }}</li>
                                        <li>Direccion IP : {{$a->ip_address }}</li>
                                        <li>Tipo Auditable : {{$a->auditable_type }}</li>

                                    </ul>                   
                            </div>
                        </div>                     
                    </div>
                </div>

                <!--pie del modal-->
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-12 ml-auto">
                                <button type="button" class="btn btn-default btn-responsive" data-dismiss="modal">
                                <i class="fa fa-close"> Cerrar</i>
                            </button>
                            @include('errors.request')
                        </div>
                    </div>
                </div>
               
            
            </div>    
        </div>


</div>

    {{Form::Close()}}

</div>
