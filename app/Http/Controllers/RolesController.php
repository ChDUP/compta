<?php

namespace App\Http\Controllers;
use App\Role;

class RolesController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('roles.index', ['roles' => $roles]);
    }

    public function show(Role $role) {
        return view('roles.show', compact('role'));
    }
}
