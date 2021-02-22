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
					<button type="button" id="add_button" data-toggle="modal" data-target="#users_Modal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="users_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">User ID</th>
							<th width="10%">Username</th>
							<th width="10%">First Name</th>
							<th width="10%">Last Name</th>
							<th width="10%">E-Mail</th>
							<th width="10%">Type</th>
							<th width="10%">signUpDate</th>
							<th width="10%">Premium Validity</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="users_Modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="users_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New User</h4>
				</div>
				<div class="modal-body">
					<label>Enter Username</label>
					<input type="text" name="users_username" id="users_username" class="form-control" />
					<br />
					<label>Enter First Name</label>
					<input type="text" name="users_firstname" id="users_firstname" class="form-control" />
					<br />
					<label>Enter Last Name</label>
					<input type="text" name="users_lastname" id="users_lastname" class="form-control" />
					<br />
					<label>Enter Password</label>
					<input type="password" name="users_password" id="users_password" class="form-control" />
					<br />
					<label>Enter E-mail</label>
					<input type="email" name="users_email" id="users_email" class="form-control" />
					<br />
					<label>Enter Type</label>
					<input type="text" name="users_type" id="users_type" class="form-control" />
					<br />
					<label>Premium Valid Till</label>
					<input type="date" name="users_premiumValidity" id="users_premiumValidity" class="form-control" />
					<br />
				</div>
				<div class="modal-footer">
					<input type="hidden" name="users_id" id="users_id" />
					<input type="hidden" name="hidden_users_password" id="hidden_users_password" />
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
		$('#users_form')[0].reset();
		$('.modal-title').text("Add New User");
		$('#action').val("Add");
		$('#operation').val("Add");
	});
	
	var dataTable = $('#users_data').DataTable({
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
				"targets":[6,7,8,9],//Disable Ordering
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#users_form', function(event){
		event.preventDefault();
		var users_username = $('#users_username').val();
		var users_firstname = $('#users_firstname').val();	
		var users_lastname = $('#users_lastname').val();	
		var users_password = $('#users_password').val();
		var hidden_users_password = $('#hidden_users_password').val();
		var users_type = $('#users_type').val();
		var users_email = $('#users_email').val();
		var users_premiumValidity = $('#users_premiumValidity').val();			
		if(users_username != '' && users_firstname != '' && users_lastname != '' &&  users_email != '' &&users_type != '')
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
					$('#users_form')[0].reset();
					$('#users_Modal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("All Fields are Required !!");
		}
	});
	
	$(document).on('click', '.update', function(){
		var users_id = $(this).attr("id");
		var hidden_users_password = $(this).attr("password");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{users_id:users_id},
			dataType:"json",
			success:function(data)
			{	

				$('#users_Modal').modal('show');
				$('#users_username').val(data.users_username);
				$('#users_firstname').val(data.users_firstname);
				$('#users_lastname').val(data.users_lastname);
				$('#users_email').val(data.users_email);
				$('#users_type').val(data.users_type);
				$('#users_premiumValidity').val(data.users_premiumValidity);
				$('.modal-title').text("Edit User Info");
				$('#users_id').val(users_id);
				$('#hidden_users_password').val(hidden_users_password);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	
	$(document).on('click', '.delete', function(){
		var users_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{users_id:users_id},
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
