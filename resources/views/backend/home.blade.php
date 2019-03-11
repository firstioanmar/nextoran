@extends('layouts.app')

@section('content')
  <div class="kosong"></div>
<div class="container">
    <div class="row">
      <div class="col-md-4">
        {{-- data makanan --}}
          <div class="list-group scroll">
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Makanan</h5>
              </div>
            </a>

            @foreach ($masakan as $masakans)
            <a href="#" class="list-group-item list-group-item-action">{{ $masakans->nama_masakan }}</a>
            @endforeach
          </div>

      </div>
      <div class="col-md-8">
        <table class="table table-striped table-hover">
          <tr>
            <th>Nama Pelanggan</th>
            <th>Meja</th>
            <th></th>
          </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
        </table>
      </div>
    </div>
</div>
@endsection
