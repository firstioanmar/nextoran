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


            <button id="btnTambahMeja" class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;">
                <i class="fa fa-plus"></i>
                Tambah Data
            </button>
            <a href="" class="btn btn-outline-danger btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modalTrashed">
                <i class="fa fa-trash-o"></i>
                Trash
            </a>

          @extends('backend.admin.meja.trashed')

            <form id="tambahMeja" action="/meja" method="post" class="form-inline" style="margin-bottom: 10px; display: none;">
              <div class="form-group">
              <label class="mr-sm-2" for="nama_meja">Nama Meja</label>
                <input type="text" name="nama_meja" class="form-control mb-2 mr-sm-2 mb-sm-0" value="{{ old('nama_meja') }}" autofocus>
                @if ($errors->has('nama_meja'))
                  <p class="text-danger">
                      <strong>{{ $errors->first('nama_meja') }}</strong>
                  </p>
                @endif
              </div>
              <label class="mr-sm-2" for="status_meja" >Status Meja</label>
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="status_meja" name="status_meja">
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>

              {{ csrf_field() }}

              <button type="submit" name="button" class="btn btn-outline-success btn-sm">
                <i class="fa fa-plus"></i>
              </button>

            </form>

          <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
            <tr>
              <th>No</th>
              <th>Nama Meja</th>
              <th>Status Meja</th>
              <th>Option</th>
            </tr>
              @foreach ($mejas as $meja)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $meja->nama_meja }}</td>
                  <td>{{ $meja->status_meja }}</td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editMeja{{ $meja->id }}">
                        <span class="fa fa-edit" ></span>
                    </button>
                      <form action="/meja/{{ $meja->id }}" method="POST">
                        <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                      </form>
                  </td>
                </tr>


                <!-- Modal -->
                <div class="modal fade" id="editMeja{{ $meja->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Meja</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="/meja/{{ $meja->id }}" method="post">
                          <div class="form-group">
                          <label class="mr-sm-2" for="nama_meja">Nama Meja</label>
                            <input type="text" name="nama_meja" class="form-control mb-2 mr-sm-2 mb-sm-0" value="{{ $meja->nama_meja }}" autofocus>
                            @if ($errors->has('nama_meja'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('nama_meja') }}</strong>
                              </p>
                            @endif
                          </div>
                          <label class="mr-sm-2" for="status_meja" >Status Meja</label>
                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="status_meja" name="status_meja">
                                <option value="Available">Available</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>

                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">

                          <div class="form-group">
                            <button type="submit" name="button" class="btn btn-outline-success btn-sm">
                              <i class="fa fa-save"></i> Simpan
                            </button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
          </table>
      </div>
@endsection
