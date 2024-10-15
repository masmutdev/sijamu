<?php

namespace App\Http\Controllers;

use App\Models\Pengendalian;
use Illuminate\Http\Request;

class pengendalianController extends Controller
{
    public function index()
    {
        $pengendalian = Pengendalian::all();
        return view('User.admin.Pengendalian.index_pengendalian', compact('pengendalian'));
    }
}
