<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek di tabel file_p1 untuk kolom files yang kosong
        $fileP1Check = DB::table('file_p1')
                    ->where('files', '[]')
                    ->orWhereNull('files')
                    ->exists();

        // Cek di tabel file_eval untuk kolom files yang kosong
        $fileEvalCheck = DB::table('file_eval')
                    ->where('files', '[]')
                    ->orWhereNull('files')
                    ->exists();

        // Cek di tabel file_p4 untuk kolom files atau files2 yang kosong
        $fileP4Check = DB::table('file_p4')
                    ->where('files', '[]')
                    ->orWhereNull('files')
                    ->orWhere('files2', '[]')
                    ->orWhereNull('files2')
                    ->exists();

        // Cek di tabel file_p4 untuk kolom files atau files2 yang kosong
        $fileP5Check = DB::table('file_p5')
        ->where('files', '[]')
        ->orWhereNull('files')
        ->exists();


        // Kirim hasil pengecekan ke view
        return view('User.admin.index', [
            'fileP1Check' => $fileP1Check,
            'fileEvalCheck' => $fileEvalCheck,
            'fileP4Check' => $fileP4Check,
            'fileP5Check' => $fileP5Check,
        ]);
    }
}
