<?php
 $conn = mysqli_connect("localhost", "root", "", "employee_data"); 
 
 $id=$_POST['id'];

// Attempt insert query execution

$sql = "select * from employee where id = '$id'";  
        $result = mysqli_query($conn, $sql);  
        $row = $result->fetch_all(MYSQLI_ASSOC);  
       echo json_encode($row);
 
 ?>