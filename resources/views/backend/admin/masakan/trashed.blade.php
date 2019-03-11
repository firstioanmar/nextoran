<!-- Modal -->
<div class="modal fade " id="modalTrashed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Trashed data Masakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <table id="table" class="table table-hover table-bordered display nowrap" style="width:100%">
            <tr>
              <th>Id</th>
              <th>Masakan</th>
              <th>Harga</th>
              <th>Description</th>
              <th>Option</th>
            </tr>
              @foreach ($trashed as $trash)
              <tr>
                  <td> <small>{{ $trash->id }}</small> </td>
                  <td><small>{{ $trash->nama_masakan }}</small></td>
                  <td><small>Rp. {{ number_format($trash->harga,0,',','.') }}</small></td>
                  <td><small>{{ $trash->description }}</small></td>
                  <td>
                    <a href="/masakan/{{ $trash->id }}/restore" class="btn btn-sm btn-outline-info">Restore</a>
                  </td>
                </tr>
              @endforeach
          </table>

          </div>
        </div>
      </div>
    </div>
