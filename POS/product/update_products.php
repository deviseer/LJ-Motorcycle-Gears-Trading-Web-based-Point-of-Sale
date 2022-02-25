<?php 
	include("../includes/db_con.php");
	include '../set.php';

	if (isset($_GET['id'])){
		$id   =   $_GET['id'];
		$sql  =   "SELECT * FROM products WHERE id='$id'";
		$result1   = mysqli_query($db, $sql);
		$row1  =   mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
	 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/typeahead.js-bootstrap-css/1.2.1/typeaheadjs.min.css'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>

		<link rel="stylesheet" href="product.css">
        <title>Products</title>
</head>
<body>
	  <!-- Navbar Header -->
	  <?php include('base.php');?>
            <!-- start main Content here -->
<main class=" mt-5 pt-3">
                <div class="container-fluid custom-container">
                <p class="bg-danger w-50"><?php echo $msg; ?></p>
                    <div class="row">
                        <div class="col fw-bold fs-3 text-dark">
                        Products
                        <hr class="dropdown-divider" style="height:3px;">
                        </div>
                    </div>
                    <div class="container  mt-3">
                    <div class="card text-dark bg-light">
                     <div class="card-body">
                
                    <div class="row">
                            <div class="col-md-4 mt-4">
                            <div style="border:1px dashed black; width: 260px;height: 260px;">
							<?php echo "<img class='img-fluid p-2 h-100 w-100' src='../assets/images/".$row1['image']."'>"; ?>
                            </div>
                            </div>
                            <div class="col-md-8 ">
							<form method="post" enctype="multipart/form-data" action="../product/update.php">
								<input type="hidden" name="size" value="1000000">
								<input type="hidden" name="id" value="<?php echo $row1['id'];?>">

                                            <table>
                                                                <tbody>
                                                                    <tr>
																	<td  valign="baseline">Name:</td>
                                                                        <td class="pl-5 pb-2"><div class="input-group" style="padding-left:20px;"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"></span></div><input  name="product_name" value="<?php echo $row1['product_name'];?>" class="form-control form-control-sm" required></div></td>
                                                                    </tr>
                                                                    <tr>
																	<td  valign="baseline">Category: </td>
                                                                        <td class="pl-5 pb-2 ">
                                                                            <div class="input-group" style="padding-left:20px;"><div class="input-group-prepend" ><span class="input-group-text" id="basic-addon1">
                                                                            </span></div>
                                                                            <select name="category" class="form-control form-control-sm">
                                                                                <option value="<?php echo $row1['category_id'];?>"><?php echo $row1['category_id'];?></option>
                                                                                <option value="helmet">Helmet</option>
                                                                                <option value="spray">Spray</option>
    
                                                                            </select></div>
                                                                        </td>
																	</tr>
                                                                    <tr>
                                                                        <td  valign="baseline">Description:</td>
                                                                        <td class="pl-5 pb-2"><div class="input-group" style="padding-left:20px;"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"></span></div><input type="text" name="description" value="<?php echo $row1['description'];?>" class="form-control form-control-sm"></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td  valign="baseline">Size:</td>
                                                                        <td class="pl-5 pb-2"><div class="input-group" style="padding-left:20px;"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"></span></div><input  name="size" value="<?php echo $row1['product_size'];?>" class="form-control form-control-sm" required></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td  valign="baseline">Price:</td>
                                                                        <td class="pl-5 pb-2"><div class="input-group" style="padding-left:20px;"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"></i></span></div><input type="number" name="price"  value="<?php echo $row1['list_price'];?>" class="form-control form-control-sm" required></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                    	<td  valign="baseline">On-hand:</td>
                                                                        <td class="pl-5 pb-2"><div class="input-group" style="padding-left:20px;"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"></i></span></div><input type="number" name="onhand"  value="<?php echo $row1['on_hand'];?>" class="form-control form-control-sm" required></div></td>
                                                                    
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Change Photo:</td>
                                                                        <td><input class="form-control-sm " type="file" name="image" style="padding-left:25px;"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="text-left mt-4">
                                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                                <input type="hidden" name="user" value="<?php echo $row['username'];?>">
                                                                <button type="submit" name="update" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Update</button>
                                                                <button type="button" class="btn btn-danger" onclick="window.location.href='product.php'" ><i class="bi bi-x-circle"></i> Cancel</button>
                                                            <?php } ?>
                                                            </div>
                                                </div>
                                                </form>
                                                </div>
                        </div>
                            </div>
                            </div>
                            </div>
                        </div>
            </main>
			 <!-- Bootstrap Bundle with Popper -->
			 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script type="text/javascript" src="time.js"></script>

            <script>
                $(function () {
                    $('[data-toggle="popover"]').popover()
            })
            </script>
</body>
</html>



