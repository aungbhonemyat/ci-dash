<body class="bg-primary">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Forgot Password?</h3>
								</div>
								<div class="card-body">
								<div class="form-floating mb-3">
										<?php if ($this->session->flashdata('status')) : ?>
											<div class="alert alert-success alert-dismissible fade show" role="alert">
												<?= $this->session->flashdata('status'); ?>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
										<?php endif; ?>
									</div>
									<form action="<?php echo base_url().'index.php/resetPassword?hash='.$hash;?>" method="post">
											<div class="col-md-6">
												<div class="form-floating mb-3 mb-md-0">
													<input class="form-control" id="inputFirstName" type="text" placeholder="Old password" name="currentPassword" required />
													<label for="inputFirstName">Current Password</label>
													<small class="text-danger"><?php echo form_error('frist_name'); ?></small>
												</div>
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
											<button type="submit" class="btn btn-primary btn-md btn-block"> Update Password</button>
										</div>
									</form>
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
						<div class="text-muted">Copyright &copy; Aung CI-DASH 2024</div>
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
