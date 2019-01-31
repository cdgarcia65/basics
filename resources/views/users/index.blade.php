@extends('layout')

@section('title', 'Users')

@section('content')

    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#create">
              Nuevo usuario
            </a>
        </p>
    </div>
    
    <table class="table" id="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr class="user-{{ $user->id }}">
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#show" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                      <span class="oi oi-eye"></span>
                    </a>
                    <a href="#" class="btn btn-link edit" data-toggle="modal" data-target="#edit" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                      <span class="oi oi-pencil"></span>
                    </a>
                    <button class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>

    {{-- form Create User --}}
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="modal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="David García" value="{{ old('name') }}"><br>
                    <p class="error text-center alert alert-danger d-none"></p>
                </div>

                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="ccristhiangarcia@gmail.com" value="{{ old('email') }}"><br>
                    <p class="error text-center alert alert-danger d-none"></p>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="************"><br>
                    <p class="error text-center alert alert-danger d-none"></p>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="add">Crear usuario</button>
          </div>
        </div>
      </div>
    </div>
    {{-- end form Create User --}}

    {{-- form show user --}}
    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detalles</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    {{-- end form show user --}}

    {{-- Delete modal --}}
    {{-- <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Está seguro que desea eliminar el usuario?</p>
            <form role="modal">
              <input type="hidden" id="user-delete-id">
              {{ method_field('DELETE') }}
              {{ csrf_field() }}
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-danger action-btn" id="delete-modal">Eliminar</button>
          </div>
        </div>
      </div>
    </div> --}}
    {{-- end delete modal --}}

    {{-- form edit user --}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form role="modal">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <input type="hidden" id="user-id">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="name" class="form-control" id="edit-name"><br>
                    <p class="error text-center alert alert-danger d-none"></p>
                </div>

                <div class="form-group">
                    <label for="name">Correo electrónico</label>
                    <input type="name" class="form-control" id="edit-email"><br>
                    <p class="error text-center alert alert-danger d-none"></p>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary action-btn">
              <span id="footer_action_button" class="oi oi-pencil"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    {{-- end form edit user --}}
@endsection