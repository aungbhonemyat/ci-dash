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
									<form action="<?php echo base_url() . 'index.php/forgotPassword'; ?>" method="post">
										<div class="form-floating mb-3">
											<?php if ($this->session->flashdata('status')) : ?>
												<div class="alert alert-success alert-dismissible fade show" role="alert">
													<?= $this->session->flashdata('status'); ?>
													<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
												</div>
											<?php endif; ?>
										</div>
										<div class="form-floating mb-3">
											<input class="form-control" id="inputEmail" type="email" name="email_id" placeholder="name@example.com" required />
											<label for="inputEmail">Email address</label>
											<small class="text-danger"><?php echo form_error('email_id'); ?></small>
										</div>
										<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<a class="btn btn-primary mt-4" href="<?php echo base_url().'index.php/items/index';?>">Back</a>
											<button type="submit" class="btn btn-primary mt-4">Send Reset Link</button>
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
