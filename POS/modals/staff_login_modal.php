<div class="modal fade" id="modal-staff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content text-center">
      <div class="modal-header">
				<h5 class="modal-title"><i class="fas fa-user-lock"></i> Sign In</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					<div class="input-group mb-1"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span></div>
					<input class="form-control-sm form-control" type="text" name="username" placeholder="Enter Username" required/></div>
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span></div>
					<input class="form-control-sm form-control" type="password" name="password" placeholder="Enter Password" required/>
					<input type="hidden" name="position" value="staff"/></div>
				</div>
				<div class="modal-footer">

                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
        <button type="submit" name="login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Login</button>					
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

