@extends('layouts.default')
@section('content')


@foreach($productview as $view)
<div class="container py-5">
<b><i>Artwork By</i> &nbsp;{{$view->userdetails['name']}}</b>
<h3>{{$view->category['name']}}&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;{{$view->subcategory['sub_category']}}&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;{{$view->Pitem_name}}</h3>
	<div class="row">
		<div class="col-md-10 mx-auto">

			<div class="form-group row">
				<div class="col-sm-6">
					@foreach(unserialize($view->images) as $key => $image)
					<img class="responsive" src="{{ asset('images/' . $image) }}" alt="" width="225" height="250">
					@endforeach

				</div>
				<div class="col-sm-6">
					<h4>{{$view->Pitem_name}}</h4>
					<h4>{{$view->Pprice}}&#x20b9;</h4>
					<p><b>{{$view->Pdescription}}</b></p><br>
					<p></p>

				</div>
			</div>
		</div>
	</div>
</div>



@endforeach

@endsection