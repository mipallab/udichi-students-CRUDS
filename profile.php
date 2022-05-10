<?php 
    require_once "./autoload.php";

    $user_id = $_GET['user_id'];
	$data = $connect -> query("SELECT * FROM students WHERE id = '$user_id'");
	$all_data = $data -> fetch_object();

    // echo "<pre>";
    // print_r($all_data);
    // echo "<pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


</head>
<body style="background-color:seashell;">
    
    <div class="container">
    
        <div class="profile  my-5 w-50 mx-auto py-5 text-center">
            <img style=" margin:0 auto; display:block; width:100px; height:100px; border-radius:50%;" src="./assect/img/<?php echo $all_data -> photo?>" alt="profile pic">
            <h2><?php echo $all_data -> name ?></h2>
            <h5><?php echo $all_data -> username ?></h5>
            <a href="users.php" class="btn btn-primary my-4 d-inline"> Back</a>
        </div>

    
    </div>
    

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>