
<div class="modal fade" id="modal-user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm  modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title">Change Password</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					<input type="hidden" name="position"/>
					<div class="input-group"><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span></div>
					<input class="form-control form-control-sm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password-field" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="newpass" placeholder="Enter New Password" required/><span toggle="#password-field" class=" field-icon toggle-password"></span></div><br>

					<div class="input-group"><div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span></div>
					<input class="form-control-sm form-control" id="password-field1" type="password" name="confirmpass" placeholder="Confirm Password" required/><span toggle="#password-field1" class=" field-icon toggle-password"></span></div>
				</div>
				<div class="modal-footer">
					<button type="submit" name='changepass' class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Change</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-slash-circle"></i> Cancel</button>
				</div>
			</form>
			</div>
		</div>
	</div>



<script type="text/javascript">
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