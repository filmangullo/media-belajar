<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumDiskusi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_diskusis';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function forums()
    {
        return $this->belongsTo('App\Forum', 'forum_id', 'id');
    }


    public function diskusiComments()
    {
        return $this->hasMany('App\DiskusiComment', 'forum_diskusi_id', 'id');
    }
}
