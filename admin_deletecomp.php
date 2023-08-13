<?php
$conn = mysqli_connect("localhost","root","","complaint");
if (!$conn) 
{
    echo"Connection Failed.";
}
if(isset($_GET['deleteid']))
{
  $id = $_GET['deleteid'];

    $query = "DELETE FROM `problem` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       header("Location: admin_complaint.php");
    }
    else
    {
        echo"Error in Connection";
    }
}
