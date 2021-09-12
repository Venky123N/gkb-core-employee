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
                </tr>
                </thead>
                <tbody id="employee_resp">    
<?php $custom_num='';
	$customerary=array();
			
				$path='employee_images/';
			  $file= basename($_FILES['csv_employee']['name']);
			  list($txt, $ext) = explode(".", $file);
				$actual_file_name = time().substr($txt, 5).".".$ext;
				 $insert_batch=array();
				if(move_uploaded_file($_FILES['csv_employee']['tmp_name'],$path.$actual_file_name))
				{
					$i= 0;
					$m=0;
					$k='';
							if (($handle = fopen($path.$actual_file_name, "r")) !== FALSE) 
							{	
											
								while (($data = fgetcsv($handle,100000, ",")) !== FALSE) 
									{	if ($i == 0) 
										{ 
												$i++;
												continue; 
										}
                                        ?>
 <tr>
    <td><?php echo $i ;?></td>
    <td><?php echo mb_check_encoding($data[0], 'UTF-8') ? $data[0] : utf8_encode($data[0]);?></td>
    <td><?php echo mb_check_encoding($data[1], 'UTF-8') ? $data[1] : utf8_encode($data[1]);?></td>
    <td><?php echo mb_check_encoding($data[2], 'UTF-8') ? $data[2] : utf8_encode($data[2]);?></td>
    <td><?php echo mb_check_encoding($data[3], 'UTF-8') ? $data[3] : utf8_encode($data[3])?></td>
    <td><?php echo mb_check_encoding($data[4], 'UTF-8') ? $data[4] : utf8_encode($data[4]);?></td>
    <td><?php echo  mb_check_encoding($data[5], 'UTF-8') ? $data[5] : utf8_encode($data[5]);?></td>
    <td><?php echo mb_check_encoding($data[6], 'UTF-8') ? $data[6] : utf8_encode($data[6]);?></td>
				<?php		$i++;
							} 
						fclose($handle);

							}		
				}
                unlink($path.$actual_file_name);?>

     

    </tbody>
    </table>    

    

								