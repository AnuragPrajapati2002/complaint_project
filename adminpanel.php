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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                    <b><li class="nav-item"><a class="nav-link active" href="feedback.php">Feedback</a></li></b>
                    <b><li class="nav-item"><a class="nav-link active" href="logout.php">Logout</a></li></b>
                </ul>
            </div>
        </div>
    </nav>
      
    <div class="container">
            <!-- <a href="" class="btn btn-danger mt-3" data-toggle="modal" data-target="#addmodal" >Add User</a> -->
        <table class="table table-bordered  mt-4">
        <a href="admin_adduser.php" class="btn btn-danger mt-3">Add User</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Pin Code</th>
                    <th>Email ID</th>
                    <!-- <th>Password</th>
                    <th>Confirm Password</th> -->
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                // getting all data from user table
                $query = "SELECT * FROM `user`";
                $result = mysqli_query($conn,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $id = $row['id'];
                        $name = $row['name'];
                        $surname = $row['surname'];
                        $phone = $row['phone'];
                        $address = $row['address'];
                        $pincode = $row['pincode'];
                        $email = $row['email'];
                        // $password = $row['password'];
                        // $confirmpassword = $row['confirmpassword'];
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
                            <td>'.$date.'</td>
                            
                            <td> 
                                <a href="admin_userview.php?viewid='.$id.'" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="admin_edit.php?updateid='.$id.'" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="admin_delete.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fa-trash" onclick = "return check_delete()" aria-hidden="true"></i></a>
                            </td>
                        </tr>';

                    }
                }

                ?>
            </tbody>
        </table>
    </div>


    <!-- code for onclick checkdelete() function-->
    <script>
        function check_delete()
        {
            return confirm('Are you sure you want to delete this record ?');
        }
    </script>
</body>
</html>