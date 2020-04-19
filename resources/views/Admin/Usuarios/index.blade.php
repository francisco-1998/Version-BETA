@extends('Admin.Plantilla.layout')
@section('header')

<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios <small> - Registros activos</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('administracion') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Usuarios activos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-gray">
        <div class="card-header text-center">
            <a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">
                <span style="padding-right:5px"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                Crear usuario
            </a>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="tablausuarios" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Roles</th>
                            <th>Correo personal</th>
                            <th>Visualizar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $item)
                         <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombres }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->cedula }}</td>
                            <td>{{ $item->getRoleNames()->implode(',') }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-xs btn-info"><span style="padding-right:5px"><i class="fa fa-eye"></i></span>Ver perfil</button>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-warning text-white" href="{{route('usuarios.edit',$item)}}"><span style="padding-right:5px"><i class="fa fa-user-edit"></i></span>Editar perfil</a>
                            </td>
                            <td>
                                <form action="{{route("usuarios.destroy", $item)}}" method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs"><span style="padding-right:5px"><i class="fa fa-user-lock"></i></span>Banear perfil</button>
                                </form>
                            </td>
                        </tr>
                        @extends('Snnipets.profile')
                        @section('profile_body')
                        <div class="row">
                            <div class="col-md-6">
                                <img style="text-align:center"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvzOpl3-kqfNbPcA_u_qEZcSuvu5Je4Ce_FkTMMjxhB-J1wWin-Q"
                                    alt="" class="img-rounded img-fill">
                            </div>
                            <div class="col-md-6" style="border-left:3px solid #ded4da;">
                                <blockquote>
                                    <h4 style="font-weight:bold">Nombres y apellidos</h4>
                                    <h5>{{ $item->nombres }} {{ $item->apellidos }}</h5>
                                    <h4 style="font-weight:bold">Cedula</h4>
                                    <h5>{{ $item->cedula }}</h5>
                                    <h4 style="font-weight:bold">Correo personal</h4>
                                    <h5>{{ $item->email }}</h5>
                                    <h4 style="font-weight:bold">Rol de usuario</h4>
                                    <h5 style="text-transform:capitalize"> {{ $item->getRoleNames()->implode(',') }}
                                    </h5>
                                </blockquote>
                            </div>
                        </div>
            </div>
            @endsection
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>

<script>
    $(document).ready(function() {
        $('#tablausuarios').DataTable();
    } );
</script>





@endsection
