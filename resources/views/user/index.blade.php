
@extends('layouts.admin')
@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item active">Indice de Usuarios</li>
    <li class="breadcrumb-item"><a href="/roles">Roles</a></li>
@endsection

@section('content')
    <div class="card-body">
        @include('errors.request')
        @include('user.mensaje')
        @include('errors.request')
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <p style="font-size:180%"> <i aria-hidden="true"></i> Indice de Usuarios</p>
                    
                </div>
                <div class="col-2">
                    {{-- @can('crear usuario') --}}
                    <a href= {{ route('user.create')}}>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
            
        <hr>
            <h4><i class="fa fa-filter" aria-hidden="true"></i> Filtrar</h4>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{-- @include('user.search') --}}
            <br>
            </div>
            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="20%">Nombre de Usuario</th>
                        <th width="25%">E-mail</th>
                        <th width="20%">Roles</th>
                        <th width="20%">Opciones</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr  style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label style="font-size: 90%" class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td style="text-align: center" colspan="3">

                            <a data-keyboard="false" data-target="#modal-show-{{ $user->id }}" data-toggle="modal">
                                <button title="ver" class="btn btn-info btn-responsive">
                                    <i class="fa fa-eye"></i>
                                </button>

                            </a>
                            @include('user.modalshow')

                            {{-- @can('editar usuario') --}}
                            <a href="{{ route('user.edit',$user->id) }}">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            {{-- @endcan --}}
                        </td>
                    </tr>
                    {{-- @include('user.modaldelete') --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    
        @push('scripts')
            <script src="{{asset('js/tablaDetalle.js')}}"></script>
        @endpush
    @endsection