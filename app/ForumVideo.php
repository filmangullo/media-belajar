<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumVideo extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_videos';
    protected $dates =['deleted_at'];

    public function forums()
    {
        return $this->belongsTo('App\Forum', 'forum_id', 'id');
    }
}
