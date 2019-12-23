@extends('layouts.default')
@section('content')


	@foreach($allproducts as $product)
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect">
    	  @foreach(unserialize($product->images) as $key => $image)
          @if($key==0)
        <img class="responsive" src="{{ asset('images/' . $image) }}" alt="" width="100%" width="225" height="250">
        @endif
        @endforeach
        <br>
        <div class="caption">
    	<h4>{{$product->Pitem_name}}</h4>
    	<h4>{{$product->Pprice}}&#x20b9;</h4>
    </div>
        <div class="overlay">
           <h6>By&nbsp;{{$product->userdetails['name']}}</h6>
           <a class="info" href="{{url("showproduct/$product->id")}}">See Product</a>
        </div>
    </div>
    </div>
@endforeach
</form>
@endsection

