<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meja extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  public $table = 'meja';

  protected $fileable = [
    'nama_meja','status_meja'
  ];
}
