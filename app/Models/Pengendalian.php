<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengendalian extends Model
{
    use HasFactory;

    protected $table = 'pengendalians';
    protected $primaryKey = 'id_pengendalians';

    /**
     * Atribut diisi secara massal
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'id_pengendalians',
        'bidang_standar',
        'program_studi',
        'laporan_rtm',
        'laporan_rtl',
     ];
}
