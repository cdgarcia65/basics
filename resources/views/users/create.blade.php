@extends('layout')

@section('title', "Create users")

@section('content')

    <div class="card">
        <h4 class="card-header">Crear usuarios</h4>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Por favor corrige los siguientes errores: </p>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="David García" value="{{ old('name') }}">
                </div>
                
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="ccristhiangarcia@gmail.com" value="{{ old('email') }}">
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="***********">
                </div>

                <button type="submit" class="btn btn-primary">Create user</button>
            </form>
        </div>
    </div>

@endsection