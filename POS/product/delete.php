<?php include('../includes/db_con.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
        $user = $_SESSION['username'];
		$query = "DELETE FROM products WHERE id = $id"; 
    	$result = mysqli_query($db, $query);
    	if($result==true){
    		$logs	= "INSERT INTO logs (username,purpose) VALUES('$user','Product deleted')";
    		$insert = mysqli_query($db,$logs);
    		header("location: product.php?deleted");
    	}else{
            echo $id;
			header("location: product.php?undelete");
    	}
    }	