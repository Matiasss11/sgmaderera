@if (count($errors)>0)
    <div class="alert alert-danger"data-auto-dismiss role="alert">
        <p>La acción no pudo realizarse, corrija los siguientes errores:</p>
        <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>        
@endif