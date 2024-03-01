<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="<?php echo base_url().'index.php/dash/index' ?>">Admin Section</a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
				<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
			</div>
		</form>
		<!-- Navbar-->
		<?php if ($this->session->has_userdata('authenticated') == TRUE) { ?>
			<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li>
							<p class="dropdown-item"><?= $this->session->userdata('auth_user')['first_name'] . " " . $this->session->userdata('auth_user')['last_name']; ?></p>
							<p class="dropdown-item">email <?= $this->session->userdata('auth_user')['email']; ?></p>
						</li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li><a class="dropdown-item" href="#!">Settings</a></li>
						<li>
							<hr class="dropdown-divider" />
						</li>
						<li><a class="dropdown-item" href="<?php echo base_url('index.php/logout') ?>">Logout</a></li>
					</ul>
				</li>
			</ul>
		<?php } ?>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">Core</div>
						<a class="nav-link" href="<?php echo base_url() . 'index.php/dash/index'; ?>">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<div class="sb-sidenav-menu-heading">Interface</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Layouts
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?php echo base_url() . 'index.php/items/index' ?>">Items</a>
								<a class="nav-link" href="<?php echo base_url() . 'index.php/categories/index' ?>">Categories</a>
								<a class="nav-link" href="<?php echo base_url() . 'index.php/employee/index' ?>">Employee List</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Pages
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
								<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
									Authentication
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="login.html">Login</a>
										<a class="nav-link" href="register.html">Register</a>
										<a class="nav-link" href="password.html">Forgot Password</a>
									</nav>
								</div>
								<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
									Error
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="401.html">401 Page</a>
										<a class="nav-link" href="404.html">404 Page</a>
										<a class="nav-link" href="500.html">500 Page</a>
									</nav>
								</div>
							</nav>
						</div>
						<div class="sb-sidenav-menu-heading">Addons</div>
						<a class="nav-link" href="charts.html">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Charts
						</a>
						<a class="nav-link" href="tables.html">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Tables
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer text-center">
					<div class="small">Admin: <?= $this->session->userdata('auth_user')['first_name'] . " " . $this->session->userdata('auth_user')['last_name']; ?></div>

				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid px-4">
					<h1 class="mt-4"><i class="fas fa-user fa-user-tie"></i>
						<?= $this->session->userdata('auth_user')['first_name'] . " " . $this->session->userdata('auth_user')['last_name']; ?></p>
					</h1>
					<ol class="breadcrumb mb-2">
						<li class="form-floating mb-3 align-items-end">
							<?php if ($this->session->flashdata('status')) : ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('status'); ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							<?php endif; ?>
						</li>
					</ol>

					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card bg-primary text-white mb-4">
								<div class="card-body">Primary Card</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-warning text-white mb-4">
								<div class="card-body">Warning Card</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-success text-white mb-4">
								<div class="card-body">Success Card</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-danger text-white mb-4">
								<div class="card-body">Danger Card</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small text-white stretched-link" href="#">View Details</a>
									<div class="small text-white"><i class="fas fa-angle-right"></i></div>
								</div>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-5">
								<div class="card shadow-lg border-0 rounded-lg mt-3">
									<div class="card-header">
										<h3 class="text-center font-weight-light my-4">Create Item</h3>
									</div>
									<div class="card-body">
										<form action="<?php echo base_url() . 'index.php/items/create'; ?>" method="post" enctype="multipart/form-data">
											<div class="form-floating mb-3">
												<input class="form-control" id="inputName" type="text" name="name" value="<?php echo set_value('name') ?>" placeholder="Name Here" required />
												<label for="inputName">Item Name</label>
												<small class="text-danger"><?php echo form_error('name'); ?></small>
											</div>
											<div class="mb-3">
												<label for="inputimage">Item image</label>
												<input class="form-control" id="inputimage" type="file" name="image" required/>
												<small class="text-danger"><?php echo form_error('image_path'); ?></small>
											</div>
											<div class="form-floating mb-3">
												<input class="form-control" id="description" type="text" name="description" value="<?php echo set_value('description') ?>" placeholder="Edit description" required />
												<label for="description">Description</label>
												<small class="text-danger"><?php echo form_error('description'); ?></small>
											</div>
											<div class="form-floating mb-3">
												<input class="form-control" id="price" type="text" name="price" value="<?php echo set_value('price') ?>" placeholder="price" required />
												<label for="price">Price</label>
												<small class="text-danger"><?php echo form_error('price'); ?></small>
											</div>
											<div class="form-floating mb-3">
												<input class="form-control" id="quantity" type="text" name="stock_quantity" value="<?php echo set_value('stock_quantity') ?>" placeholder="price" required />
												<label for="quantity">Quantity</label>
												<small class="text-danger"><?php echo form_error('stock_quantity'); ?></small>
											</div>
											<label for="category_id" class="mb-2">Category: select here!</label>
											<select class="form-control mb-3" id="category_id" name="category_id">
												<?php foreach ($categories as $category): ?>
													<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
												<?php endforeach; ?>
											</select><br>
											<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
												<a class="btn btn-primary mt-4" href="<?php echo base_url() . 'index.php/items/index' ?>">Back</a>
												<button class="btn btn-primary mt-4">Create</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
			<footer class="py-4 bg-light mt-auto">
				<div class="container-fluid px-4">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Copyright &copy; Your Website 2023</div>
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
