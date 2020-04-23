<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleOfUserRequest extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'role_of_user_requests';

  public function users()
  {
      return $this->belongsTo('App\User', 'user_id', 'id');
  }
}
