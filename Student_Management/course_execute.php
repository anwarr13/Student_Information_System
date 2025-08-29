<?php
include 'dbcon.php';
if (isset($_POST['save'])) {
    $cname = $_POST['cname'];

$result = mysqli_query($conn, "insert into tbl_course (cname) values ('$cname')");?>
<script>window.location = "course.php";</script>
<?php }?>
