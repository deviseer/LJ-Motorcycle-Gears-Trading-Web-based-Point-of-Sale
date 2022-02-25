<?php include('../includes/db_con.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
        $user = $_SESSION['username'];
		$query = "DELETE FROM employees WHERE id = '$id'"; 
    	$result = mysqli_query($db, $query);
    	if($result == true){
    		$insert 	= "INSERT INTO logs (username,purpose) VALUES('$user','User Deleted')";
 			mysqli_query($db,$insert);
			header("location: user.php?deleted");
    	}else{
    		header("location: user.php?undelete");
    	}
    }