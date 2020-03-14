<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskusiComment extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'diskusi_comments';

  public function users()
  {
      return $this->belongsTo('App\User', 'user_id', 'id');
  }
  
  public function forumDiskusis()
  {
      return $this->belongsTo('App\ForumDiskusi', 'forum_diskusi_id', 'id');
  }

  public function forums()
  {
      return $this->belongsTo('App\Forum', 'forum_id', 'id');
  }
}
