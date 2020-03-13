<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasMataPelajaran extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kelas_mata_pelajarans';

    public function instansis()
    {
        return $this->belongsTo('App\Instansi', 'instansi_id', 'id');
    }

    public function forums()
    {
        return $this->hasMany('App\Forum', 'forum_id', 'id');
    }
}
