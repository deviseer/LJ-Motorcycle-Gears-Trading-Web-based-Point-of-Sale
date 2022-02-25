<?php
	include("../includes/db_con.php");
	$msg 		= '';
  	if(isset($_POST['update'])){
		$target   	= "../assets/images/".basename($_FILES['image']['name']);
	  	$image    	= $_FILES['image']['name'];
	  	$id       	= mysqli_real_escape_string($db, $_POST['id']);
	  	$user 		= mysqli_real_escape_string($db, $_POST['username']);	
	  	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
	  	$lastname   = mysqli_real_escape_string($db, $_POST['lastname']);
	  	$number   	= mysqli_real_escape_string($db, $_POST['number']);
		$address   	= mysqli_real_escape_string($db, $_POST['address']);
	  	$position  	= mysqli_real_escape_string($db, $_POST['position']);
	  	$username 	= mysqli_real_escape_string($db, $_SESSION['user']);

		if (!empty($image)){
		  	$sql  = "UPDATE employees SET first_name='$firstname',last_name='$lastname',position='$position',mobile_phone='$number',address='$address',image='$image' WHERE id = '$id'";
		  	$check= mysqli_query($db, $sql);
		  	if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $check == true){
		  		$logs	= "INSERT INTO logs (username,purpose) VALUES('$username','User $firstname updated')";
 				$insert = mysqli_query($db,$logs);
 				echo $sql;
 				header('location: user.php?updated');
 			}else{
 				header('location: user.php?error');
 			}
		}else{
		  	$sql  = "UPDATE employees SET first_name='$firstname',last_name='$lastname',position='$position',mobile_phone='$number',address='$address' WHERE id = '$id'";
		  	mysqli_query($db, $sql);
		  	$logs 	= "INSERT INTO logs (username,purpose) VALUES('$username','User $firstname updated')";
 			$insert = mysqli_query($db,$logs);
 			echo $sql;
 			header('location: user.php?updated');			
 		}
	}