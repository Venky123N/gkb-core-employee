<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php if(isset($_GET['success'])){?>
<span style="color:red">Registration completed Successfully</span>
<?php }?>
<?php if(isset($_GET['error'])){?>
<span style="color:red">Please check details</span>
<?php }?>

<div class="container" >
  <div class="row col-md-6 col-md-offset-3">
    <div class="panel panel-success">
      <div class="panel-heading text-center">
           <h1>Employee Registration</h1>
       </div>
        <div class="panel-body">
       <form  method="post" enctype="multipart/form-data"   id="employeeId">
         <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control"  id="first_name" placeholder="First Name">
               <span id="firstNameError" style="display:none;color: red;"> FirstName Required</span>
         </div>

         <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control"  id="last_name" placeholder="Last Name">
               <span id="lastNameError" style="display:none;color: red;"> LastName Required</span>
         </div> 

         <div class="form-group">
              <label for="email">E-MAIL</label>
              <input type="email" name="email" class="form-control"  id="email" placeholder="E-MAIL">
               <span id="emailError" style="display:none;color: red;"> E-mail Required</span>
         </div>
        
         <div class="from-group ">
              <label for="">Hobbies:</label> <br>
             <input type="checkbox" name="hobbies" value="Tv"/>Tv <br>
             <input type="checkbox" name="hobbies" value="Reading"/>Reading <br>
             <input type="checkbox" name="hobbies" value="Coding"/>Coding <br>
             <input type="checkbox" name="hobbies" value="Skiing"/>Skiing <br>
         </div>
    
          <div class="from-group ">
             <label for="">Gender:</label>
             <input type="radio" name="gender" value="male"/>Male
             <input type="radio" name="gender" value="female"/>FeMale
         </div>

         <div class="form-group mb-3">
              <label for="join_date">Joinng-date</label>
              <input type="date" name="join_date" class="form-control" />
          </div> 

          <div class="from-group" >
                <label for="">Select Department  :</label>
                 <select name="department" class="form-control">
                 <option value="">--Select Department  --</option>
                 <option value="Hr">Hr</option>
                 <option value="Admin">Admin</option>
                 <option value="Marketing">Marketing</option>
                 <option value="Production">Production</option>
             </select>
           </div>
        

          <div class="form-group">
                <label for="employee_photo">Employee_Photo:</label>
                <input type="file" name="employee_photo" id="employee_photo" class="form-control">
         </div>
            <input type="submit" name="submit" value="Add Employee" class="btn btn-info"><br>
            
  </form>
 </div>
      <div class="panel-footer text-right">
        <small>&copy;venkatesh.m</small>
      </div>
   </div>
  </div>
</div>



<script>
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
              url:'employee_data.php',
              type:'POST',
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
              success:function(resp)
              {
               alert('Successfully added.');
               window.location.href='employee_list.php';
              }

            });
          }
    }));
  </script>
</body>
</html>
