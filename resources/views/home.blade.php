@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($product as $value)
        <div class="col-md-3">
            <div class="card" style="height: 40rem">
                <img class="card-img-top" src="{{ asset('docs/'.$value->image_name) }}" height="140px" width="70px" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">
                        {!! $value->description !!}
                  </p>
                </div>
                  <div class="card-body">
                        <center><button type="button" class="btn btn-primary">Beli</button></center>
                  </div>
              </div>
        </div>
        @endforeach
        <center>
            {{ $product->links() }}
        </center>
       
        {{-- <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
        </div> --}}
    </div>

</div>
@endsection
