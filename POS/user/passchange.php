<?php 

$error		= array();
$alert 		= array();

if (isset($_POST['changepass'])){
	$username 	= $_SESSION['username'];
	$newpass 	= mysqli_real_escape_string($db, $_POST['newpass']);
	$confirmpass	= (mysqli_real_escape_string($db, $_POST['confirmpass']));
	
	$query 		= "SELECT * FROM employees WHERE username = '$username'";
	$result 	= mysqli_query($db, $query);
	$row 		= mysqli_fetch_array($result);

	if ($newpass != $confirmpass){
		array_push($error, "The Password did not match!"); 
	}
	if (($confirmpass) == $row['password'] AND ($confirmpass) == $row['password']){
		array_push($error, "The Password is still the same!");
	}

	if (count($error) == 0){
		$newpass = ($confirmpass);
		$sql  = "UPDATE employees SET password='$newpass' WHERE username = '$username'";
		$update = mysqli_query($db ,$sql);
		array_push($alert, "Password Successfully Changed!");
	}else{

	}
}
