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
			
				<br />
				<div align="right">

					<button type="button" id="add_button" data-toggle="modal" data-target="#songs_Modal" class="btn btn-info btn-lg">Add</button>
					<button type="button" id="reset_trending_button" class="btn btn-danger btn-lg">Reset Trending</button>
				</div>
				<br /><br />
				<table id="songs_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="3%">Song ID</th>
							<th width="5%">Title</th>
							<th width="3%">Artist</th>
							<th width="3%">Artist2</th>
							<th width="3%">Artist3</th>
							<th width="3%">Artist4</th>
							<th width="3%">Album ID</th>
							<th width="3%">Genre ID</th>
							<th width="3%">Duration</th>
							<th width="3%">Preview</th>
							<th width="3%">Album Order</th>
							<th width="3%">Plays</th>
							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>
				
			
		</div>
	</body>
</html>

<div id="songs_Modal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="songs_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Song</h4>
				</div>
				<div class="modal-body">
					<label>Enter Title</label>
					<input type="text" name="songs_title" id="songs_title" class="form-control" />
					<br />
					<label>Enter Artist ID</label>
					<input type="text" name="songs_artist" id="songs_artist" class="form-control" />
					<br />
					<label>Enter Artist2 ID</label>
					<input type="text" name="songs_artist2" id="songs_artist2" class="form-control" />
					<br />
					<label>Enter Artist3 ID</label>
					<input type="text" name="songs_artist3" id="songs_artist3" class="form-control" />
					<br />
					<label>Enter Artist4 ID</label>
					<input type="text" name="songs_artist4" id="songs_artist4" class="form-control" />
					<br />
					<label>Enter Album ID</label>
					<input type="text" name="songs_album" id="songs_album" class="form-control" />
					<br />
					<label>Enter Genre ID</label>
					<input type="text" name="songs_genre" id="songs_genre" class="form-control" />
					<br />
					<label>Enter AlbumOrder</label>
					<input type="text" name="songs_albumorder" id="songs_albumorder" class="form-control" />
					<br />
					<label>Enter Plays</label>
					<input type="text" name="songs_plays" id="songs_plays" class="form-control" />
					<br />
					<label>Select Song</label>
					<input type="file" name="songs_audio" id="songs_audio" />
					<span id="songs_uploaded_audio"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="songs_id" id="songs_id" />
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
		$('#songs_form')[0].reset();
		$('.modal-title').text("Add New Song");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#songs_uploaded_audio').html('');
	});
	
	var dataTable = $('#songs_data').DataTable({
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
				"targets":[0,1,2,3,4,5,6,7,8,9,10,11,12,13],//Disable Ordering
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#songs_form', function(event){
		event.preventDefault();
		var songs_title = $('#songs_title').val();
		var songs_artist = $('#songs_artist').val();
		var songs_artist2 = $('#songs_artist2').val();
		var songs_artist3 = $('#songs_artist3').val();
		var songs_artist4 = $('#songs_artist4').val();
		var songs_album = $('#songs_album').val();
		var songs_genre = $('#songs_genre').val();
		var songs_albumorder = $('#songs_albumorder').val();
		var songs_plays = $('#songs_plays').val();
		var extension = $('#songs_audio').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['mp3','wav']) == -1)
			{
				alert("Invalid Audio File");
				$('#songs_audio').val('');
				return false;
			}
		}	
		if(songs_title != '' && songs_artist != '' && songs_artist2 != '' && songs_artist3 != '' && songs_artist4 != '' && songs_album != '' && songs_genre != '' && songs_albumorder != '' && songs_plays != '')
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
					$('#songs_form')[0].reset();
					$('#songs_Modal').modal('hide');
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
		var songs_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{songs_id:songs_id},
			dataType:"json",
			success:function(data)
			{
				$('#songs_Modal').modal('show');
				$('#songs_title').val(data.songs_title);
				$('#songs_artist').val(data.songs_artist);
				$('#songs_artist2').val(data.songs_artist2);
				$('#songs_artist3').val(data.songs_artist3);
				$('#songs_artist4').val(data.songs_artist4);
				$('#songs_album').val(data.songs_album);
		        $('#songs_genre').val(data.songs_genre);
				$('#songs_albumorder').val(data.songs_albumorder);
				$('#songs_plays').val(data.songs_plays);
				$('.modal-title').text("Edit Song Info");
				$('#songs_id').val(songs_id);
				$('#songs_uploaded_audio').html(data.songs_audio);
				$('#hidden_songs_duration').html(data.hidden_songs_duration);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var songs_id = $(this).attr("id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{songs_id:songs_id},
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

	$(document).on('click', '#reset_trending_button', function(){
		if(confirm("Are you sure you want to reset the trending list ?"))
		{
			$.ajax({
				url:"reset.php",
				method:"POST",
				data:{reset_token : '0405'},
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
