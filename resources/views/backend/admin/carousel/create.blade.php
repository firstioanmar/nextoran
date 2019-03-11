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
                    <form method="POST" action="/carousel" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="header">Header</label>
                      <input type="text" name="header" class="form-control" value="{{ old('header') }}" required>
                      @if ($errors->has('header'))
                        <p class="text-danger">
                            <strong>{{ $errors->first('header') }}</strong>
                        </p>
                      @endif
                    </div>

                    <div class="form-group">
                    <label for="caption">Caption</label>
                      <input type="text" name="caption" class="form-control" value="{{ old('caption') }}" maxlength="30" required>
                      @if ($errors->has('caption'))
                        <p class="text-danger">
                            <strong>{{ $errors->first('caption') }}</strong>
                        </p>
                      @endif
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

                    {{ csrf_field() }}

                    <br>

                  <button type="submit" class="btn btn-outline-success"> Submit </button>
                </form>
                </div>
              </div>
            </div>
          </div>
