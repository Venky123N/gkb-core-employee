<?php
$conn = mysqli_connect("localhost", "root", "", "employee_data");
$target_dir = "employee_images/";
$image=rand(1,99999).basename($_FILES["employee_photo"]["name"]);

$target_file = $target_dir .$image;
 if (move_uploaded_file($_FILES["employee_photo"]["tmp_name"], $target_file)) {
  }
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$hobbies=$_POST['hobbies'];
$gender=$_POST['gender'];
$department=$_POST['department'];

$id=$_POST['id'];
if(basename($_FILES["employee_photo"]["tmp_name"])!=''){
$sql ="UPDATE employee SET first_name='$first_name', last_name='$last_name', email='$email',hobbies='$hobbies', image='$image', gender='$gender',department='$department' WHERE id=$id";
}else{
  $sql ="UPDATE employee SET  first_name='$first_name', last_name='$last_name',  email='$email',hobbies='$hobbies',gender='$gender',department='$department' WHERE id=$id";
}
if(mysqli_query($conn, $sql)){
   
	echo 'success'; 

} else{
  echo 'error'; 
}
// Close connection
mysqli_close($conn);
?>