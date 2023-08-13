<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");
if (!$conn) 
{
  echo"Connection Failed.";
}
if(!isset($_SESSION['loggedinId']))
{
        header("Location: user_login.php");
}
// if(!isset($_SESSION['loggedinId'])){
//     header("Location: loginas.php");
// }
//code to dislay the result of user 
$id=$_SESSION['loggedinId'];
$query = "SELECT * FROM user WHERE id=$id";
$result = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$name = $row['name'];
$surname = $row['surname'];
$phone = $row['phone'];
$address = $row['address'];
$pincode = $row['pincode'];
$email = $row['email'];
$password = $row['password'];
$confirmpassword = $row['confirmpassword'];



if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    // $pass = password_hash($password, PASSWORD_BCRYPT);
    // $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);
    
    if($password == $confirmpassword )
    {
        $query = "UPDATE `user` set id=$id, name='$name', surname='$surname', phone='$phone', address='$address', 
        pincode=$pincode, email='$email', password='$password', confirmpassword='$confirmpassword' WHERE id=$id";
        $result=mysqli_query($conn,$query);
        if($result)
        {
         header("Location: userdashboard.php");
        }
    }
    else
    {
        echo"<script> alert('Password Does Not Match'); </script>";
    }
}
    // Close the MySQL connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            *{
                margin: 2;
                padding: 0;
                font-family: sans-serif;
            }
            body{
                background-image: url(register.jpg  );
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                /* background-color:rgb(31, 199, 199); */
                min-height:auto;
                padding: 5px 40px 40px 40px;
                box-sizing:border-box;
                background: rgba(15, 15, 15, 0.5);
                border: 1px solid rgb(92, 38, 143);
                width: 50%;
                margin: 15px 330px;
                padding: 10px 29px;
            }
            .regis
            {
                /* display: block;
                color: rgb(14, 13, 13);
                margin: 10px;
                font-size:22px;
                margin: 30px 30%; */
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" id="form">
                    <center class="regis"><h1>Edit Profile</h1></center>
                    <form method="POST" name="registration" onsubmit="return validateForm()">
                        <div class="form-group mt-2">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control text" placeholder="Enter name" value=<?php echo $row['name'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Surname</label>
                            <input type="text" name="surname" class="form-control text" placeholder="Enter surname" value=<?php echo $row['surname'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Contact Number</label>
                            <input type="text" class="form-control text" name="phone" placeholder="Enter Mobile Number" size="10" value=<?php echo $row['phone'];?> maxlength="10" required pattern="[0-9]{10}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Address</label>
                            <textarea class="form-control" rows="6"placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,90}" autocomplete="off"><?php echo $row['address'];?></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Pin Code</label>
                                <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> maxlength="6" required pattern="[0-9]{6}" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label>Email ID</label>
                            <input type="text" class="form-control text" placeholder="Enter Email ID" name="email" value=<?php echo $row['email'];?> required autocomplete="off"> 
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control text" placeholder="Enter Password" name="password" value=<?php echo $row['password'];?> required autocomplete="off">  
                        </div>
                        <div class="form-group mt-2">
                            <label>Confirm Password</label><br>
                            <input type="password" class="form-control text" placeholder="Confirm Password" name="confirmpassword" value=<?php echo $row['confirmpassword'];?> required autocomplete="off">
                        </div>
                        <div class="form-group offset-md-4 mt-4">
                          <button type="submit" class="btn btn-success" name="submit">Update</button>
                          <a  class="btn btn-danger mx-3" href="userdashboard.php">Back</a>
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