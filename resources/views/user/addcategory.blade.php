@extends('layouts.default')
@section('content')
<form class="form-inline text-center">

	<div class="form-group">
		<label >
			Add Category
		</label>
		<input class="form-control"  id="category" type="text" name="category">
		<button type="button" class="btn btn-primary" onclick="addcategory()" >Add</button>
		<a href="{{url('subcategory')}}" class='btn btn-success'>add Subcategory</a>
	</div>
	<br>
	<br>
	<table  class="table table-hover text-center">
		@foreach($allcategory as $category)
		<tr>
			<td>{{ $category->id}}</td>
			<td>{{$category->name}}</td>
			<td><button type="button" class="btn btn-success" id="edit" onclick="updated({{ $category->id}})" >Edit</button></td>
			<td><button type="button" onclick="del({{ $category->id}})" class="btn btn-danger" id="delete">Delete</button></td>
		</tr>
		@endforeach
	</table>

	<div id="updateModal" class="modal fade">  
		<div class="modal-dialog">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  

				</div>  
				<div class="modal-body" id="updatecategory">  
					<label >
						Category
					</label>
					<input class="form-control"  id="upcategory" type="text" name="upcategory">
				</div>  
				<div class="modal-footer">  
					<button type="button" class="btn btn-primary" onclick="add()">Update</button>  
				</div>  
			</div>  
		</div>  
	</div>
	<div id="confirmModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title">Confirmation</h2>
				</div>
				<div class="modal-body">
					<h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" name="ok_button" onclick="final()" id="ok_button" class="btn btn-danger">OK</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

	var updateid;
	function updated(id){//updata modal
		updateid=id;
		var data1,type1;
		var url1="addcategory/"+id+"/edit";
		global(data1,type1,url1,function(data){
			upsucess(data);
		});
		
	}
	function upsucess(data){

		$('#upcategory').val(data.data.name);
		$('#updateModal').modal('show');  
	}


	function add(){//add update category
		var name=$('#upcategory').val();
		var url1,type1,data1;
		url1="addcategory/update";
		data1={"id":updateid,"name":name};
		type1="POST";
		global(data1,type1,url1,function(data){
			upadd(data);
		});

	}

	function upadd(data){
		$('#updateModal').modal('hide');  
		location.reload();
	}


	var dataid;
	function del(id){///alert modal
		dataid = id;
		$('#confirmModal').modal('show');
	}


	function final(){////deleting data
		var url1,data1,type1;
		url1="addcategory/destroy/"+dataid;
		global(data1,type1,url1,function(data){
			deletesucess(data);
		});
	}
	function deletesucess(data){
		$('#ok_button').text('Deleting...');
		setTimeout(function(){
			$('#confirmModal').modal('hide');
			location.reload();
		}, 2000);
	}
	
	
	function addcategory()
	{
		var cate = document.getElementById("category").value;

		data1={"category":cate};
		type1="POST";
		url1="/store";

		global(data1,type1,url1,function(data){
			cat(data);
		});

	}

	function cat(data)
	{
		alert("Record Inserted");
		location.reload();
		
	}


</script>
