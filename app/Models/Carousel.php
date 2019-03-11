<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
  protected $fileable = [
    'header','caption','image'
  ];
}
