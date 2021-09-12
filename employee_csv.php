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
<form  id="csvFileId"  method="post"  enctype="multipart/form-data">

<div class="col-md-12">
    <div class="col-md-3">
    <div class="form-group">
                <label for="employee_photo">CSV File</label>
                <input type="file" name="csv_employee" id="csv_employee" class="form-control">
         </div>
</div>

<div class="col-md-4" style="margin-top:30px">
 <input type="submit"  class="btn btn-danger" value="Upload File">
 </div>

</div>
<div id="csvFileData"></div>
</form>
<script>
   $("#csvFileId").on('submit',(function(e) { 
            e.preventDefault();
    $.ajax({
					url: "employee_csv_data.php", 
					type: "POST",             
					data: new FormData(this), 
					contentType: false,       
					cache: false,        
					processData:false,        
					success: function(resp)  
					{
                        $('#csvFileData').html('');
                            $('#csvFileData').append(resp);
					
                   }
                });
    }));
    </script>
</body>
</html>