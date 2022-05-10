<?php 
session_start();
    require_once "autoload.php";

    if(isset($_POST['login'])) {

        
        //set value
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        /**
         * email exixts
         */
        $con = mysqli_connect("localhost","root","","udichi");
        $eml_exist =  mysqli_query($con, "SELECT email FROM students WHERE email = '$email'");

        //if empty value
        $error = [];
        if(empty($email)) {
            $error['email'] = "Email field is required!";
        }
        else if(emailValid($email) == false) {
            $error['email'] = "Enter a valid email address!";
        }
        

        if(empty($pass)) {
            $error['password'] = "Password field is required!";
        }

        if(mysqli_num_rows($eml_exist)){
            
            $pass_query =  mysqli_query($con, "SELECT password FROM students WHERE email = '$email'");

            $asso_pass = mysqli_fetch_assoc($pass_query);
            
            echo "<pre>";
            print_r($asso_pass);
            echo "</pre>";
            if($pass === $asso_pass['password']) {
                $_SESSION['loggedIn'] = "success";
                header('location:./profile.php');
            }
            else {
                echo "password not match";
            }

            
            
        }else{
            echo "email not match";
        }

      
        echo count($error);




    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


</head>
<body style="background-color:seashell;">
    
    <div class="container">
        <div class="w-25 rounded shadow bg-white my-5 mx-auto ">
            <div class="card">
                <div class="card-header"><h2>Login Form</h2></div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" type="text" name="email">
                            <div class="text-danger">
                                <?php 
                                    if(isset($error['email'])){
                                        echo $error['email'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input class="form-control" id="pass" type="password" name="pass">
                            <div class="text-danger">
                                <?php 
                                    if(isset($error['password'])){
                                        echo $error['password'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Login" name="login">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-danger">
                        <?php 
                            if(isset($msg)){
                                echo $msg;
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>