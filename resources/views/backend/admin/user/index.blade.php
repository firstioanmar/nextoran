@extends('layouts.admin')

@section('dashboard')

        <div class="col-md-12 col-md-offset-2">

            @if (session('msg'))
              <div id="msg" class="alert alert-danger">
                <h4>
                  <strong>{{ session('msg') }}</strong>
                  <button id="btnHideMsg" type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </h4>
              </div>
            @endif

          <a href="" class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modalRegister">
              <i class="fa fa-plus"></i>
              Tambah data
          </a>
          <a href="" class="btn btn-outline-danger btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modalTrashed">
              <i class="fa fa-trash-o"></i>
              Trash
          </a>

          @extends('backend.admin.user.create')
          @extends('backend.admin.user.trashed')

          <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>Level</th>
              <th>Option</th>
            </tr>
              @foreach ($users as $user)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->level->nama_level }}</td>
                  <td>
                    @if ($user->level_id == 1)
                      <span class="text-danger"> Disable </span>
                    @else
                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editUser{{ $user->id }}">
                        <span class="fa fa-edit" ></span>
                    </button>
                      <form action="/users/{{ $user->id }}" method="POST">
                        <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                      </form>
                    @endif
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade " id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit data user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="/users/{{ $user->id }}">
                          <div class="form-group">
                          <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" autofocus>
                            @if ($errors->has('name'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                          <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                            @if ($errors->has('username'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('username') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                          <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            @if ($errors->has('email'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                          <label for="level_id">Level</label>
                            <select class="custom-select" name="level_id">
                              @foreach ($levels as $level)
                                @if ($level->id > 1)
                                  <option value="{{ $level->id }}">{{ $level->nama_level }}</option>
                                @endif
                              @endforeach
                            </select>
                            @if ($errors->has('level_id'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('level_id') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                          <label for="password">New Password</label>
                            <input type="text" name="password" class="form-control">
                            <span class="text-muted">Isi jika ingin mengganti password</span>
                            @if ($errors->has('password'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </p>
                            @endif
                          </div>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">

                        <button type="submit" class="btn btn-outline-success"> Submit </button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
          </table>
      </div>
@endsection
