<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<!-- Navbar Brand-->
		<a class="navbar-brand ps-3" href="<?php echo base_url() . 'index.php/dashuser/index' ?>">Authorize user section</a>
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
						<div class="sb-sidenav-menu-heading">Dashboard</div>
						<a class="nav-link" href="<?php echo base_url() . 'index.php/dashuser/index'; ?>">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Categories
						</a>
						<div class="sb-sidenav-menu-heading">Shopping</div>
						<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
							<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
							Shopping here!
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?php echo base_url() . 'index.php/items/index' ?>">Items</a>
								<!-- <a class="nav-link" href="layout-static.html">Shoes</a>
								<a class="nav-link" href="layout-sidenav-light.html">Foods</a> -->
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
					<div class="small">User: <?= $this->session->userdata('auth_user')['first_name'] . " " . $this->session->userdata('auth_user')['last_name']; ?></div>

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
					<?php
					$colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-warning', 'bg-info', 'bg-dark'];
					?>
					<?php foreach ($categories as $category) : ?>
						<section id="category-<?php echo $category['id']; ?>">
							<div class="container p-4">
								<h4 class="d-flex justify-content-center align-items-center"><?php echo $category['name']; ?></h4>
								<hr class="border-top text-primary">
								<!-- Loop through items for current category -->
								<div class="container">
									<div class="container pt-3">
										<div class="row flex-wrap"> <!-- Add flex-wrap class to the row -->
											<?php $items_found = false; // Flag to track if any items were found ?>
											<?php foreach ($items as $item) : ?>
												<?php if ($item['category_id'] == $category['id']) : ?>
													<?php $random_color = $colors[array_rand($colors)]; ?>
													<div class="col-xl-3 col-md-6 m-4">
														<div class="card <?php echo $random_color; ?> text-white mb-4 shadow p-2 mb-5 rounded">
															<img src="<?php echo base_url('uploads/' . $item['image_path']); ?>" alt="Item Image" class="card-img-top" style="border: 1px solid #ddd; border-radius: 10px;" height="150px">
															<div class="card-body d-flex justify-content-between align-items-center">
																<h5 class="card-title mt-2"><?php echo $item['name']; ?></h5>
																<p class="card-text"><?php echo $item['price']; ?> MMK</p>
															</div>
															<div class="list-group list-group-flush">
																<p class="card-text description ellipsis">
																	<?php echo $item['description']; ?>
																</p>
																<button class="btn read-more">Read More</button>
															</div>
															<div class="card-footer bg-white d-flex justify-content-between align-items-center">
																<a href="<?php echo base_url() . 'index.php/items/details/' . $item['id'] ?>" class="link-dark">Details</a>
																<a href="<?php echo base_url() . 'index.php/items/add_card/' . $item['id'] ?>" class="small text-danger"><i class="fa-solid fa-basket-shopping"></i></a>
															</div>
														</div>
													</div>
													<?php $items_found = true; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if (!$items_found) : ?>
												<div class="col-md-12">
													<p>No items found for this category.</p>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</section>

					<?php endforeach; ?>
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
