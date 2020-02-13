<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SarazaController extends Controller
{
    public function mostrar()
    {
        $users = User::where('name', 'pepe')->get();
        return view('saraza', ['users' => $users]);
    }
}
