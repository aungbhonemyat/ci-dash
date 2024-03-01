<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<body>
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-between">
		<!-- Navbar Brand-->
		<img src="<?php echo base_url('assets/images/ABM.png'); ?>" alt="Your Image" class="img-fluid rounded-circle border m-3" style="width: 100px;">

		<a class="navbar-brand ps-3" href="">Dashboard</a>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
			<!-- <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
				<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
			</div> -->
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
			<?php if ($this->session->has_userdata('authenticated') == FALSE) { ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/register') ?>">Register</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/login') ?>">Login</a>
				</li>
			<?php } ?>
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
		</ul>
	</nav>
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<ol class="breadcrumb mb-2 mt-4">
					<li class="form-floating mb-3 align-items-end">
						<?php if ($this->session->flashdata('status')) : ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->flashdata('status'); ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php endif; ?>
					</li>
				</ol>
				<div class="container d-flex justify-content-center align-items-center" style="height: 10vh;">
					<h2 class="">You can buy everyting hehe!</h2>
				</div>

				<?php
				$colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-warning', 'bg-info'];
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
										<?php $items_found = false; // Flag to track if any items were found 
										?>
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

				<div class="container" style="height: 30vh;"></div>


				<div class="card mb-4">
					<div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
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
