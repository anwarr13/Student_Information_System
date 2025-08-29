<?php
include 'dbcon.php';

if (isset($_GET['query']) && isset($_GET['cname'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);
    $cname = mysqli_real_escape_string($conn, $_GET['cname']);
    
    if (empty($search)) {
        // If search is empty, return all students for this course
        $query = "SELECT * FROM tbl_student WHERE cname = '$cname' ORDER BY lname, fname";
    } else {
        // Search within the specific course
        $query = "SELECT * FROM tbl_student WHERE cname = '$cname' AND (
                  fname LIKE '%$search%' OR 
                  mname LIKE '%$search%' OR 
                  lname LIKE '%$search%' OR 
                  level LIKE '%$search%' OR 
                  gender LIKE '%$search%')
                  ORDER BY lname, fname";
    }
    
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $cname = $row['cname'];
            echo '<tr>';
            echo '<td>' . $row['lname'] . ", " . $row['fname'] . " " . $row['mname'] . '</td>';
            echo '<td>' . $row['cname'] . '</td>';
            echo '<td>' . $row['level'] . '</td>';
            echo '<td>' . $row['gender'] . '</td>';
            echo '<td><center>';
            echo '<a href="delete.php?id=' . $id . '" onClick="return confirm(\'Are you sure you want to delete?\')"><button>Delete</button></a> ';
            echo '<a href="update.php?id=' . $id . '&&course=' . $cname . '"><button>Update</button></a>';
            echo '</center></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5" style="text-align:center; color:red;">No students found matching your search in this course.</td></tr>';
    }
}
?>
