<?php
include 'dbcon.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $f = $_POST['f'];
    $m = $_POST['m'];
    $l = $_POST['l'];
    $g = $_POST['g'];
    $cname = $_POST['cname'];	
    $level = $_POST['level'];

$result = mysqli_query($conn, "update tbl_student set cname='$cname', level='$level', fname='$f', mname='$m', lname='$l', gender='$g' where id='$id'");?>
<script>window.location = "index.php";</script>
<?php }?>
