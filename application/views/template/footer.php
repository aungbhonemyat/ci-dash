<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

<!-- Only include one version of Bootstrap, either 4 or 5, not both -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap.bundle.min.js'; ?>"></script>

<!-- Include other scripts -->
<script src="<?php echo base_url() . 'assets/js/scripts.js'; ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() . 'assets/assets/demo/chart-area-demo.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/assets/demo/chart-bar-demo.js'; ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() . 'assets/js/datatables-simple-demo.js'; ?>"></script>



<script>
document.addEventListener("DOMContentLoaded", function() {
		var readMoreButtons = document.querySelectorAll('.read-more');

		readMoreButtons.forEach(function(button) {
			button.addEventListener('click', function(e) {
				var description = this.previousElementSibling;
				if (description.classList.contains('ellipsis')) {
					description.classList.remove('ellipsis');
					this.innerText = 'Show Less';
				} else {
					description.classList.add('ellipsis');
					this.innerText = 'Read More';
				}
			});
		});
	});
</script>
</body>
</html>
