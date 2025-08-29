<?php
include 'dbcon.php';
if (isset($_POST['save'])) {
	
    $f = $_POST['f'];
    $m = $_POST['m'];
	$l = $_POST['l'];
	$g = $_POST['g'];
	$cname = $_POST['cname'];	
	$level = $_POST['level'];

$result = mysqli_query($conn, "insert into tbl_student (cname,level,fname,mname,lname,gender) values 
('$cname','$level','$f','$m','$l','$g')");?>
<script>window.location = "index.php";</script>
<?php }?>
