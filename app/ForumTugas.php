<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumTugas extends Model
{
  use SoftDeletes;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'forum_tugas';
  protected $dates =['deleted_at'];

  public function forums()
  {
      return $this->belongsTo('App\Forum', 'forum_id', 'id');
  }

  public function users()
  {
      return $this->belongsTo('App\User', 'user_id', 'id');
  }
}
