<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'level_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function level()
    {
      return $this->belongsTo('App\Models\Level');
    }

    public function iniAdmin()
    {
      if ($this->level_id == 1) return true;
      return false;
    }

    public function iniKasir()
    {
      if ($this->level_id == 2) return true;
      return false;
    }

    public function iniWaiter()
    {
      if ($this->level_id == 3) return true;
      return false;
    }


}
