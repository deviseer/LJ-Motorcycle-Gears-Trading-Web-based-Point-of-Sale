<?php include('../includes/db_con.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['add'])){
		$user = $_SESSION['username'];
		$username = mysqli_real_escape_string($db, $_POST['username']);
	  	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname   = mysqli_real_escape_string($db, $_POST['lastname']);
	  	$number   	= mysqli_real_escape_string($db, $_POST['number']);
		$address   	= mysqli_real_escape_string($db, $_POST['address']);
	  	$position  	= mysqli_real_escape_string($db, $_POST['position']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
		$target   	= "../assets/images/".basename($_FILES['image']['name']);
	  	$image    	= $_FILES['image']['name'];

		$query = "SELECT username FROM employees WHERE username='$username'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1){
		  array_push($error, "Username already taken");
		}
		if ($password != $password1){
		  array_push($error, "The Password did not match"); 
		}

		if (count($error) == 0){
			$password = ($password1);
			$sql  = "INSERT INTO employees (username,first_name,last_name,position,address,mobile_phone,password,image) VALUES ('$username','$firstname','$lastname','$position','$address','$number','$password','$image')";
	  		$result = mysqli_query($db, $sql);
	  		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
				$msg = "Image successfully uploaded!";
				$insert	= "INSERT INTO logs (username,purpose) VALUES('$user','User $firstname added')";
 				$logs = mysqli_query($db,$insert);
				header('location: ../user/user.php?added');
	  		}else{
				$msg = "There was a problem uploading the image!";
	  		}
		}
	}
