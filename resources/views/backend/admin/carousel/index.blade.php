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

        @extends('backend.admin.carousel.create')

          <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
            <tr>
              <th>No</th>
              <th>Header</th>
              <th>Caption</th>
              <th>Image</th>
              <th>Option</th>
            </tr>
              @foreach ($carousels as $carousel)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $carousel->header }}</td>
                  <td>{{ $carousel->caption }}</td>
                  <td>
                    <a href="" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#modalImage{{ $carousel->id }}">
                        {{ $carousel->image }}
                    </a>
                  </td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalEdit{{ $carousel->id }}">
                        <span class="fa fa-edit" ></span>
                    </button>
                      <form action="/carousel/{{ $carousel->id }}" method="POST">
                        <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                          <span class="fa fa-trash-o"></span>
                        </button>
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                      </form>
                  </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade " id="modalEdit{{ $carousel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit data Carousel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <form method="POST" action="/carousel/{{ $carousel->id }}" enctype="multipart/form-data">

                          <div class="form-group">
                          <label for="header">Header</label>
                            <input type="text" name="header" class="form-control" value="{{ $carousel->header }}" required>
                            @if ($errors->has('header'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('header') }}</strong>
                              </p>
                            @endif
                          </div>

                          <div class="form-group">
                          <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control" value="{{ $carousel->caption }}" maxlength="30" required>
                            @if ($errors->has('caption'))
                              <p class="text-danger">
                                  <strong>{{ $errors->first('caption') }}</strong>
                              </p>
                            @endif
                          </div>

                          <label for="image">image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile" >{{ $carousel->image }}</label>
                          </div>
                          @if ($errors->has('image'))
                            <p class="text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </p>
                          @endif


                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="PUT">

                        <button type="submit" class="btn btn-outline-success"> Submit </button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modalImage{{ $carousel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $carousel->header }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="{{ asset('storage/carousel/' . $carousel->image) }}" alt="" width="100%">
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
