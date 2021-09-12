<?php
 $conn = mysqli_connect("localhost", "root", "", "employee_data"); 
 
 $join_date=$_POST['join_date'];
 $department=$_POST['department'];
// Attempt insert query execution
if($join_date!='' && $department==''){

    $sql = "select * from employee where join_date = '$join_date'";  
    $result = mysqli_query($conn, $sql);  
}
elseif($join_date=='' && $department!=''){
    
    $sql = "select * from employee where department = '$department'";   
$result = mysqli_query($conn, $sql);  
}
elseif($join_date!='' && $department!=''){
    
    $sql = "select * from employee where department = '$department' AND join_date = '$join_date' " ;   
$result = mysqli_query($conn, $sql);  
}else{

    $sql = "select * from employee";  
    $result = mysqli_query($conn, $sql);  
}


$sn=1;

while( $row = mysqli_fetch_array( $result ) ){?>
<tr>
<td><?php echo $sn ;?></td>
<td><?php echo $row['first_name'] ;?></td>
<td><?php echo $row['last_name'] ;?></td>
<td><?php echo $row['email'] ;?></td>
<td><?php echo $row['hobbies'] ;?></td>
<td><?php echo $row['gender'] ;?></td>
<td><?php echo $row['join_date'] ;?></td>
<td><?php echo $row['department'] ;?></td>
<td><?php if($row['image']!=''){?>
 <img src="employee_images/<?php echo $row['image']?>" width="50px" hight="50px;"><?php } ?></td>
 
<td>  <a class="btn btn-primary" href="javascript:;" onclick="editDetails(<?php echo $row['id'];?>)">Edit</a><br><br>
 <a class="btn btn-success"href="javascript:;" onclick="deleteDetails(<?php echo $row['id'];?>)">Delete</a></td>

<?php $sn++;} ?>
 
