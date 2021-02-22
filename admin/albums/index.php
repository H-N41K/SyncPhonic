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
					<button type="button" id="add_button" data-toggle="modal" data-target="#albums_Modal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="albums_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Album ID</th>
							<th width="10%">Image</th>
							<th width="35%">Title</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="albums_Modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="albums_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Album</h4>
				</div>
				<div class="modal-body">
					<label>Enter Title</label>
					<input type="text" name="albums_name" id="albums_name" class="form-control" />
					<br />
					<label>Enter Genre ID</label>
					<input type="text" name="albums_genre" id="albums_genre" class="form-control" />
					<label>Enter Artist ID</label>
					<input type="text" name="albums_artist" id="albums_artist" class="form-control" />
					<label>Select Album's Artwork</label>
					<input type="file" name="albums_image" id="albums_image" />
					<span id="albums_uploaded_image"></span>
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="albums_id" id="albums_id" />
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
		$('#albums_form')[0].reset();
		$('.modal-title').text("Add New Album");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#albums_uploaded_image').html('');
	});
	
	var dataTable = $('#albums_data').DataTable({
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
				"targets":[0,1,3,4],//Disable Ordering
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#albums_form', function(event){
		event.preventDefault();
		var albums_name = $('#albums_name').val();
		var albums_genre = $('#albums_genre').val();
		var albums_artist = $('#albums_artist').val();
		var extension = $('#albums_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#albums_image').val('');
				return false;
			}
		}	
		if(albums_name != '' && albums_artist != '' && albums_genre != '')
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
					$('#albums_form')[0].reset();
					$('#albums_Modal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("All Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var albums_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{albums_id:albums_id},
			dataType:"json",
			success:function(data)
			{
				$('#albums_Modal').modal('show');
				$('#albums_name').val(data.albums_name);
				$('#albums_genre').val(data.albums_genre);
				$('#albums_artist').val(data.albums_artist);
				$('.modal-title').text("Edit Album Info");
				$('#albums_id').val(albums_id);

				$('#albums_uploaded_image').html(data.albums_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var albums_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{albums_id:albums_id},
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
