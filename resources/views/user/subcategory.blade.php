@extends('layouts.default')
@section('content')

<form class="form-inline text-center">
	<div class="form-group">
		<label>Category</label>
		<select class="form-control" id="cateid">
			<option id="">--Select--</option>
			@foreach($arr as $cate)
			<option value="{{$cate->id}}">{{$cate->name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label>Sub Category</label>
		<input type="text" class="form-control" placeholder="Subcategory Name" name="subcategory" id="subcategory">
		<button type="button" class="btn btn-primary" onclick="add()">Add</button>

	</div>
	<br>
	<br>
	<a href="{{url('addcategory')}}" id="add" class="btn btn-success pull-left">Category</a>
	<a href="{{url('additem')}}" id="add" class="btn btn-success pull-right">Product</a>
	<table  class="table table-hover">
		
			<th>ID</th>
			<th>Category</th>
			<th>Subcategory</th>
			<th  colspan="2">Actions</th>
		
		@foreach($allsubcategory as $category)
		<tr>
			<td>{{$category->id}}</td>
			<td>{{$category->sub['name']}}</td>
			<td>{{$category->sub_category}}</td>
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
					
					<label>Category</label>
		<select class="form-control" id="upcateid">
			<option value="">--Select--</option>
			@foreach($arr as $cate)
			<option  value="{{$cate->id}}" id="{{$cate->id}}">{{$cate->name}}</option>
			@endforeach
		</select>
		<label>Sub Category</label>
		<input type="text" class="form-control" placeholder="Subcategory Name" name="upsubcategory" id="upsubcategory">
				</div>  
				<div class="modal-footer">  
					<button type="button" class="btn btn-primary" onclick="addupdate()">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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

<script type="text/javascript">


	var updateid;
	function updated(id){//updata modal


		updateid=id;
		var data1,type1;
		var url1="subcategory/"+id+"/edit";
		global(data1,type1,url1,function(data){
			upsucess(data);
		});
		
	}
	function upsucess(data){
		
		$('#upsubcategory').val(data.data.sub_category);

		$('#upcateid option[id="'+data.data.category_id+'"]').attr("selected",true);
		$('#updateModal').modal('show');  
	}


	function addupdate(){//add update category

		var id=document.getElementById('upcateid');
		var id1=id.options[id.selectedIndex].id;
		var subcate=document.getElementById('upsubcategory').value;
		
		
		var url1,type1,data1;
		url1="subcategory/update";
		data1={"id":updateid,"subcategory":subcate,"categoryid":id1};
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
		url1="subcategory/destroy/"+dataid;
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
	

	function add()
	{
		var id=document.getElementById('cateid');
		var id1=id.options[id.selectedIndex].value;
		var subcate=document.getElementById('subcategory').value;
		
		var url1="/subcategory";
		var data1={"categoryid":id1,
		"subcategory":subcate};
		var type1="POST";

		global(data1,type1,url1,function(data){
			sucess(data);
		});

	}


//if success you want to do
function sucess(data){
	alert("Record Inserted");
	location.reload();



}
</script>