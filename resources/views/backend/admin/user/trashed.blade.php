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
                  <td><small>{{ $trash->name }}</small></td>
                  <td><small>{{ $trash->username }}</small></td>
                  <td><small>{{ $trash->email }}</small></td>
                  <td>
                    <a href="/users/{{ $trash->id }}/restore" class="btn btn-sm btn-outline-info">
                      <span class="fa fa-repeat"></span>
                    </a>
                  </td>
                </tr>
              @endforeach
          </table>

          </div>
        </div>
      </div>
    </div>
