<!DOCTYPE html>
<html>
<title>SIS</title>
<?php include 'dbcon.php';?>
<?php 
$id = $_GET['id'];
$result = mysqli_query($conn, "select * from tbl_year where id='$id'");
$row = mysqli_fetch_array($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year_id = $_POST['id'];
    $year_level = trim($_POST['level']);
    
    if (!empty($year_level)) {
        $update_sql = "UPDATE tbl_year SET level = '$year_level' WHERE id = '$year_id'";
        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('Year level updated successfully!'); window.location='year.php';</script>";
        } else {
            echo "<script>alert('Error updating year level!');</script>";
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

<input type="text" name="level" placeholder="Year Level" value="<?php echo $row['level']?>" required>
<button type="submit" name="update">Update</button>
<a href="year.php"><button type="button">Cancel</button></a>
</form>

</body>
</html>