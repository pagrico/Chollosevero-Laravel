<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin');
    }
}
