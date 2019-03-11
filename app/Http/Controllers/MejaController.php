<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mejas    = Meja::all();
        $no       = 1;
        $trashed  = Meja::onlyTrashed()->get();

        return view('backend.admin.meja.index',compact('mejas','no','trashed'));
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
        $insert = new Meja;
        $insert->nama_meja = $request->nama_meja;
        $insert->status_meja = $request->status_meja;
        $insert->save();

        return redirect('/meja');
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
      $insert = Meja::findOrFail($id);
      $insert->nama_meja = $request->nama_meja;
      $insert->status_meja = $request->status_meja;
      $insert->save();

      return redirect('/meja');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect('/meja');
    }

    public function restore($id)
    {
        $meja = Meja::withTrashed()->findOrFail($id);
        $meja->restore();

        return redirect('/meja');
    }
}
