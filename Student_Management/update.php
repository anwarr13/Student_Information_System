<!DOCTYPE html>
<html>
<title>SIS</title>
<?php include 'dbcon.php';?>
<?php 
$id = $_GET['id'];
$course = $_GET['course'];
$result = mysqli_query($conn, "select * from tbl_student where id='$id'");
$row = mysqli_fetch_array($result);
?>
<body>
<div style="background-color:green;width:100%;color:white;font-size:20px"><center>Student Information System</center></div>
<br>
<a href="index.php">Home</a>
<a href="course.php">Course</a>
<a href="year.php">Year Level</a>
<br><br>
<form action="update_execute.php" method="post">
<input type="hidden" name="id" value="<?php echo $id?>">

<input type="text" name="f" placeholder="First Name" value="<?php echo $row['fname']?>" required>
<input type="text" name="m" placeholder="Middle Name (Optional)" value="<?php echo $row['mname']?>">
<input type="text" name="l" placeholder="Last Name" value="<?php echo $row['lname']?>" required>
<select name="g" required>
<option value="Male" <?php if($row['gender']=='Male') echo 'selected'?>>Male</option>
<option value="Female" <?php if($row['gender']=='Female') echo 'selected'?>>Female</option>
</select>
<select name="cname" required>
<?php
$result2 = mysqli_query($conn, "select * from tbl_course");
while($row2 = mysqli_fetch_array($result2))
{
?>
<option value="<?php echo $row2['cname']?>" <?php if($row['cname']==$row2['cname']) echo 'selected'?>><?php echo $row2['cname']?></option>
<?php }?>
</select>
<select name="level" required>
<?php
$result3 = mysqli_query($conn, "select * from tbl_year");
while($row3 = mysqli_fetch_array($result3))
{
?>
<option value="<?php echo $row3['level']?>" <?php if($row['level']==$row3['level']) echo 'selected'?>><?php echo $row3['level']?></option>
<?php }?>
</select>
<button type="submit" name="update">Update</button>
<a href="index.php"><button type="button">Cancel</button></a>
</form>

</body>
</html>
