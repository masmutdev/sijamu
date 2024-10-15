<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NamaFileP1 extends Model
{
    protected $table = 'nama_file_p1';
    protected $primaryKey = 'id_nfp1';
    protected $fillable = [
        'nama_filep1',
    ];

    public function fileP1()
    {
        return $this->hasOne(FileP1::class, 'id_fp1');
    }
}
