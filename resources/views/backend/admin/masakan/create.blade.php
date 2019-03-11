          <!-- Modal -->
          <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah data Masakan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/masakan" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nama_masakan">Nama Masakan</label>
                      <input type="text" name="nama_masakan" class="form-control" value="{{ old('nama_masakan') }}" required>
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
                          <input type="number" name="harga" class="form-control border-left-0" value="{{ old('harga') }}" required>
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
                      <label class="custom-file-label" for="customFile" >Choose file</label>
                    </div>
                    @if ($errors->has('image'))
                      <p class="text-danger">
                          <strong>{{ $errors->first('image') }}</strong>
                      </p>
                    @endif
                    <div class="form-group">
                    <label for="description">Description</label>
                      <input type="text" name="description" class="form-control" value="{{ old('description') }}" maxlength="30" required>
                      @if ($errors->has('description'))
                        <p class="text-danger">
                            <strong>{{ $errors->first('description') }}</strong>
                        </p>
                      @endif
                    </div>

                    {{ csrf_field() }}

                  <button type="submit" class="btn btn-outline-success"> Submit </button>
                </form>
                </div>
              </div>
            </div>
          </div>
