<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penetapan extends Model
{
    protected $table = 'penetapans';
    protected $primaryKey = 'id_penetapan';
    protected $fillable = [
        'submenu_penetapan',
    ];

    public function fileP1()
    {
        return $this->hasMany(FileP1::class, 'id_fp1', 'id_nfp1');
    }

    public function namaFileP1()
    {
        return $this->hasOne(NamaFileP1::class, 'id_fp1', 'id_nfp1');
    }



    /**
     * Jika Penetapan berupa submenu perangkatspmi.
     *
     * @return bool
     */
    public function isPerangkatspmi()
    {
        return $this->submenu_penetapan === 'perangkatspmi';
    }

    /**
     * Jika Penetapan berupa submenu standarinstitusi.
     *
     * @return bool
     */
    public function isStandarinstitusi()
    {
        return $this->submenu_penetapan === 'standarinstitusi';
    }
}
