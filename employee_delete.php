<?php
$conn = mysqli_connect("localhost", "root", "", "employee_data");
$id=$_GET['id'];
$sql ="DELETE FROM employee WHERE id='$id'";
if(mysqli_query($conn, $sql)){
  
	header("Location: employee_list.php?deleteSuccess"); 

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// Close connection
mysqli_close($conn);
?>