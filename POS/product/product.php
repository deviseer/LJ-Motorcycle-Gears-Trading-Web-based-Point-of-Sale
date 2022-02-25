<?php 
	include("../includes/db_con.php");
	include '../set.php';
	$sql = "SELECT * FROM products";
	$result	= mysqli_query($db, $sql);
	$deleted = isset($_GET['deleted']);
	$added  = isset($_GET['added']);
	$updated = isset($_GET['updated']);
	$undelete = isset($_GET['undelete']);
	$error = isset($_GET['error']);
	$failure = "";	
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">

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

    <body >
    <!-- Navbar Header -->
    <?php include('base.php');?>
            <!-- start main Content here -->
            <main class=" mt-5 pt-3">
                <div class="container-fluid custom-container ">
                    <div class="row">
                        <div class="col fw-bold fs-3 text-dark">
                        Products
                        <hr class="dropdown-divider" style="height:3px;">
                        </div>
                        <?php include('../alert.php');?>
                    </div>
                    <div class="card bg-light">
                        <div class="card-body">
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button"> Add</button>
                            <button class="btn btn-success" type="button"> Print</button>
                        </div>
                        <div class="table-responsive mt-3">
                            <table id="product_data" class="display table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" class="column-text">Barcode</th>
                                        <th scope="col" class="column-text">Product Name</th>
                                        <th scope="col" class="column-text">Category</th>
                                        <th scope="col" class="column-text">Description</th>
                                        <th scope="col" class="column-text">Size</th>
                                        <th scope="col" class="column-text">Price</th>
                                        <th scope="col" class="column-text">Stocks</th>
                                        <th scope="col" class="column-text">Action</th>
                                    </tr>
                    </thead>
                            <tbody class="table-hover">
                                    <?php 
                                        while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr class="table-active">
                                        <td><?php echo $row['product_code'];?></td>
                                        <td><?php echo $row['product_name'];?></td>
                                        <td><?php echo $row['category_id'];?></td>
                                        <td><?php echo $row['description'];?></td>
                                        <td><?php echo $row['product_size'];?></td>
                                        <td>₱<?php echo $row['list_price'];?></td>
                                        <td><?php echo $row['on_hand'];?></td>
                                        <td>
                                            <a name="edit" title="Edit" href="update_products.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" name="view"  id="<?php echo $row['id'];?>" class="btn btn-success btn-xs view_data"><i class="bi bi-eye"></i></button>
                                            <button type="button" name="delete" title="Delete" data-id="<?php echo $row['id'];?>" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                </div>
            </main>
            <!-- Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
            <script type="text/javascript" src="../time.js"></script>
            <script type="text/javascript" src="product.js"></script>
            <?php include('delete_products.php');?>
            <script>
	     $(document).ready(function() {
                $('#product_data').DataTable( {
                    scrollY:        '35vh',
                    scrollCollapse: true,
                    paging:        false,
                } );
            } );
            </script>
    </body>
    </html>
    <div id="dataModal" class="modal fade bd-example-modal-md" data-bs-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog modal-md"  role="document">  
		<div class="modal-content">   
		<div class="modal-body d-inline" id="Contact_Details"></div> 
			<div class="modal-footer"> 
				<input type="button" class="btn btn-default btn-success" data-bs-dismiss="modal" value="Okay">   
			</div>  
	   </div>  
	</div>  
</div>

   