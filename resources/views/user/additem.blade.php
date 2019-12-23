@extends('layouts.default')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="form-horizontal">
 <div class="container">    

   <div class="panel panel-default">
    <div class="panel-body">
      <br />

      <div class="form-group">
        <label class="control-label col-sm-4" for="cateid">Category:</label>
        <div class="col-sm-4">
          <select class="form-control" id="cateid">
            <option value="">--Select--</option>
            @foreach($arr as $cate)
            <option value="{{$cate->id}}">{{$cate->name}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4" for="subid">Sub Category:</label>
        <div class="col-sm-4">
          <select class="form-control" id="subid">
            <option value="">--Select--</option>
            @foreach($arr1 as $subcate)
            <option value="{{$subcate->id}}">{{$subcate->sub_category}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="pname">Product Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="pdname" placeholder="Product Name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="price">Price:</label>
        <div class="col-sm-4">
          <input type="number" class="form-control" id="price" placeholder="Price">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-4" for="desc">Description:</label>
        <div class="col-sm-4">
          <textarea type="text" class="form-control" id="desc" placeholder="Description"></textarea>
        </div>
      </div>

      
      <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
        @csrf
        <div  class="form-group">
          <label class="control-label col-sm-4" align="right">Select Images:</label>

          <input class="form-control-file col-sm-3" type="file" name="file[]" id="file" accept="image/*" multiple required/>
          <input type="submit" name="upload" value="Upload" class="btn btn-success" />




        </div>
      </form>
      <br />
      <div class="progress">
        <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
          0%
        </div>
      </div>
      <br />
      <div id="success" class="row">

      </div>
      <br />
    </div>
    <div class="form-group">
      <div class="text-center">
        <button type="button" onclick="submit()" class="btn btn-primary ">Submit</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  $(document).ready(function(){
    $('form').ajaxForm({
      beforeSend:function(){
        $('#success').empty();
        $('.progress-bar').text('0%');
        $('.progress-bar').css('width', '0%');
      },
      uploadProgress:function(event, position, total, percentComplete){
        $('.progress-bar').text(percentComplete + '0%');
        $('.progress-bar').css('width', percentComplete + '0%');
      },
      success:function(data)
      {
        if(data.success)
        {
          $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
          $('#success').append(data.image);
          $('.progress-bar').text('Uploaded');
          $('.progress-bar').css('width', '100%');

        }
      }
    });
  });

  function deleteimage(){
    var a=document.getElementById('imgid').name;
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url:"additem/delete",
    method:"POST",
    data:{"name":a},
    success:function(data)
    {

      document.getElementById(data.image).remove();
    }
  })

  }


  function submit()
  {
    var images = $('#success').find('img').map(function() { return this.name; }).get();
    var cid=document.getElementById('cateid');
    var cid1=cid.options[cid.selectedIndex].value;

    var sid=document.getElementById('subid');
    var sid1=sid.options[sid.selectedIndex].value;
    

    var productname = $("#pdname").val();
    var price = $("#price").val();
    var description = $("#desc").val();

    url1="additem";
    type1="POST";
    data1={"categoryid":cid1,
    "subcategoryid":sid1,
    "productname" :productname,
    "price":price,
    "description":description,
    "images":images
  };
  global(data1,type1,url1,function(data){
    sucess(data);
  });         
  
}

function sucess(data){
  alert("Record inserted");
  location.reload();
}


</script>