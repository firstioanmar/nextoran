          <!-- Modal -->
          <div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                          <form method="POST" action="/users">

                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name">Name</label>

                                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                      @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                  <label for="username">Username</label>

                                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                      @if ($errors->has('username'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('username') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email">E-Mail Address</label>

                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
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

                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password">Password</label>

                                      <input id="password" type="password" class="form-control" name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                              </div>

                              <div class="form-group">
                                  <label for="password-confirm">Confirm Password</label>

                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>


                                      {{ csrf_field() }}

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
