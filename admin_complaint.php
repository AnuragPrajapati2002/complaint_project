<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","complaint");
if (!$conn) 
{
  echo"Connection Failed.";
}
if(!isset($_SESSION['adminlogin']))
{
        header("Location: adminlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>
</head>
<body>
    
    <nav>
        <div class="navbar navbar-expand-lg" style="background-color: rgb(140, 144, 197);">
            <div class="container " style="font-size:x-large;">
            <h3>Admin Dashboard</h3>
                <ul class="navbar-nav">
                    <b> <li class="nav-item"><a class="nav-link active" href="adminpanel.php">User</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="admin_complaint.php">Complaints</a></li></b>
                    <!-- <b><li class="nav-item"><a class="nav-link active" href="main page.php">Home</a></li></b> -->
                    <b><li class="nav-item"><a class="nav-link active" href="feedback.php">Feedback</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container-fluid">
        <center><h3 class="mt-2">Displaying Complaints from User</h3></center>
        <table class="table table-bordered  mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>Email ID</th>
                    <th>Best time to call </th>
                    <th>Griveance</th>
                    <th>Date and Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
                 $query = "SELECT * FROM `problem`";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['id'];
                        $name = $row['name'];
                        $surname = $row['surname'];
                        $phone = $row['phone'];
                        $address = $row['address'];
                        $pincode = $row['pincode'];
                        $email = $row['email'];
                        $time = $row['time'];
                        $description = $row['description'];
                        $date = $row['date'];
            
                        // retrieving values using concatination below  
                        echo '<tr>
                            <td>'.$id.'</td> 
                            <td>'.$name.'</td>  
                            <td>'.$surname.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$address.'</td>
                            <td>'.$pincode.'</td>
                            <td>'.$email.'</td>
                            <td>'.$time.'</td>
                            <td>'.$description.'</td>
                            <td>'.$date.'</td>
                            <td>
                            <a href="admin_deletecomp.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fa-trash" onclick = "return check_delete()" aria-hidden="true"></i></a>
                            </td>
                        </tr>';
                    }
                }
                else
                {
                    echo'<center><h3 class="mt-3">Currently,No Complaints Found</h3></center>';
                }

                ?>
            </tbody>
        </table>
    </div>
  
</body>
</html>