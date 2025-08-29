<?php
include 'dbcon.php';
if (isset($_POST['save'])) {
	
    	$l = $_POST['l'];

$result = mysqli_query($conn, "insert into tbl_year (level) values 
('$l')");?>
<script>window.location = "year.php";</script>
<?php }?>
