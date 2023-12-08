<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db = "shift_db";

//connecting to the database
$conn = mysqli_connect("$sname", "$uname", "$password", "$db");

// if (!$conn) {
//     die("Error: could not connect". mysqli_connect_error());
// }
?>