<?php

$target_dir = "employee_images/";
$image=basename($_FILES["employee_photo"]["name"]);

$target_file = $target_dir .$image;
 if (move_uploaded_file($_FILES["employee_photo"]["tmp_name"], $target_file)) {
  }

  $conn = mysqli_connect("localhost", "root", "", "employee_data");
 

     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $email=$_POST['email'];
     $hobbies=$_POST['hobbies'];
     $gender=$_POST['gender'];
     $join_date = date('Y-m-d', strtotime($_POST['join_date']));
     $department=$_POST['department'];

     $query="INSERT INTO employee(first_name,	last_name,	email,	hobbies,	gender,	join_date,	department,	image)Values ('$first_name','$last_name','$email','$hobbies','$gender','$join_date','$department','$image')";
$query_run=mysqli_query($conn, $query);