<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
    <title>Login</title>
</head>
<body>

<?php 
#connecting to the database
$conn = mysqli_connect("studentdb-maria.gl.umbc.edu", "menchues", "menchues", "menchues");

#get the parameters from the login html page
$username = $_POST['username'];
$password = $_POST['pass'];
#to prevent injections
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

#EMPLOYEE Table
$tbl_name="LOGIN";
//Query
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
// mysqli_num_rows is counting table row
if(mysqli_num_rows($result) > 0){
    $rows = mysqli_fetch_assoc($result);
 
    //Direct pages with different user levels
    if ($rows['E_Position'] == 'Manager') {
        header('location: schedule_manager.html');  
        session_register("username");
        session_register("pass");
    
    } else if ($rows['E_Position'] != 'Manager') {
        header("location: schedule.html");
        session_register("username");
        session_register("pass");
    } else {
        header("index.html");
    }
}
?>
</body>
</html>