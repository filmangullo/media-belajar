<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forums';
    protected $dates = ['deleted_at'];

    public function kelasmatapelajarans()
    {
        return $this->belongsTo('App\KelasMataPelajaran', 'kelas_mata_pelajarans_id', 'id');
    }

    public function forumDiskusis()
    {
        return $this->hasMany('App\ForumDiskusi', 'forum_id', 'id');
    }

    public function diskusiComments()
    {
        return $this->hasMany('App\DiskusiComment', 'forum_id', 'id');
    }
}
