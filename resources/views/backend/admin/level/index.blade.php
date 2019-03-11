  @extends('layouts.admin')

  @section('dashboard')

          <div class="col-md-12 col-md-offset-2">

            <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
              <tr>
                <th>No</th>
                <th>Nama Level</th>
              </tr>
                @foreach ($levels as $level)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $level->nama_level }}</td>
                  </tr>
                @endforeach
            </table>
        </div>
  @endsection
