          <!-- Modal -->
          <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                          <form method="POST" action="/users/{{ $user->id }}">

                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name">Name</label>

                                      <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                      @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                  <label for="username">Username</label>

                                      <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required>

                                      @if ($errors->has('username'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('username') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email">E-Mail Address</label>

                                      <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
                                  <label for="level_id">Level</label>
                                      <select class="form-control" name="level_id">
                                        @foreach ($levels as $level)
                                          <option value="{{ $level->id }}">{{ $level->nama_level }}</option>
                                        @endforeach
                                      </select>

                                      @if ($errors->has('level_id'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('level_id') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password">New Password</label>

                                      <input id="password" type="password" class="form-control" name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group">
                                  <label for="password-confirm">Confirm New Password</label>

                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>


                                      {{ csrf_field() }}
                                      <input type="hidden" name="_method" value="PUT">

                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary">
                                          Register
                                      </button>
                                  </div>
                              </div>
                          </form>
                  </div>
                </div>
              </div>
            </div>
