<?php include('./includes/db_con.php'); ?>
<?php include('login.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<title>Log in</title>

  </head>
  <body>
  <div class="text-center">
		<div class="main">
		<img src="./assets/images/lj pos system (2).png" class="img-fluid" alt="POS" width=400px height= 400px>
		<?php include('error.php');?>
	</div>
		<div class="fixed-bottom ">
			<div class="d-grid gap-2 d-md-block mb-5">
			<button type="button" id="admin"  class="btn-lg btn-secondary ms-3" data-bs-toggle="modal" data-bs-target="#modal-admin"><i class="fas fa-user-tie"></i> Admin</button>
			<button type="button" id="cashier" class="btn-lg btn-secondary ms-3" data-bs-toggle="modal" data-bs-target="#modal-cashier"><i class="fas fa-user-friends"></i></i> Cashier</button>
			<button type="button" id="staff" class="btn-lg btn-secondary ms-3" data-bs-toggle="modal" data-bs-target="#modal-staff"><i class="fas fa-user"></i> Staff</button>
			</div>
		</div>
	</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<?php include('modals/admin_login_modal.php');?>
	<?php include('modals/cashier_login_modal.php');?>
	<?php include('modals/staff_login_modal.php');?>
<!-- Bootstrap CSS -->
</body>
</html>
