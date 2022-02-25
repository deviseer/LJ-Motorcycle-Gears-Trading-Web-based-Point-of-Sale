<?php 
	include("../includes/db_con.php");
    include('passchange.php');
    include('add.php');
	include '../set.php';

	$sql = "SELECT * FROM employees ORDER BY first_name ASC ";
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
        <link rel="stylesheet" href="user_management.css">
        <title>User Management</title>
    </head>

    <body >
    <!-- Navbar Header -->
    <?php include('base.php');?>
            <!-- start main Content here -->
            <main class=" mt-5 pt-3">
                <div class="container-fluid custom-container ">
                    <div class="row">
                        <div class="col fw-bold fs-3 text-dark">
                        User Management
                        <hr class="dropdown-divider" style="height:3px;">
                        </div>
                        <?php include('../alert.php');?>
                    </div>
                    <!-- navs and tabs -->
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">User list</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Add User</button>
                        </li>
                    </ul>
                        <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active bg-light" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- userlist -->
                            <div class="table-responsive mt-3">
                            <table id="userdata" class="display table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Contact number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php 
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <tr class="table-active">
                                    <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['first_name'];echo '&nbsp';echo $row['last_name'];?></td>
                                    <td><?php echo $row['position'];?></td>
                                    <td><?php echo $row['mobile_phone'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                        <td>
                                            <a name="edit" title="Edit" href="edit_user.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" name="view"  id="<?php echo $row['id'];?>" class="btn btn-success btn-xs view_data"><i class="bi bi-eye"></i></button>
                                            <button type="button" name="delete" title="Delete" data-id="<?php echo $row['id'];?>" class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php include('view_user.php');?>
                            </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       <?php
                        if(isset($_SESSION['username'])){
                            $username = $_SESSION['username'];
                            $sql = "SELECT * FROM employees WHERE username = '$username'";
                            $result = mysqli_query($db ,$sql);
                            $row = mysqli_fetch_array($result);
                            ?>

                            <div class="container mt-3">
                                <div class="card">
                                <div class="card-body">
                                    <div class="row mt-3 ">
                                      <div class="col-md-4">
                                        <div style="border:1px dashed black; width: 260px;height: 260px;">
                                            <?php echo "<img class='img-fluid p-2 h-100 w-100' src='../assets/images/".$row['image']."'>";?>
                                        </div>
                                      </div>
                                      <div class="col-md-8 ">
                                      <form class="row mt-3" method="post" enctype="multip+ ':' + seconds + ' ' art/form-data">
                                      <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Name: </label>
                                            <div class="col-sm-4 mt-2 bold">
                                            <?php echo "<h6>".$row['first_name']."&nbsp".$row['last_name']."</h6>"; ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Phone Number: </label>
                                            <div class="col-sm-4 mt-2 bold">
                                            <?php echo $row['mobile_phone'];?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="staticEmail" class="col-sm-3 col-form-label">Address: </label>
                                            <div class="col-sm-4 mt-2 bold">
                                            <?php echo $row['address'];?>
                                            </div>
                                        </div>
                                        <div class="text-left mt-3">
                                            <a title="Edit" href="../user/update_profile.php?id=<?php echo $row['id'];?>" class="btn btn-primary"><i class="bi bi-person-check"></i> Edit </a>
                                            <button type="button" id="user" title="Change Password?" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-user"><i class="bi bi-pencil-square"></i> Change Password</button>

                                        </div>
                                    </form>
                                    </div>

                                    </div>

                                </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- ADD USER -->
                        <div class="container mt-3">
                                <div class="card text-dark bg-light">
                                <div class="card-body">
                                    <div class="row  ">
                                    <form class="row " method="post"  enctype="multipart/form-data">
                                      <div class="col-sm-4">
                                      <div style="border:1px dashed black; width: 250px;height: 250px;">
                                            <img class="img-fluid p-2 h-100 w-100 " src="../assets/images/user.png">
                                            <input class="form-control-sm mt-2 mb-2" type="file" name="image" required>
                                        </div>
                                      </div>
                                      <div class="col-md-8 ">
                                      <div class="mb-1 row">
                                            <label for="username" class="col-sm-4 col-form-label">Username: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span></div><input type="text" name="username" pattern="[a-z0-9]{1,15}" title="Username should contain lowercase or letters. e.g. john12" class="form-control form-control-sm" placeholder="Enter Username" required></div>
                                        </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="firstname" class="col-sm-4 col-form-label">Firstname: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil"></i></span></div><input type="text" name="firstname" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces. e.g John12" placeholder="Enter Firstname"  class="form-control form-control-sm" required></div>
                                        </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="lastname" class="col-sm-4 col-form-label">Lastname: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-pencil"></i></span></div><input type="text" name="lastname" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces. e.g John12" placeholder="Enter Lastname"  class="form-control form-control-sm" required></div>
                                        </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="number" class="col-sm-4 col-form-label">Phone number: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span></div><input type="tel" pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)'  name="number"  placeholder="Enter Contact Number" class="form-control form-control-sm" required></div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="address" class="col-sm-4 col-form-label">Address: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt"></i></span></div><input type="text" name="address" pattern="[A-Za-z]+" title="Address must not contain numbers or spaces. e.g John12" placeholder="Enter Address"  class="form-control form-control-sm" required></div>
                                        </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="password" class="col-sm-4 col-form-label">Password: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span></div><input type="password" name="password" class="form-control form-control-sm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password-field" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" minlength="8" required> <span toggle="#password-field" class="bi bi-sm bi-eye field-icon toggle-password"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="password1" class="col-sm-4 col-form-label">Confirm Password: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend" ><span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span></div><input type="password" name="password1" minlength="8" id="password-field1" class="form-control form-control-sm" placeholder="Confirm Password" required><span toggle="#password-field1" class="bi bi-sm bi-eye field-icon toggle-password"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-1 row">
                                            <label for="position" class="col-sm-4 col-form-label">Position: </label>
                                            <div class="col-sm-6">
                                            <div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-person-bounding-box"></i></span></div>
                                                <select name="position" class="form-control-sm form-control" required>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Cashier">Cashier</option>
                                                    <option value="Staff">Staff</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-left mt-4">
                                            <button type="submit" name="add" class="btn btn-secondary"><i class="bi bi-check-circle"></i> Submit</button>
                                            <button class="btn btn-danger" onclick="window.location.href='../user/user.php'" ><i class="bi bi-slash-circle"></i> Cancel</button>
                                        </div>
                                    </form>
                                    </div>

                                    </div>

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

            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
            <script type="text/javascript" src="time.js"></script>
            <script type="text/javascript" src="user.js"></script>
            <script type="text/javascript" src="script.js"></script>
            <?php include('delete_user.php');?>
            <?php include('changepassword.php');?>
            <?php include('alert.php');?>

            <script>
	    	$(function () {
  			$('[data-toggle="popover"]').popover()
            });
            $(".toggle-password").click(function() {
                $(this).toggleClass("bi-eye bi-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
            </script>
    </body>
    </html>


   