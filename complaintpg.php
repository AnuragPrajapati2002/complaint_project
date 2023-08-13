<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");
if(!$conn)
{
    echo"Connection Failure";
}

$uid = $_SESSION['loggedinId'];

//comparing user name, surname , phone number and address in complaint form
$sql="SELECT * from user where id = '$uid'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

if(isset($_POST["submit"]))
{

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $email = $_POST['email'];
    $time =  $_POST['time'];
    $description =  $_POST['description'];

     //comparing user name, surname and phone number in complaint form
     $sql="SELECT * from user where id = '$uid'";
     $res = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($res);
     $uname = $row['name'];
     $usurname = $row['surname'];
     $uphone = $row['phone'];
     $uemail = $row['email'];
     $uaddress = $row['address'];

     if($name == $uname && $surname == $usurname && $uphone == $phone && $uemail == $email)
     {
        $query="INSERT INTO problem(name, surname, phone,address, pincode,email, time, description) 
         VALUES('$name','$surname' ,'$phone','$address','$pincode', '$email', '$time', '$description')";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            
            echo"<script> alert('Complaint Submitted Successfully.The engineer will contact you soon.'); </script>";
        }
        else
        {
            echo"Error While sending response.Try after some time.";
        }
    }   
    else
    {
        echo"<script> alert('Please Enter Correct Details'); </script>"; 
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
                font-family: sans-serif;
            }
            body{
                background-image: url(pic10.jpg);
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
                border: 1px solid rgb(7, 4, 10);
                width: 50%;
                margin: 15px 410px;
                padding: 10px 29px;
                color: rgb(17, 17, 17);
            }.regis
            {
                font-size: 50px;
                font-family: Arial;
                font-weight: 300;
                border-bottom-style: ridge;
            }
            /* .regis
            {
                display: block;
                color: rgb(14, 13, 13);
                margin: 10px;
                font-size:50px;
                margin: 30px 30%
                font-family: Arial; 
                font-weight: 300; 
                border-bottom-style: ridge; 
            } */
            /* #form{
                background-color:paleturquoise;
                min-height:auto;
                padding: 5px 40px 40px 40px;

            } */
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
            <div class="container " style="font-size:x-large;">
                <ul class="navbar-nav offset-md-11">
                    <b><li class="nav-item"><a class="btn btn-outline-danger" href="userdashboard.php">Back</a></li></b>
                    <b><li class="nav-item mx-3"><a class="btn btn-outline-danger" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
        <div class="row">
            <div class="col-md-6 offset-md-3" id="form">
                <center class="regis"><h1>Complaint Form</h1></center>
                <form method="POST">
                    <div class="form-group mt-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter the name" autocomplete="off" required pattern="[A-Za-z]{2,20}" value=<?php echo $row['name'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter the surname" required pattern="[A-Za-z]{3,20}" autocomplete="off" value=<?php echo $row['surname'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Contact Number</label>
                        <input type="tel" class="form-control text" name="phone" placeholder="Enter Mobile Number" maxlength="10" required pattern="[0-9]{10}" autocomplete="off" value=<?php echo $row['phone'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="4" placeholder="Enter Address" required pattern="[A-Za-z0-9]{3,90}" autocomplete="off"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label>Pin Code</label>
                        <input type="text" class="form-control text" name="pincode" placeholder="Enter pin code" maxlength="6" required pattern="[0-9]{6}" autocomplete="off" value=<?php echo $row['pincode'];?>>
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="email" class="form-control text" placeholder="Enter Email ID" name="email" required autocomplete="off" value=<?php echo $row['email'];?>>
                    </div>
                    <div class="form-group mt-3">
                        <label>Best time to call</label>
                        <select name="time">
                            <option disabled selected>--Select time--</option>
                            <option value="afternoon" id="1" required>Afternoon</option>
                            <option value="evening" id="2" required>Evening</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label>Write the complaint here</label>
                        <textarea class="form-control" rows="4" name="description" placeholder="Enter your griveance" required pattern="[A-Za-z]{3,90}" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group offset-md-5 mt-4">
                      <button type="submit" name="submit" class="btn btn-success mx-2 mb-2">Submit</button>
                      <!-- <b><a class="btn btn-primary mx-2" href="userdashboard.php">Back</a><b> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
