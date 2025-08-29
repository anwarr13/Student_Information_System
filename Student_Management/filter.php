<!DOCTYPE html>
<html>
<title>SIS</title>
<?php include 'dbcon.php';?>
<?php $cname = $_GET['cname']?>
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
<input type="text" id="searchInput" placeholder="Search students in this course..." style="padding: 5px; width: 250px; border: 1px solid #ccc; border-radius: 4px;">

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
$result = mysqli_query($conn, "select * from tbl_student where cname = '$cname'");
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

<script>
// Get current course name from URL
const urlParams = new URLSearchParams(window.location.search);
const currentCourse = urlParams.get('cname');

// Debouncing function with 0.9ms delay
function debounce(func, delay) {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => func.apply(this, args), delay);
    };
}

// Search function for filtered course
function searchStudents(query) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'filter_search.php?query=' + encodeURIComponent(query) + '&cname=' + encodeURIComponent(currentCourse), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Find the table body and update it with search results
            const tableRows = document.querySelector('table').querySelectorAll('tr');
            // Remove all existing data rows (keep header row)
            for (let i = tableRows.length - 1; i > 0; i--) {
                tableRows[i].remove();
            }
            
            // Add new search results
            const table = document.querySelector('table');
            table.insertAdjacentHTML('beforeend', xhr.responseText);
        }
    };
    xhr.send();
}

// Create debounced search function with 0.9ms delay
const debouncedSearch = debounce(searchStudents, 0.9);

// Add event listener to search input
document.getElementById('searchInput').addEventListener('input', function() {
    const query = this.value.trim();
    debouncedSearch(query);
});

// Initial load - show all students for this course
document.addEventListener('DOMContentLoaded', function() {
    // This ensures the page loads with all students for the current course visible
});
</script>

</body>
</html>
