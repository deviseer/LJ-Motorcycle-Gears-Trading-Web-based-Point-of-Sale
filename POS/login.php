<?php 
include('includes/db_con.php');
$error		= array();

if (isset($_POST['login'])){
	$password	= mysqli_real_escape_string($db, $_POST['password']);
	$position	= mysqli_real_escape_string($db, $_POST['position']); 
	$username 	= mysqli_real_escape_string($db, $_POST['username']);
	


	if($username != '' AND $password != '' AND $position != ''){
		$query 		= "SELECT * FROM employees WHERE username = '$username' AND position = '$position' AND password = '$password'";
		
		$result 	= mysqli_query($db, $query);

		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)) {

				$_SESSION['username'] = $row['username'];
				$user = $_SESSION['username'];
				$insert	= "INSERT INTO logs (username,purpose) VALUES('$user','User $user login')";
 				$logs = mysqli_query($db,$insert);
				header('location: cashier_page.php');
			}
		}else{
			array_push($error, "Wrong username/password!");	
		}

	}else{

		$query 		= "SELECT * FROM employees WHERE position = '$position' AND password = '$password'";
		$result 	= mysqli_query($db, $query);

		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION['username'] = $row['username'];
				$user = $_SESSION['username'];
				$insert	= "INSERT INTO logs (username,purpose) VALUES('$user','User $user login')";
 				$logs = mysqli_query($db,$insert);
				header('location: admin_page.php');
			}
		}else{
			array_push($error, "Wrong username/password!");	
		}
	}
}