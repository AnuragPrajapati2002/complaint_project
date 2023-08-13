<?php
$conn = mysqli_connect("localhost","root","","complaint");
if (!$conn) 
{
  echo"Connection Failed.";
}

if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];

    $query = "DELETE FROM `user` WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       header("Location: adminpanel.php");
    }
    else
    {
        echo"Error in Connection";
    }
}
?>