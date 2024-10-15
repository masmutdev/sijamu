<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use Illuminate\Http\Request;

class pelaksanaan2Controller extends Controller
{
    public function index()
    {
        // $jamutims = Timjamu::all();
        return view('User.admin.Pelaksanaan.index_fakultas');
    }
    public function fakultas(){
        $data=Pelaksanaan::all();
        return response()->json(['pelaksanaan'=>$data]);
    }
    
}
