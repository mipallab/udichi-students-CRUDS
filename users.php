<?php 

	include_once "./autoload.php";

	$delete_id = $_GET['dlt_id'] ?? false;
	if($delete_id) {
		$connect -> query("DELETE FROM students WHERE id=  '$delete_id'");
		header("location:users.php");
	}

	

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List</title>
	<!-- ALL CSS FILES  -->
	 <!-- bootstrap css -->
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<style>
	
</style>
<body style="background-color:seashell;">

	
	<div class="container">
		
		<div class="users-table mt-5 bg-white p-3 rounded shadow">
			<div class="">
				<div class="float-left">
					<h2 class="h2 ">All Users List</h2><br>
				</div>
				<div class="float-right">
					<a href="index.php" class="btn btn-primary">Add People</a>
				</div>
				
			</div>
			
				<table class="table table-striped" >
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">cell</th>
					<th scope="col">Location</th>
					<th scope="col">Gender</th>
					<th scope="col">Photo</th>
					<th scope="col">Username</th>
					<!-- <th scope="col">Password</th> -->
					<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
					
					$data = $connect -> query("SELECT * FROM students ");
					$sl = 1;
					while($students = $data -> fetch_object()) : ?>
						<tr>
							<th scope="row"><?php echo $sl; $sl++;?></th>
							<td><?php  echo $students -> name;?></td>
							<td><?php echo $students -> email ?></td>
							<td><?php echo $students -> cell ?></td>
							<td><?php echo $students -> location ?></td>
							<td><?php echo $students -> gender ?></td>
							<td><img style="width:80px" src="./assect/img/<?php echo $students -> photo ?>" alt="profile pic"></td>
							<td><?php echo $students -> username ?></td>
							<!-- <td>
								<?php echo $students -> password ?><br>
							</td> -->
							
							<td class="">
								<a class="btn btn-sm btn-warning">Edit</a>
								<a href="profile.php ?user_id=<?php echo $students -> id ?>" class="btn btn-sm btn-info">View</a>
								<a class="btn btn-sm btn-danger delete_btn" href="?dlt_id=<?php echo $students -> id ?>">Delete</a>
							</td>
						</tr>

						<?php endwhile; ?>
				</tbody>
				</table>
		</div>

	</div>

<br><br><br><br><br><br>

	<!-- JS FILES  -->
	<!-- bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

	<script>
		$('.delete_btn').click(function(){
			let cnf = confirm("Are Your Sure");

			if(cnf == true){
				return true;
			}
			else {
				return false;
			}
		});
		

	</script>
</body>
</html>