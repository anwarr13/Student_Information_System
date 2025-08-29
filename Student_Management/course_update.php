<!DOCTYPE html>
<html>
<title>SIS</title>
<?php include 'dbcon.php';?>
<?php 
$id = $_GET['id'];
$result = mysqli_query($conn, "select * from tbl_course where id='$id'");
$row = mysqli_fetch_array($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['id'];
    $course_name = trim($_POST['cname']);
    
    if (!empty($course_name)) {
        $update_sql = "UPDATE tbl_course SET cname = '$course_name' WHERE id = '$course_id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('Course updated successfully!'); window.location='course.php';</script>";
        } else {
            echo "<script>alert('Error updating course!');</script>";
        }
    }
}
?>
<body>
<div style="background-color:green;width:100%;color:white;font-size:20px"><center>Student Information System</center></div>
<br>
<a href="index.php">Home</a>
<a href="course.php">Course</a>
<a href="year.php">Year Level</a>
<br><br>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id?>">

<input type="text" name="cname" placeholder="Course Name" value="<?php echo $row['cname']?>" required>
<button type="submit" name="update">Update</button>
<a href="course.php"><button type="button">Cancel</button></a>
</form>

</body>
</html> 