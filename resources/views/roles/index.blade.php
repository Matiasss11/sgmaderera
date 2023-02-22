@extends('layouts.admin')
@section('navegacion')
    <li class="breadcrumb-item"><a href="/">Menu Principal</a></li>
    <li class="breadcrumb-item"><a href="/user">Usuarios</a></li>
    <li class="breadcrumb-item active">Indice de Roles</li>
@endsection


@section('content')
<div class="card">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @include('errors.request')
        @include('roles.mensaje')
        @include('errors.request')
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <p style="font-size:130%"> <i aria-hidden="true"></i>Roles</p>
                    
                </div>
                <div class="col-2">
                    {{-- @can('crear rol') --}}
                    <a href= {{ route('roles.create')}}>
                        <button class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo
                        </button>
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
            
        <hr>
            <br>
            <table id="tablaDetalle" style="width:100%" class="table table-striped table-hover">
                <thead style="background-color:#fff">
                    <tr style="text-align:center" class="text-uppercase text-dark">
                        <th width="30%">Codigo de Rol</th>
                        <th width="50%">Rol</th>
                        <th width="20%">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                    <tr style="text-align:center" onmouseover="cambiar_color_over(this)" onmouseout="cambiar_color_out(this)">
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="text-align: center" colspan="3">

                            @can('editar rol')
                            <a href="{{ route('roles.edit',$role->id) }}">
                                <button title="editar" class="btn btn-primary btn-responsive">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                            @endcan
                            @can('eliminar rol')
                            <a data-backdrop="static" data-keyboard="false" data-target="#modal-delete-{{ $role->id }}" data-toggle="modal">
                                <button title="eliminar" class="btn btn-danger btn-responsive">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                            @endcan
                        </td>
                        @include('roles.modaldelete')
                    </tr>
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
