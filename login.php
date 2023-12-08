<?php 
//include database connection
include("connect.php");
$tbl_name="user";

//get the parameters from the login html page
$username = $_POST['username'];
$password = $_POST['password'];

// clean the strings 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);


//Query
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result = mysqli_query($conn,$sql);
// mysqli_num_rows is counting table row
if(mysqli_num_rows($result) > 0){
    $rows = mysqli_fetch_assoc($result);
 
    //Direct pages with different user levels
    if ($rows['Manager'] == 'yes') {
        header('location: schedule_manager.html');  
        session_register("username");
        session_register("pasword");
    
    } else if ($rows['Manager'] == 'no') {
        header("location: schedule.html");
        session_register("username");
        session_register("password");
    } else {
        echo "<script>alert('Access Denied!');
        window.location='index.html';
						</script>";
    }
}
?>