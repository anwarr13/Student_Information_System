<!DOCTYPE html>
<html>
<title>Student Information System</title>
<?php include 'dbcon.php';?>
<body>
<div style="background-color:green;width:100%;color:white;font-size:20px"><center>Student Information System</center></div>
<br>
<a href="index.php">Home</a>
<a href="course.php">Course</a>
<a href="year.php">Year Level</a>
<br><br>
<form action="course_execute.php" method="post">
<input type="text" name="cname" placeholder="Course Name" required>
<button type="submit" name="save">Save</button>
</form>

<br><br>
<HR>
<table border="1" width="100%">
<tr style="background-color:blue;color:white;font-family:Arial Narrow;font-size:18px">
<th>Course Name</th>
<th>Action</th>
</tr>
<?php
$result = mysqli_query($conn, "select * from tbl_course");
while($row = mysqli_fetch_array($result))
{
$id=$row['id'];
?>
<tr>

<td><?php echo $row['cname']?></td>

<td><center><a href="course_delete.php?id=<?php echo $id?>" onClick="return confirm('Are you sure you want to delete?')"><button>Delete</button></a>
<a href="course_update.php?id=<?php echo $id?>"><button>Update</button></a></center></td>
</tr>
<?php }?>
</table>


</body>
</html>
