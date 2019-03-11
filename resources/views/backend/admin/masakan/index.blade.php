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

          <a href="" class="btn btn-outline-success btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus"></i>
              Tambah data
          </a>
          <a href="" class="btn btn-outline-danger btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modalTrashed">
              <i class="fa fa-trash-o"></i>
              Trash
          </a>

          @extends('backend.admin.masakan.create')
          @extends('backend.admin.masakan.trashed')

          <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
            <tr>
              <th>No</th>
              <th>Masakan</th>
              <th>Harga</th>
              <th>Status masakan</th>
              <th>Image</th>
              <th>Description</th>
              <th>Option</th>
            </tr>
              @foreach ($masakan as $masakans)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $masakans->nama_masakan }}</td>
                  <td>Rp. {{ number_format($masakans->harga,0,',','.') }}</td>
                  <td>{{ $masakans->status_masakan }}</td>
                  <td>
                    <a href="" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalImage{{ $masakans->id }}">
                        {{ $masakans->image }}
                    </a>
                  </td>
                  <td>{{ $masakans->description }}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $masakans->id }}">
                        Edit
                    </a>
                    <form action="/masakan/{{ $masakans->id }}" method="POST">
                      <input type="submit" class="btn btn-outline-danger btn-sm" name="submit" value="Delete">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                    </form>
                  </div>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade " id="modalEdit{{ $masakans->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit data Masakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="/masakan/{{ $masakans->id }}" enctype="multipart/form-data">
                          <div class="form-group">
                          <label for="nama_masakan">Nama Masakan</label>
                            <input type="text" name="nama_masakan" class="form-control" value="{{ $masakans->nama_masakan }}" autofocus>
                            @if ($errors->has('nama_masakan'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('nama_masakan') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="harga">Harga</label>
                            <div class="row">
                              <div class="col-sm-1">
                                <span class="btn btn-light text-muted" >Rp.</span>
                              </div>
                              <div class="col">
                                <input type="number" name="harga" class="form-control border-left-0" value="{{ $masakans->harga }}" autofocus>
                              </div>
                            </div>
                              @if ($errors->has('harga'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('harga') }}</strong>
                              </p>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="status_masakan">Status Masakan</label>
                            <select class="custom-select" name="status_masakan">
                              <option value="Available">Available</option>
                              <option value="Sold Out">Sold Out</option>
                            </select>
                          </div>
                          <label for="image">image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile" >{{ $masakans->image }}</label>
                          </div>
                          @if ($errors->has('image'))
                            <p class="text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </p>
                          @endif
                          <div class="form-group">
                          <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $masakans->description }}" maxlength="30" required>
                            @if ($errors->has('description'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('description') }}</strong>
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


              <!-- Modal -->
              <div class="modal fade" id="modalImage{{ $masakans->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{ $masakans->nama_masakan }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img src="{{ asset('storage/masakan/' . $masakans->image) }}" alt="" width="100%">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
          </table>
      </div>
@endsection
