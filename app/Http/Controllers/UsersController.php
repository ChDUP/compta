<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create() {
        return view('users.create');
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }
}
