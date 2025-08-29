<?php
include('dbcon.php');
$get_id=$_GET['id'];
mysqli_query($conn, "delete from tbl_student where id='$get_id'");
header('location:index.php');
?>
