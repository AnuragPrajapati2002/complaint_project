<?php
$conn = mysqli_connect("localhost","root","","complaint");
if (!$conn) 
{
  echo"Connection Failed.";
}

if(isset($_POST['submit']))
{
  $query = "SELECT * FROM `admin` WHERE `username`='$_POST[username]' AND `password`='$_POST[password]' ";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
    session_start();
    $_SESSION['adminlogin']=$_POST['username'];
    header("Location: adminpanel.php");
  }
  else
  {
    echo"<script> alert('Incorrect Password');</script>";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Form </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <style>
      body{
                background-image: url(complaintform6.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
      }
    </style>
</head>
<body>
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color:#ADD8E6;">
            <div class="container-fluid" style="font-size:x-large;">
            <a class="btn btn-outline-dark offset-md-11" href="main page.php">Home</a>
            </div>
        </div>
    </nav>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class=" col-sm-4">
          <form method="POST">
            <div class="card bg-white text-black mt-5">
              <div class="card-body p-5 text-center">
                <div class="mb-4">
                    <h2 class="mb-2">Admin Login</h2>
                    <div class="mb-4 mt-4">
                      <input type="password" name="username" placeholder="Enter Username" class="form-control form-control" required>
                    </div>

                    <div class="mb-4">
                      <input type="password" name="password" placeholder="Enter Password" class="form-control form-control" required>
                    </div>
                    <button class="btn btn-success w-100" type="submit" name="submit">Login</button>
                </div>
              </div>
            </div>
          </form>     
        </div>
      </div>
    </div> 
          
</body>
</html>