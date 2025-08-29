<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query($conn, "delete from tbl_course where id='$get_id'");
header('location:course.php');
?>
