<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instansis';

    public function kelasMataPelajarans()
    {
        return $this->hasMany('App\KelasMataPelajaran', 'instansi_id', 'id');
    }
}
