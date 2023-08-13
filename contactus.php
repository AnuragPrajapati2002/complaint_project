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
    $email =  $_POST['email'];
    $message = $_POST['message'];
 
    $query = "INSERT INTO feedback(name, surname, email, message) VALUES('$name', '$surname','$email', '$message')";
    $result = mysqli_query($conn,$query);
    if($result)
    {
        echo"<script> alert('Response Submitted Successfully.'); </script>";
    }
    else
    {
        echo"<script> alert('Error While Submitting.'); </script>";
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="bootstrap.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Contact Us</title>
</head>
<body style=" background-image:url('complaintform5.jpg'); background-size: cover; position: relative;">
    <!--Section: Contact v.2-->
    <section class="mb-4 mx-2 px-2" style="background-color: ; height: 600px" >

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4s">Contact Us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto">Any queries from you? Please don't be afraid to get in touch with us directly.</p>
        <p class="text-center w-responsive mb-5">You can comment on our services right here as well.</p>
        <div class="row mx-2">
            <div class=" col-md-9 mb-md-0 mb-5 ">
                <form method="POST">
                <div class="form-group ">
                        <label class="col-md-6">Name</label>
                        <input type="text" name="name" class="form-control text" placeholder="Enter name" required pattern="[A-Za-z]{2,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Surname</label>
                        <input type="text" name="surname" class="form-control text" placeholder="Enter surname" required pattern="[A-Za-z]{3,20}" autocomplete="off">
                    </div>
                    <div class="form-group mt-2">
                        <label>Email ID</label>
                        <input type="email" class="form-control text" placeholder="Enter Email ID" name="email" required autocomplete="off"> 
                    </div>
                    <div class="form-group mt-2">
                        <label>Message</label>
                        <textarea class="form-control" rows="2"placeholder="Enter message" name="message" required pattern="[A-Za-z0-9]{3,60}" autocomplete="off"></textarea>
                    </div>
                    <div class="form-group offset-md-5 mt-4">
                      <button type="submit" class="btn btn-danger" name="submit">Send</button>
                      <a class="btn btn-primary mx-2" href="main page.php">Back</a>
                    </div>
                <div class="status"></div>
            </div>
            <!-- right part -->
            <div class="col-md-3 text-center lead">
                <ul class="list-unstyled mb-0 ">
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p>Mumbai,India</p>
                    </li>

                    <li><i class="fa fa-phone-square" aria-hidden="true"></i>
                        <p>+91 9870265086</p>
                    </li>

                    <li><i class="fa fa-envelope" aria-hidden="true"></i>
                        <p>dummy@gmail.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
    </section>
</body>
</html>
