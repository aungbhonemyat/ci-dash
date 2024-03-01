<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
								<div class="card-body">
									<form action="<?php echo base_url().'index.php/register'; ?>" method="post">
										<div class="row mb-3">
											<div class="col-md-6">
												<div class="form-floating mb-3 mb-md-0">
													<input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="first_name" required />
													<label for="inputFirstName">First name</label>
													<small class="text-danger"><?php echo form_error('frist_name'); ?></small>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-floating">
													<input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="last_name" required />
													<label for="inputLastName">Last name</label>
													<small class="text-danger"><?php echo form_error('last_name'); ?></small>
												</div>
											</div>
										</div>
										<div class="form-floating mb-3">
											<input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email" required />
											<label for="inputEmail">Email address</label>
											<small class="text-danger"><?php echo form_error('email'); ?></small>
										</div>
										<div class="row mb-3">
											<div class="col-md-6">
												<div class="form-floating mb-3 mb-md-0">
													<input class="form-control" id="inputPassword" type="password" placeholder="Create a password" name="password" required />
													<label for="inputPassword">Password</label>
													<small class="text-danger"><?php echo form_error('password'); ?></small>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-floating mb-3 mb-md-0">
													<input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" name="cpassword" required />
													<label for="inputPasswordConfirm">Confirm Password</label>
													<small class="text-danger"><?php echo form_error('cpassword'); ?></small>
												</div>
											</div>
										</div>
										<div class="d-grid">
											<button type="submit" class="btn btn-primary btn-md btn-block">Create account</button>
										</div>
									</form>
								</div>
								<div class="card-footer text-center py-3 d-flex align-items-center justify-content-between mt-4 mb-0">
									<a class="small" href="<?php echo base_url().'index.php/items/index';?>">Back</a>
									<div class="large"><a href="<?php echo base_url('index.php/login') ?>">Have an account? Go to login</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<div id="layoutAuthentication_footer">
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Aung CI_DASH 2024</div>
						<div>
							<a href="#">Privacy Policy</a>
							&middot;
							<a href="#">Terms &amp; Conditions</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>
