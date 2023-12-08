<?php
$sname = "localhost";
$uname = "matthew";
$password = "2Trwbx81!";
$db = "shift_database";

//connecting to the database
$conn = mysqli_connect("$sname", "$uname", "$password", "$db");

if (!$conn) {
    die("Error: could not connect". mysqli_connect_error());
}
?>