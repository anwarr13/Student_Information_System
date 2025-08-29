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
<form action="year_execute.php" method="post">

<input type="text" name="l" placeholder="Level" required>
<button type="submit" name="save">Save</button>
</form>

<br><br>
<HR>
<table border="1" width="100%">
<tr style="background-color:blue;color:white;font-family:Arial Narrow;font-size:18px">
<th>Level</th>
<th>Action</th>
</tr>
<?php
$result = mysqli_query($conn, "select * from tbl_year");
while($row = mysqli_fetch_array($result))
{
$id=$row['id'];
?>
<tr>

<td><?php echo $row['level']?></td>

<td><center><a href="year_delete.php?id=<?php echo $id?>" onClick="return confirm('Are you sure you want to delete?')"><button>Delete</button></a>
<a href="year_update.php?id=<?php echo $id?>"><button>Update</button></a></center></td>
</tr>
<?php }?>
</table>


</body>
</html>
