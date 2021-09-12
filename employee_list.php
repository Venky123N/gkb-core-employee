<html>
<head>
<title>Employee Details</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
</head>
<body>
<div style="text-align:center;">

<?php if(isset($_GET['addsuccess'])){?>
<span style="color:red">Added Successfully</span>
<?php } 
 
  if(isset($_GET['updateSuccess'])){?>
   <span style="color:red">Updated Successfully</span>
   <?php }
   

if(isset($_GET['deleteSuccess'])){?>
<span style="color:red">Deleted Successfully</span>
<?php } 

$conn = mysqli_connect("localhost", "root", "", "employee_data");
// Attempt insert query execution
$sql = "select * from employee";  
        $result = mysqli_query($conn, $sql);  
	  
    ?>
</div>


<div class="container" style="margin: top 35px;">

<h1>Employee Details <a href="employee_reg.php"><button class="btn btn-success">Add Employee</button></a> <a href="employee_csv.php"><button class="btn btn-success">CSV Employee</button></a></h1>
<div class="col-md-12">
  <div class="col-md-3">
<div class="form-group mb-3">
              <label for="join_date">Joining Date</label>
              <input type="date" name="search_join_date" class="form-control" id="search_join_date" />
          </div> 
</div>
<div class="col-md-3">
          <div class="from-group" >
                <label for="">Department  :</label>
                 <select name="search_department" class="form-control" id="search_department">
                 <option value="">--Select Department  --</option>
                 <option value="Hr">Hr</option>
                 <option value="Admin">Admin</option>
                 <option value="Marketing">Marketing</option>
                 <option value="Production">Production</option>
             </select>
           </div>
</div>
<div class="col-md-3" style="margin-top:25px;">
  <button onclick="generatEmployeedDetails();" class="btn btn-danger">Generate</button>
</div>
</div>
<table id="mytable" class="table table-bordered table-striped">
<thead>
<tr>
<th>S.No</th>
<th>FirstName</th>
<th>LastName</th>
<th>email</th>
<th>Hobbies</th>
<th>Gender</th>
<th>Join-Date</th>
<th>Department</th>
<th>image</th>
<th>Edit/Delete</th>
</tr>
</thead>
<tbody id="employee_resp">
<?php
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


</tr>
</tbody>
</table>
    
</div>

<div class="modal fade text-xs-left" id="editEmployeeDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
   <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span>
	</button>
	<h3 class="modal-title" id="myModalLabel354">Edit Details</h3>
	</div>
<form class="form-horizontal" method="post"  id="employeeId" enctype="multipart/form-data" >
      
	<div class="form-body">
	 <div class="col-md-12"> 
   <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control"  id="first_name" placeholder="First Name">
               <span id="firstNameError" style="display:none;color: red;"> FirstName Required</span>
         </div>
     </div>
	 <div class="col-md-12"> 
	 <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control"  id="last_name" placeholder="Last Name">
               <span id="lastNameError" style="display:none;color: red;"> LastName Required</span>
         </div> 
     </div>

      <div class="col-md-12"> 
      <div class="form-group">
              <label for="email">E-MAIL</label>
              <input type="email" name="email" class="form-control"  id="email" placeholder="E-MAIL">
               <span id="emailError" style="display:none;color: red;"> E-mail Required</span>
         </div>
     </div>
     <div class="col-md-12"> 
     <div class="from-group ">
              <label for="">Hobbies:</label> <br>
             <input type="checkbox" name="hobbies" id="tv" value="Tv"/>Tv <br>
             <input type="checkbox" name="hobbies" id="read" value="Reading"/>Reading <br>
             <input type="checkbox" name="hobbies" id="code" value="Coding"/>Coding <br>
             <input type="checkbox" name="hobbies" id="sky" value="Skiing"/>Skiing <br>
         </div>
     </div>
     <div class="col-md-12"> 
     <div class="from-group ">
             <label for="">Gender:</label>
             <input type="radio" name="gender" id="male" value="male"/>Male
             <input type="radio" name="gender" id="female" value="female"/>FeMale
         </div>
</div>
<div class="col-md-12"> 
         <div class="form-group">
              <label for="join_date">Joinng-date</label>
              <input type="date" name="join_date" class="form-control" id="join_date" />
          </div> 
</div>
<div class="col-md-12"> 
          <div class="from-group" >
                <label for="">Select Department  :</label>
                 <select name="department" class="form-control" id="department">
                 <option value="">--Select Department  --</option>
                 <option value="Hr">Hr</option>
                 <option value="Admin">Admin</option>
                 <option value="Marketing">Marketing</option>
                 <option value="Production">Production</option>
             </select>
           </div>
</div>
<div class="col-md-12"> 

          <div class="form-group">
                <label for="employee_photo">Employee_Photo:</label>
                <input type="file" name="employee_photo" id="employee_photo" class="form-control">
        <div id="oldImage"></div>        
         </div>
</div>
 <input type="hidden" id="id" name="id"> 
 </div>
	<div class="modal-footer">
		
  <input type="submit" name="submit" value="Update Employee" class="btn btn-info">
	</div>
	</form>
	</div>
	</div>	
   </div>
<!----------- table pagination-------------------------->
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#mytable').DataTable({
      "pagingType":"full_numbers",
      "lengthMenu":[
        [10, 25, 50, -1],
         [10,25,50, "All"]
      ],
      responsive: true,
      language:{
        search:"_INPUT_",
        searchPlaceholder:"search records",
      }
    });
});
</script>


</body>
</html>

<script>
   function deleteDetails(id)
{ 
     
  if(confirm("Are you sure want to delete the Employee details??"))
  {
     window.location.href='employee_delete.php?id='+id;
  }
}

function editDetails(id){
  $.ajax({
      url: 'editDetails.php', 
      type: "POST",             
      data:{
      	id:id,
      },        
     success:function(resp)
       {
        var obj=$.parseJSON(resp);
        $("#first_name").val(obj[0].first_name);
        $("#last_name").val(obj[0].last_name);
        $("#id").val(obj[0].id);
        $("#email").val(obj[0].email);
        $("#join_date").val(obj[0].join_date);
        $("#department").val(obj[0].department);
        $("#tv").prop("checked", false);
        $("#read").prop("checked", false);
        $("#code").prop("checked", false);
        $("#sky").prop("checked", false);
        $("#male").prop("checked", false);
        $("#female").prop("checked", false);
        if(obj[0].hobbies=='Tv'){
          $("#tv").prop("checked", true);
        }
        if(obj[0].hobbies=='Reading'){
          $("#read").prop("checked", true);
        }
        if(obj[0].hobbies=='Coding'){
          $("#code").prop("checked", true);
        }
        if(obj[0].hobbies=='Skiing'){
          $("#sky").prop("checked", true);
        }
        if(obj[0].gender=='male'){
          $("#male").prop("checked", true);
        }
        if(obj[0].gender=='female'){
          $("#female").prop("checked", true);
        }
       
        $('#oldImage').html('');
        $('#oldImage').append('<div class="col-md-12"><img src="employee_images/'+obj[0].image+'" width="100px;" height="100px;"></div>');
        $('#editEmployeeDetails').modal('show');
       }
     });

 
}
$("#employeeId").on('submit',(function(e){
          e.preventDefault();
          var first_name=$('#first_name').val();
          var last_name=$('#last_name').val();
          var email=$('#email').val();

          $('#firstNameError').hide();
          $('#lastNameError').hide();
          $('#emailError').hide();
          
          ;
          var flag="true";
          if(first_name=='')
          {
            $('#firstNameError').show();
            flag=false;
          }
          if(last_name=='')
          {
            $('#lastNameError').show();
            flag=false;
          }
          if(email=='')
          {
            $('#emailError').show();
            flag=false;
          }
          
          
          if(flag==false)
          {
            return false;
          }else
          {
            $.ajax({
              url:'employee_updata.php',
              type:'POST',
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              success:function(resp)
              {
               alert('Successfully Updated.');
             window.location.href='employee_list.php';
              }

            });
          }
    }));
 function generatEmployeedDetails(){
var search_join_date=$('#search_join_date').val();
var search_department=$('#search_department').val();
$.ajax({
      url: 'generatEmployeedDetails.php', 
      type: "POST",             
      data:{
      	join_date:search_join_date,
        department:search_department
      },        
     success:function(resp)
       {
        $("#mytable").dataTable().fnDestroy(); 
          $('#employee_resp').html('');
          $('#employee_resp').append(resp);
          $('#mytable').DataTable({
                     });
       }
});
 }   
</script>
