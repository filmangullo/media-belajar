<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'participants';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
