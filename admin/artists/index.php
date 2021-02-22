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
					<button type="button" id="add_button" data-toggle="modal" data-target="#artists_Modal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="artists_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Artist ID</th>
							<th width="10%">Image</th>
							<th width="35%">Name</th>
							<th width="35%">Description</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="artists_Modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="artists_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Artist</h4>
				</div>
				<div class="modal-body">
					<label>Enter Name</label>
					<input type="text" name="artists_name" id="artists_name" class="form-control" />
					<br />
					<label>Enter Description</label>
					<textarea name="artists_description" id="artists_description" class="form-control" /></textarea>
					<br />
					<label>Select Artist Image</label>
					<input type="file" name="artists_image" id="artists_image" />
					<span id="artists_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="artists_id" id="artists_id" />
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
		$('#artists_form')[0].reset();
		$('.modal-title').text("Add New Artist");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#artists_uploaded_image').html('');
	});
	
	var dataTable = $('#artists_data').DataTable({
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
				"targets":[0,1,3,4,5],//Disable Ordering
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#artists_form', function(event){
		event.preventDefault();
		var artists_name = $('#artists_name').val();
		var artists_description = $('#artists_description').val();
		var extension = $('#artists_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#artists_image').val('');
				return false;
			}
		}	
		if(artists_name != '' && artists_description != '')
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
					$('#artists_form')[0].reset();
					$('#artists_Modal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var artists_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{artists_id:artists_id},
			dataType:"json",
			success:function(data)
			{
				$('#artists_Modal').modal('show');
				$('#artists_name').val(data.artists_name);
				$('#artists_description').val(data.artists_description);
				$('.modal-title').text("Edit Artist Info");
				$('#artists_id').val(artists_id);
				$('#artists_uploaded_image').html(data.artists_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var artists_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{artists_id:artists_id},
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
