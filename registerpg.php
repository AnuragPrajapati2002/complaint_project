<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");

if(!$conn)
{
  echo"Connection Failure";  
}

if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $surname =$_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    // $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo"<script> alert('Email Already Exists'); </script>";
    }
    else
    {
        if($password == $confirmpassword)
        {
            $query="INSERT INTO user (name, surname, phone, address, pincode, 
            email, password, confirmpassword) VALUES('$name', '$surname', '$phone','$address','$pincode', '$email', '$password','$confirmpassword')";
            mysqli_query($conn,$query);
            echo"<script> alert('Registered Successfully'); </script>";
        }
        else
        {
            echo"<script> alert('Password Does Not Match'); </script>"; 
        }
    }
}

    // Close the MySQL connection
    mysqli_close($conn);
?>



<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            *{
                margin: 2;
                padding: 0;
                min-height:auto;
                font-family: sans-serif;
            }
            body{
                background-image: url(pic6.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:rgb(248, 250, 250);
                min-height:auto;
                padding: 5px 40px 40px 40px; 
                box-sizing:border-box;
                background: rgba(179, 204, 230, 0.5);
                border: 1px solid rgb(7, 4, 10);
                width: 50%;
                margin: 15px 310px;
                padding: 10px 29px;
                color: rgb(17, 17, 17);

            }
            .regis
            {
                font-size: 50px;
                font-family: Arial;
                font-weight: 300;
                border-bottom-style: ridge;
            }
            .text{
                height: 35px;
            }
            label{
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <nav>
            <div class="navbar navbar-expand-lg" style="background-color:#ADD8E6;">
                <div class="container-fluid " style="font-size:x-large;">
                <a class="btn btn-outline-secondary offset-md-11" href="user_login.php">Back</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" id="form">
                    <center class="regis"><h1>User Register</h1></center>
                    <form method="POST" name="registration" onsubmit="return validateForm()">
                        <div class="form-group mt-2">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control text" placeholder="Enter the name" required pattern="[A-Za-z]{2,20}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control text" placeholder="Enter the surname" required pattern="[A-Za-z]{3,20}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Contact Number</label>
                            <input type="tel" class="form-control text" name="phone" placeholder="Enter Mobile Number" maxlength="10" required pattern="[0-9]{10}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Address</label>
                            <textarea class="form-control" rows="4" name="address" placeholder="Enter Address" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Pin Code</label>
                            <input type="text" class="form-control text" name="pincode" placeholder="Enter pin code" maxlength="6" required pattern="[0-9]{6}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Email ID</label>
                            <input type="email" class="form-control text" placeholder="Enter Email ID" name="email" required autocomplete="off"> 
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control text" placeholder="Enter Password" name="password" required autocomplete="off">  
                        </div>
                        <div class="form-group mt-2">
                            <label>Confirm Password</label><br>
                            <input type="password" class="form-control text" placeholder="Confirm Password" name="confirmpassword" required autocomplete="off">
                        </div>
                        <div class="form-group offset-md-5 mt-4">
                          <button type="submit" class="btn btn-success" name="submit" >Register</button>
                          <!-- <a  class="btn btn-danger mx-3" href="user_login.php">Cancel</a> -->
                        </div>
                        <div>
                            <h4 style="text-align:center" class="my-3">Already Have a Account ? <a href="user_login.php" style="text-decoration:none">Login Here</a></h4>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function validateForm() {
                var password = document.forms["registration"]["password"].value;
                // Check if password is empty or less than 8 characters
                if (password == "" || password.length < 8) {
                    alert("Password should be at least 8 characters long");
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>