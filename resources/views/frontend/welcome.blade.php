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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
        @foreach ($carousels as $carousel)

          @if ($carousel->id == 1)
        <div class="carousel-item active">
          @else
        <div class="carousel-item">
        @endif

          <img class="first-slide" src="{{ asset('storage/carousel/'.$carousel->image) }}" alt="First slide">
          <div class="container">
            <div class="carousel-caption text-left">
              <h1>{{ $carousel->header }}</h1>
              <p>{{ $carousel->caption }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="container">
      <div class="row">
        <h1>Masakan Terbaru</h1>
      </div>
      <div class="card-columns">
        @foreach ($masakan as $masakans)
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="{{ asset('storage/masakan/'.$masakans->image) }}"  alt="Card image cap" height="200">
          <div class="card-body">
            <h4 class="card-title">{{ $masakans->nama_masakan }}</h4>
            <p class="card-text">{{ $masakans->description }}
          </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection
