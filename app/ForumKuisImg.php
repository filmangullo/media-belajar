<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumKuisImg extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forum_kuis_imgs';

    public function forumKuiss()
    {
        return $this->belongsTo('App\ForumKuis', 'forum_kuis_id', 'id');
    }
}
