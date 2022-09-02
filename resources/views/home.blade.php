@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($product as $value)
        <div class="col-md-3">
            <div class="card" style="height: 40rem">
                <img class="card-img-top" src="{{ asset('docs/'.$value->image_name) }}" height="140px" width="70px" alt="Card image cap">
                <div class="card-body">
                  <p><b>{{$value->name_product}}</b> ({{$value->name}})</p>
                  <p class="card-text">
                        {!! $value->description !!}
                  </p>
                </div>
                  <div class="card-body">
                        <center>
                            <p><b>Rp.{{number_format($value->price,0,',','.')}}</b></p>
                        </center>
                        <center>
                            <button type="button" class="btn btn-primary">Beli</button>
                        </center>
                  </div>
              </div>
        </div>
        @endforeach
        <center>
            {{ $product->links() }}
        </center>
       
   
    </div>

</div>
@endsection
