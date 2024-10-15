<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class peningkatanController extends Controller
{
    public function index()
    {
        // $jamutims = Timjamu::all();
        return view('User.admin.Peningkatan.index_peningkatan');
    }
}
