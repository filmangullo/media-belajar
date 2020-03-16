<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KelasMataPelajaran extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kelas_mata_pelajarans';
    protected $dates =['deleted_at'];

    public function instansis()
    {
        return $this->belongsTo('App\Instansi', 'instansi_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function forums()
    {
        return $this->hasMany('App\Forum', 'forum_id', 'id');
    }
}
