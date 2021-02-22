<?php 
include("../../includes/config.php");
if(isset($_SESSION['userLoggedIn']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'admin') {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: ../../index.php");
}
?>
<html>
	<head>
		<title>SyncPhonic | Admin</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
				<?php include '../navBar.php';?>
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#genres_Modal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="genres_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="5%">ID</th>
							<th width="35%">Name</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="genres_Modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="genres_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Genre</h4>
				</div>
				<div class="modal-body">
					<label>Enter Name</label>
					<input type="text" name="genres_name" id="genres_name" class="form-control" />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="genres_id" id="genres_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#genres_form')[0].reset();
		$('.modal-title').text("Add New Genre");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#genres_uploaded_image').html('');
	});
	
	var dataTable = $('#genres_data').DataTable({
		"processing":true,
		"serverSide":true,
		"pageLength":30,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0,1],//Disable Ordering
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#genres_form', function(event){
		event.preventDefault();
		var genres_name = $('#genres_name').val();
		if(genres_name != '')
		{	
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#genres_form')[0].reset();
					$('#genres_Modal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Genre Name Is Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var genres_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{genres_id:genres_id},
			dataType:"json",
			success:function(data)
			{
				$('#genres_Modal').modal('show');
				$('#genres_name').val(data.genres_name);
				$('.modal-title').text("Edit Genre Info");
				$('#genres_id').val(genres_id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var genres_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{genres_id:genres_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>
