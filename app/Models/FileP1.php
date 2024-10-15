<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FileP1 extends Model
{
    protected $table = 'file_p1';
    protected $primaryKey = 'id_fp1';
    protected $fillable = [
        'files',
    ];
}
