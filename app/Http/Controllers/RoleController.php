<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        // Exemple de données pour les rôles
        $roles = [
            ['name' => 'Admin', 'description' => 'Admin description'],
            ['name' => 'Client', 'description' => 'Client description'],
            ['name' => 'Chef', 'description' => 'Chef description'],
            ['name' => 'Caissier', 'description' => 'Caissier description'],
        ];

        return view('roles', compact('roles'));
    }
}
