<?php
   
    //include_once "./autoload.php";
   
    include_once "./assect/app/function.php";
    include_once "./assect/app/process.php";
    include_once "./assect/app/query.php";
    include_once "./assect/config/config.php";


if(isset($_POST['submit'])) {
        
    //get values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell =  $_POST['cell'];
    $location =  $_POST['location'];
    $gender =  $_POST['gender'] ?? '';
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $conpass =  $_POST['crmpass'];
    $photo  = $_FILES['photo'];
    $agree = $_POST['agree'] ?? '';

    
    $error = array();

        /**
        *  if values empty
        */ 
        //email already taken
        $con = mysqli_connect("localhost","root","","udichi");
        $eml_exist =  mysqli_query($con, "SELECT email FROM students WHERE email = '$email'");


        //username already taken
        $con = mysqli_connect("localhost","root","","udichi");
        $username_exist =  mysqli_query($con, "SELECT username FROM students WHERE username = '$username'");

        // name
        if(empty($name)){
            $error['name'] = "*Name field is required!";
        }

        // email
        if(empty($email)){
            $error['email'] = "*email field is required!";
        }
        //valid email check {}
        else if(!emailValid($email) == true) {
            $error['email'] = "Enter a valid email address!";
        }else if (mysqli_num_rows($eml_exist)) {
            $error['email'] = "Email already taken!";
        }

        // cell
        if(empty($cell)){
            $error['cell'] = "*cell field is required!";
        }

        // location
        if(empty($location)) {
            $error['location'] = "*location field is required!";
        }

        // location
        if(empty($gender)) {
            $error['gender'] = "*gender field is required!";
        }

        // username
        if(empty($username)){
            $error['username'] = "*Username field are required!";
        }else if(mysqli_num_rows($username_exist)){
            $error['username'] = "*Username already taken!";
        }

        // password
        if(empty($password)) {
            $error['password'] = "*password field required!";
        }
        // confarm password
        if(empty($conpass)) {
            $error['conpass'] = "*Confarm password field is required!";
        }
        else if($password != $conpass) {
            $error['conpass'] = "*Confarm password not match!";
        }

        //agree
        if(empty($agree)) {
            $error['agree'] = "Please read the treams & condation. then checked in";
        }


    
    // if data send successfully {}

    if(count($error) === 0) {
         clearOld();
        $msg = "<p class = \"alert alert-success\"> Successfully! You create an account. 
                <button class= \"close\" type= \"button\" data-dismiss= \"alert\"> 
                        <span>&times;</span>
                    </button>
                </p>";


        // file upload
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_name = $_FILES['photo']['name'];
        move_uploaded_file($photo_tmp,"./assect/img/".$photo_name);




        /**
         * query
         */

         // data send query
         $connect -> query("INSERT INTO students (name, email, cell, location, gender, photo, username, password) VALUES (\"$name\", \"$email\", \"$cell\", \"$location\", \"$gender\",\"$photo_name\", \"$username\", \"$password\")");


    }



}
