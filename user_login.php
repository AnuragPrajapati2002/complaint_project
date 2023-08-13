<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");
if(!$conn)
{
  echo"Connection Failure";  
}

if(isset($_POST["submit"]))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' ");
    $row= mysqli_fetch_assoc($result);
    
    if(mysqli_num_rows($result) > 0)
    {
        if($password == $row["password"])
        {
          $id=$row['id'];
          $_SESSION['loggedinId']=$id;

          // $_SESSION["login"] = true;
          // $_SESSION["id"] = $row["id"];
          header("Location: userdashboard.php");
        }
        else
        {
          echo"<script> alert('Wrong Password.'); </script>"; 
        }
    }
    else
    {
      echo"<script> alert('User Not Registered,'); </script>"; 
    }
}
    // Close the MySQL connection
    mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
    <title>User Login Form</title>
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
            <div class="container-fluid " style="font-size:x-large;">
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
                <div class="mb-5">
                    <h2 class="mb-2">User Login</h2>
                    <div class="mb-4 mt-4">
                      <input type="email"  placeholder="Enter Email ID" name="email" class="form-control form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-4">
                       <input type="password" name="password" placeholder="Enter Password" class="form-control form-control" required>
                    </div>
                    <button class="btn btn-success w-100 " type="submit" name="submit">Login</button>
                </div>
                <div>
                  <h5>Don't have an account? <a href="registerpg.php" style="text-decoration:none">Sign Up</a></h5>
                </div>
              </div>
            </div>
          </form>     
        </div>
      </div>
    </div> 

</body>
</html>

