<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumKuis extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_kuiss';
    protected $dates =['deleted_at'];

    public function forums()
    {
        return $this->belongsTo('App\Forum', 'forum_id', 'id');
    }
}
