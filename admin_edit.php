<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");
if(!isset($_SESSION['adminlogin']))
{
        header("Location: adminlogin.php");
}

//getting id  of the user which will be updated
$id = $_GET['updateid'];
// to display previous value in the update form 
$query = "SELECT * FROM `user` WHERE id=$id";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

$name = $row['name'];
$surname = $row['surname'];
$phone = $row['phone'];
$address = $row['address'];
$pincode = $row['pincode'];
$email = $row['email'];
$password = $row['password'];
$confirmpassword = $row['confirmpassword'];
$date = $row['date'];

if(isset($_POST["submit"]))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    // $email =  $_POST['email'];
    // $password = $_POST['password'];
    // $confirmpassword = $_POST['confirmpassword'];
    
        $query = "UPDATE `user` set id=$id, name='$name', surname='$surname', phone='$phone', address='$address', 
        pincode=$pincode, email='$email', password='$password', confirmpassword='$confirmpassword' WHERE id=$id";
        $result=mysqli_query($conn,$query);
        if($result)
        {
         header("Location: adminpanel.php");
        }
        else
        {
            echo"<script> alert('Error while updating user details.'); </script>";
        }
}

    // Close the MySQL connection
    mysqli_close($conn);


?>


<!--  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit page</title>
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body{
                background-image: url(timepass.jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                font-style:Arial;
            }
            #form{
                background-color:#COCOCO;
                min-height:auto;
                padding: 5px 40px 40px 40px;

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
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form" style="border: #ADD8E6 4px solid"> 
                <center class="regis mt-3"><h1>Edit User Details</h1></center>
                <form action="" method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter full name" value=<?php echo $row['name'];?> required pattern="[A-Za-z]{3,20}" autocomplete="off">
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
                        <textarea class="form-control" rows="6"placeholder="Enter Address" name="address" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                            <input type="text" class="form-control text" placeholder="Enter Pincode" name="pincode" value=<?php echo $row['pincode'];?> maxlength="6" required pattern="[0-9]{6}" autocomplete="off">
                    </div>
                    <div class="form-group offset-md-4 mt-4 mb-5">
                      <button type="submit" class="btn btn-success mb-2" name="submit">Update</button>
                      <a class="btn btn-danger mx-3 mb-2" href="adminpanel.php">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>