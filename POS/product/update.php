<?php
	include("../includes/db_con.php");
	$msg 		= '';
  	if(isset($_POST['update'])){
		$target   	= "../assets/images/".basename($_FILES['image']['name']);
	  	$image    	= $_FILES['image']['name'];
	  	$id       	= $_POST['id'];
	  	$pro_name 	= mysqli_real_escape_string($db, $_POST['productname']);	
	  	$price 	 	= mysqli_real_escape_string($db, $_POST['price']);
	  	$category 	= mysqli_real_escape_string($db, $_POST['category']);
	  	$description = mysqli_real_escape_string($db, $_POST['description']);
	  	$size  = mysqli_real_escape_string($db, $_POST['size']);
	  	$on_hand 	= mysqli_real_escape_string($db, $_POST['onhand']);
	  	$username	= $_SESSION['username'];

		if (!empty($image)){
		  	$sql  = "UPDATE products SET product_name='$pro_name', list_price=$price, category_id='$category',description='$description',product_size='$size', images='$image' WHERE id = '$id'";
		  	mysqli_query($db, $sql);
		  	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		  		$sql 	= "INSERT INTO logs (username,purpose) VALUES('$username','Product $pro_name updated')";
 				$insert = mysqli_query($db,$sql);
 				header('location: ../product/product.php?updated');
 			}
		}else{
			$sql  = "UPDATE products SET product_name='$pro_name',list_price='$price',category_id='$category',description='$description',product_size='$size' WHERE id = '$id'";
		  	$result = mysqli_query($db, $sql);
 			if($result == true){
 				$query 	= "INSERT INTO logs (username,purpose) VALUES('$username','Product $pro_name updated')";
 				mysqli_query($db,$query);
 				echo $sql;
 	 			header('location: ../product/product.php?updated');
 			}
 		}
 	}