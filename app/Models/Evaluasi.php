<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasis';
    
    // Pendefinisian primarykey secara khusus. Karena default laravel berupa 'id'
    protected $primaryKey = 'id_evaluasi';

     /**
     * Atribut diisi secara massal
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_evaluasi',
        'namaDokumen_evaluasi',
        'program_studi',
        'tanggal_terakhir_dilakukan',
        'tanggal_diperbarui',
        'unggahan_dokumen'

    ];

}
