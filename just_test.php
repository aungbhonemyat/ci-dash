<?php foreach ($grouped_items as $category_name => $items): ?>
	<h2><?php echo $category_name; ?></h2>
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Stock Quantity</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $item): ?>
				<tr>
					<td><?php echo isset($item['name']) ? $item['name'] : ''; ?></td>
					<td><?php echo isset($item['description']) ? $item['description'] : ''; ?></td>
					<td><?php echo isset($item['price']) ? $item['price'] : ''; ?></td>
					<td><?php echo isset($item['stock_quantity']) ? $item['stock_quantity'] : ''; ?></td>
					<td>
						<?php if (isset($item['id'])): ?>
							<a href="<?php echo base_url('items/edit/'.$item['id']); ?>" class="btn btn-info" style="margin-right: 10px;">Edit</a>
							<a href="<?php echo base_url('items/delete/'.$item['id']); ?>" class="btn btn-danger">Delete</a>
						<?php endif; ?>
					</td>

				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endforeach; ?>


original
<div class="container">
	<?php $no = 1; ?>
	<div class="container pt-3">
		<div class="row">
			<div class="col col-md-12 m-auto">
				<table id="myTable" class="table table-striped">
					<tr>
						<th>No</th>
						<th>category name</th>
						<th>Name</th>
						<th>Description</th>
						<th>Price (MMK)</th>
						<th>Quantity</th>
						<th>Actions</th>
					</tr>
					<?php if (!empty($grouped_items)) {
						foreach ($grouped_items as $item) { ?>
							<tr>
								<td><?php echo $no;
									$no++ ?></td>
								<td><?php echo $item['category_name']; ?></td>
								<td><?php echo $item['name']; ?></td>
								<td><?php echo $item['description']; ?></td>
								<td><?php echo $item['price']; ?></td>
								<td><?php echo $item['stock_quantity']; ?></td>

								<td>
									<a href="<?php echo base_url() . 'index.php/items/edit/' . $item['id'] ?>" class="text-info" style="margin-right: 20px;"><i class="fa-regular fa-pen-to-square"></i></a>
									<a href="<?php echo base_url() . 'index.php/items/delete/' . $item['id'] ?>" class="text-danger mr-2"><i class="fa-regular fa-trash-can"></i></a>
								</td>
							</tr>
						<?php }
					} else { ?>
						<tr>
							<td colspan="5"> Record not found</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="col-md-12 d-flex justify-content-end">
			<a href="<?php echo base_url() . 'index.php/items/create' ?>" class="btn btn-danger">Create</a>
		</div>
	</div>
</div>

welcome view
<div class="container pt-3">
	<div class="row">
		<?php if (!empty($grouped_items)) {
			foreach ($grouped_items as $item) {
				$random_color = $colors[array_rand($colors)];
		?>
				<div class="col-xl-3 col-md-6">
					<div class="card <?php echo $random_color; ?> text-white mb-4 shadow p-3 mb-5 rounded">
						<div class="card-body">
							<h5 class="card-title"><?php echo $item['name']; ?></h5>
							<p class="card-text"><?php echo $item['description']; ?></p>
						</div>
						<div class="card-footer bg-white d-flex align-items-center justify-content-center row text-center">
							<div class="col-md-6">
								<a href="#" class="link-dark link-offset-0 link-underline-opacity-5 link-underline-opacity-100-hover">Item Details</a>
							</div>
							<div class="col-md-6">
								<a class="small text-danger" href="<?php echo base_url('index.php/login') ?>"><i class="fa-solid fa-basket-shopping"></i></a>
							</div>
						</div>

					</div>
				</div>
			<?php }
		} else { ?>
			<div class="col-md-12">
				<p>Record not found</p>
			</div>
		<?php } ?>
	</div>
</div>
