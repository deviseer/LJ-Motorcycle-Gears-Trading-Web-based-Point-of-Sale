<?php include('../includes/db_con.php');

	if(isset($_POST["id"])){  
		$output = '';  
	  	$query = "SELECT * FROM employees WHERE id = '".$_POST["id"]."'";  
	  	$result = mysqli_query($db, $query);  

	  	while($row = mysqli_fetch_array($result)){
			echo "<div class='d-flex justify-content-center  mt-2 mb-3'>";
			echo "<img width='160' height='160' style='border:1px; border-radius:2px' src='../assets/images/".$row['image']."'>";
			echo "</div>";
			$output .= '  
	  			<div class="table-responsive d-flex justify-content-center">  
		   		<table class="w-75">';   
		   	$output .= '
		   		<tr>  
					 <td width="50%"><label>Name :</label></td>  
					 <td width="50%"><strong>'.$row["first_name"].'&nbsp'.$row['last_name'].'</strong></td>  
				</tr>
				<tr>  
					 <td width="50%"><label>Phone Number :</label></td>  
					 <td width="50%"><strong>'.$row["mobile_phone"].'</strong></td>  
				</tr>
				<tr>  
					 <td width="50%"><label>Address :</label></td>  
					 <td width="50%"><strong>'.$row["address"].'</strong></td>  
				</tr>
				<tr>
					<td width="50%"><label>Position :</label></td>  
					<td width="50%"><strong>'.$row["position"].'</strong></td> 
				</tr>';  
	  }  
	  $output .= '  
		   </table>  
	  		</div>  
	  ';
	  echo $output;  
 	}  
?>
 