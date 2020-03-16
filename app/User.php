<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public const ROLE_USER = 'user';
    public const ROLE_PENGAJAR = 'pengajar';
    public const ROLE_PELAJAR = 'pelajar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function participants()
    {
        return $this->hasMany('App\Participant', 'user_id', 'id');
    }

    public function kelasMataPelajarans()
    {
        return $this->belongsTo('App\KelasMataPelajaran', 'user_id', 'id');
    }

    public function forumDiskusis()
    {
        return $this->hasMany('App\ForumDiskusi', 'user_id', 'id');
    }

    public function diskusiComments()
    {
        return $this->hasMany('App\DiskusiComments', 'user_id', 'id');
    }
}
