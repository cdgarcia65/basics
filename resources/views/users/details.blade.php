@extends('layout')

@section('title', "User #{$user->id}")

@section('content')
    <h1>Usuario #{{ $user->id }}</h1>
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo electronica: {{ $user->email }}</p>
    <p>
        <a href="{{ route('users') }}">Regresar la lista de usuarios.</a>
    </p>
@endsection