@extends('layouts.welcome')

@section('content')

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nama anda">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Meja</label>
            <select class="form-control" id="exampleFormControlSelect1">
              @foreach ($meja as $mejas)
                <option value="{{ $mejas->id }}">{{ $mejas->nama_meja }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" name="order" class="btn btn-outline-primary btn-block"> Order </button>
        </form>
        </div>
      </div>
    </div>
  </div>

<div class="kosong"></div>
  <div class="container">
    <div class="row">
      <table class="table table-light table-striped table-hover">
        <tr>
          <th>Masakan</th>
          <th>Harga</th>
        </tr>
          @foreach ($masakans as $masakan)
          <tr>
            <td>
            <button type="button" class="btn btn-outline-secondary border-0" data-toggle="modal" data-target="#modalMasakan{{ $masakan->id }}">
              {{ $masakan->nama_masakan }}
            </button>
          </td>
            <td>Rp. {{ number_format($masakan->harga,0,',','.') }}</td>
          </tr>

          <!-- Modal -->
          <div class="modal fade" id="modalMasakan{{ $masakan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">{{ $masakan->nama_masakan }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('storage/masakan/' . $masakan->image) }}" alt="" width="100%">
                </div>
                <div class="modal-footer">
                  {{ $masakan->description }}
                </div>
              </div>
            </div>
          </div>
          @endforeach
      </table>
      {{ $masakans->links() }}
    </div>
  </div>
@endsection
