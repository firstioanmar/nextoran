<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Masakan;
use App\Models\Meja;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $masakan = Masakan::all();
        $no      = 1;
        $trashed = Masakan::onlyTrashed()->get();

        return view('backend.admin.masakan.index', compact('masakan','no','trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.masakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama_masakan' => 'required|string|min:3|max:28|unique:masakan',
          'harga'        => 'required|min:3|max:9',
          'image'        => 'required|mimes:jpeg,jpg,png',
          'description' => 'required|min:13|max:30'
        ]);

        $nama_masakan_slug = str_slug($request->nama_masakan, '_');
        $nama_masakan_baru = $request->nama_masakan;

        if (Masakan::where('nama_masakan',$nama_masakan_baru)->first() != NULL) {
          return redirect('/masakan')->with('msg','Gagal! Nama masakan sudah ada!');
        }

        $fileName = $nama_masakan_slug.time().'.png';
        $request->file('image')->storeAs('public/masakan', $fileName);

        $insert = new Masakan;
        $insert->nama_masakan = $request->nama_masakan;
        $insert->harga = $request->harga;
        $insert->status_masakan = $request->status_masakan;
        $insert->image = $fileName;
        $insert->description = $request->description;
        $insert->save();

        return redirect('/masakan');
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
        $masakan = Masakan::findOrFail($id);
        return view('backend.admin.masakan.edit', compact('masakan'));
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

      $update = Masakan::findOrFail($id);

      $this->validate($request, [
        'nama_masakan' => 'required|string|min:3|max:28',
        'harga'        => 'required|min:3|max:9',
        'image'        => 'mimes:jpeg,jpg,png',
        'description' => 'required|min:13|max:30'
      ]);

      $nama_masakan_slug = str_slug($request->nama_masakan, '_');
      $nama_masakan_baru = $request->nama_masakan;

      if (!empty($request->image)) {
          $fileName = $nama_masakan_slug.time().'.png';
          $request->file('image')->storeAs('public/masakan', $fileName);
          $update->image = $fileName;
      }

      $update->harga = $request->harga;
      $update->status_masakan = $request->status_masakan;
      $update->description = $request->description;
      $update->save();

      if (Masakan::where('nama_masakan',$nama_masakan_baru)->first() != NULL) {
        return redirect('/masakan')->with('msg','Gagal mengubah nama, Nama masakan sudah ada.');
      }

      $update->nama_masakan = $request->nama_masakan;
      $update->save();

      return redirect('/masakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masakan = Masakan::findOrFail($id);
        $masakan->delete();

        return redirect('/masakan');

    }

    public function restore($id)
    {
      $masakan = Masakan::withTrashed()->findOrFail($id);
      $masakan->restore();

      return redirect('/masakan');
    }
}
