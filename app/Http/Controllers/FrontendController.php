<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\Masakan;
use App\Models\Carousel;

class FrontendController extends Controller
{
    public function index()
    {
      $meja = Meja::all();
      $carousels = Carousel::all();
      $masakan = Masakan::orderBy('created_at','desc')->paginate(6);

      return view('frontend.welcome', compact('meja','masakan','carousels'));
    }

    public function menu()
    {
        $masakans = Masakan::orderBy('nama_masakan','asc')->paginate(5);
        $meja = Meja::all();
        return view('frontend.menu', compact('masakans','meja'));
    }
}
