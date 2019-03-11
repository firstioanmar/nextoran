          <!-- Modal -->
          <div class="modal fade " id="modalEdit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit data user</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/masakan/{{ $user->id }}" enctype="multipart/form-data">
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
                    <label for="level">Level</label>
                      <select class="" name="level_id">
                        <option value="{{ user }}"></option>
                      </select>
                      @if ($errors->has('email'))
                        <p class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                      @endif
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                      <input type="text" name="password" class="form-control" value="{{ $user->password }}">
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
