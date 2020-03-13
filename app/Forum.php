<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums';

    public function kelasmatapelajarans()
    {
        return $this->belongsTo('App\KelasMataPelajaran', 'kelas_mata_pelajarans_id', 'id');
    }
}
