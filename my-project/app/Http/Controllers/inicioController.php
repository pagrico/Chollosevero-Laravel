<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chollos;

class inicioController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }
    public function admin()
    {
        return view('admin');
    }
    public function chollo($id)
    {
        return view('chollo', [
            'id' => $id
        ]);
    }
    public function newchollo(Request $request)
    {
        $chollo = new Chollos();
    }
    public function formchollo()
    {

        return view('newchollo');
    }
}
