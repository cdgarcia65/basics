<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'List of users';

        return view('users.index', compact('users', 'title'));
    }

    public function show(User $user)
    {
        return view('users.details', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        return "[Procesando formulario...]";
    }

    public function edit($id)
    {
        return view('users.edit', compact('id'));
    }
}
