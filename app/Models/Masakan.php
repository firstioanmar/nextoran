<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Masakan extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  
  public $table = 'masakan';

  protected $fileable = [
    'nama_masakan','harga','status_masakan','image','description'
  ];
}
