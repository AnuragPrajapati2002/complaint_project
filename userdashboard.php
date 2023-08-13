<?php
session_start();
$conn = mysqli_connect("localhost","root","","complaint");

if(!isset($_SESSION['loggedinId']))
{
        header("Location: user_login.php");
}
$id = $_SESSION['loggedinId'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id =$id");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
<style>
  
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  font-size: 30px;
  text-decoration: none;
}

li a:hover {
  background-color: #2c1c64;
}

.column{
  margin-top: 2%;
  display: flex;
  justify-content: space-between;
  display: flex;
  flex-flow: row wrap;

}

.row{
  flex-basis: 30%;
  background: #327996;
  border-radius: 5px;
  margin-bottom: 2%;
  padding: 18px 15px;
  box-sizing:border-box;
  font-size: 20px;
}

.row:hover{
    box-shadow: 10px 10px 10px 10px rgb(1, 9, 34);

}

</style>
</head>
<body>
<center><h1 class="col-md-3 offset-md-5">Welcome <?php echo $row["name"]," ",$row[ "surname"]; ?></h1></center>
<ul>
  <li><a  href="user_edit.php">EditProfile</a></li>
  <li><a href="complaintpg.php"> Add Complaint</a></li>
  <!-- <li><a href="main page.php">Home</a></li> -->
  <li style="float:right"><a  href="logout.php">Logout</a></li>
</ul>
<center><h1>Overview of our website</h1></center>
<section class="column">
  <div class="row">
      <p>Online Complaint Management System provides an online way of solving the problems faced by the public by saving time and eradicate corruption , And The ability of providing many of the reports on the system , and add to Facilitate the process of submitting a complaint.</p>
  </div>
  <div class="row">
      <p>You can submit complaints online from anywhere, at any time, using any device with an internet connection. This saves time and effort, and eliminates the need for in-person.</p>
  </div>
  <div class="row">
      <p>An online complaint management system streamlines the complaint handling process, allowing for faster responses and resolutions. You can easily provide additional information to the organization staff  that can respond quickly and efficiently.</p>
  </div>
  <div class="row">
    <p>An online complaint management system is a platform that allows you to submit complaints or issues online, providing a convenient and efficient alternative to traditional complaint handling methods.</p>
</div>
<div class="row">
    <p>The system is  user-friendly  for submitting complaints. Benefits for you that is, it includes faster response times, improved communication between users and the organization.</p>
</div>
<div class="row">
  <p>
    Here your complaints will be handle by the most appropriate engineer in your area and the complaints are addressed in a timely and effective manner. The system also ensures confidentiality and privacy of your information 
  </p>
</div>
</section>
</body>
<!--<img src="userdashboard2.jpg"  class="img"></img>-->
<a href=""></a>
</body>
</html>
