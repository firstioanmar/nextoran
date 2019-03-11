<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Carousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::all();
        $no = 1;

        return view('backend.admin.carousel.index', compact('carousels','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $carousels = Carousel::all()->count();

      if ($carousels == 5) {
        return redirect('/carousel')->with('msg','Gagal. Carousel tidak dapat lebih dari 5');
      }

      $this->validate($request, [
        'header' => 'required|string|min:3|max:13|unique:carousels',
        'caption'        => 'required|min:3|max:62',
        'image'        => 'required|mimes:jpeg,jpg,png'
      ]);

      $header_slug = str_slug($request->header, '_');

      $fileName = $header_slug.time().'.png';
      $request->file('image')->storeAs('public/carousel', $fileName);

      $update = new Carousel;
      $update->header = $request->header;
      $update->caption = $request->caption;
      $update->image = $fileName;
      $update->save();

      return redirect('/carousel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $update = Carousel::findOrFail($id);

      $this->validate($request, [
        'header' => 'required|string|min:3|max:13|unique:carousels',
        'caption'        => 'required|min:3|max:62',
        'image'        => 'mimes:jpeg,jpg,png'
      ]);

      $header_slug = str_slug($request->header, '_');

      if (!empty($request->image)) {
      $fileName = $header_slug.time().'.png';
      $request->file('image')->storeAs('public/carousel', $fileName);
      $update->image = $fileName;
      }

      $update->header = $request->header;
      $update->caption = $request->caption;
      $update->save();

      return redirect('/carousel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Carousel::findOrFail($id);
        $delete->delete();

        return redirect('/carousel');
    }
}
