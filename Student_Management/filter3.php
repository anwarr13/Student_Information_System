<!DOCTYPE html>
<html>
<title>Student Information System</title>
<?php include 'dbcon.php';?>
<?php $level = $_GET['level']?>
<body>
<div style="background-color:green;width:100%;color:white;font-size:20px"><center>Student Information System</center></div>
<br>
<a href="index.php">Home</a>
<a href="course.php">Course</a>
<a href="year.php">Year Level</a>
<br><br>
<form action="save.php" method="post">

<input type="text" name="f" placeholder="First Name" required>
<input type="text" name="m" placeholder="Middle Name (Optional)">
<input type="text" name="l" placeholder="Last Name" required>
<select name="g" required>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<select name="cname" required>
<?php
$result = mysqli_query($conn, "select * from tbl_course");
while($row = mysqli_fetch_array($result))
{
?>
<option value="<?php echo $row['cname']?>"><?php echo $row['cname']?></option>
<?php }?>
</select>
<select name="level" required>
<?php
$result = mysqli_query($conn, "select * from tbl_year");
while($row = mysqli_fetch_array($result))
{
?>
<option value="<?php echo $row['level']?>"><?php echo $row['level']?></option>
<?php }?>
</select>
<button type="submit" name="save">Save</button>
</form>
<hr>

<?php
$result = mysqli_query($conn, "select * from tbl_course");
while($row = mysqli_fetch_array($result))
{
?>
<a href="filter.php?cname=<?php echo $row['cname']?>"><button><?php echo $row['cname']?></button></a>
<?php }?>
<hr>
<?php
$result = mysqli_query($conn, "select * from tbl_year");
while($row = mysqli_fetch_array($result))
{
?>
<a href="filter3.php?level=<?php echo $row['level']?>"><button><?php echo $row['level']?></button></a>
<?php }?>
<hr>

<table border="1" width="100%">
<tr style="background-color:blue;color:white;font-family:Arial Narrow;font-size:18px">
<th>Student Name</th>
<th>Course</th>
<th>Level</th>
<th>Gender</th>

<th>Action</th>
</tr>
<?php
$result = mysqli_query($conn, "select * from tbl_student where level = '$level'");
while($row = mysqli_fetch_array($result))
{
$id=$row['id'];
$cname=$row['cname'];
?>
<tr>

<td><?php echo $row['lname'].", ".$row['fname']." ".$row['mname']?></td>
<td><?php echo $row['cname']?></td>
<td><?php echo $row['level']?></td>
<td><?php echo $row['gender']?></td>


<td><center><a href="delete.php?id=<?php echo $id?>" onClick="return confirm('Are you sure you want to delete?')"><button>Delete</button></a>
<a href="update.php?id=<?php echo $id?>&&course=<?php echo $cname?>"><button>Update</button></a></center></td>
</tr>
<?php }?>
</table>  


</body>
</html>
