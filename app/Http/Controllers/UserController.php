<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Level;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $levels = Level::all();
        $trashed = User::onlyTrashed()->get();
        $no   = 1;

        return view('backend.admin.user.index', compact('users','levels','no','trashed'));
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
          $this->validate($request, [
              'name' => 'required|string|max:48',
              'username' => 'required|string|max:28',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed'
          ]);

          $insert = new User;
          $insert->name = $request->name;
          $insert->username = $request->username;
          $insert->email = $request->email;
          $insert->level_id = $request->level_id;
          $insert->password = bcrypt($request->password);
          $insert->save();

          return redirect('/users');
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
          $this->validate($request, [
              'name' => 'required|string|max:48',
              'username' => 'required|string|max:28',
              'email' => 'required|string|email|max:255|unique:users',
          ]);

          $update = User::findOrFail($id);
          $update->name = $request->name;
          $update->username = $request->username;
          $update->email = $request->email;
          $update->level_id = $request->level_id;

          if (!empty($request->password)) {
            $insert->password = bcrypt($request->password);
          }

          $update->save();

          return redirect('/users');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect('/users');

        }

        public function restore($id)
        {
          $masakan = User::withTrashed()->findOrFail($id);
          $masakan->restore();

          return redirect('/users');
        }


}
