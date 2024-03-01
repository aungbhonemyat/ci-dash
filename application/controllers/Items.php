<?php class Items extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('ItemModel');
		$this->load->model('CategoryModel');
	}

	function index()
	{
		$role = $this->session->userdata('authenticated');
		$data['items'] = array();

		switch ($role) {
			case 2:
				$view = 'items/list';
				break;
			case 1:
				$view = 'items/user_list';
				break;
			default:
				$view = 'welcome_message';
		}
		$this->load->model('ItemModel');
		$this->load->model('CategoryModel');

		$data['categories'] = $this->CategoryModel->get_categories();
		$data['items'] = $this->ItemModel->all();
		$data['grouped_items'] = $this->ItemModel->group_items_by_category();
		$this->load->view('template/header.php');
		$this->load->view($view, $data);
		$this->load->view('template/footer.php');
		// $data['items'] = $this->ItemModel->all();
	}

	function create()
	{
		$this->load->model('ItemModel');
		$this->load->model('CategoryModel');

		$data['categories'] = $this->CategoryModel->get_categories();

		// Load form validation library
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description');
		$this->form_validation->set_rules('image', 'Image', 'callback_validate_image');
		$this->form_validation->set_rules('price', 'Price', 'numeric|required');
		$this->form_validation->set_rules('stock_quantity', 'Quantity');
		// Add validation rules for other fields

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header.php');
			$this->load->view('items/create', $data);
			$this->load->view('template/footer.php');
		} else {
			// Upload image
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 1024 * 8;
			$config['max_width'] = 0;
			$config['max_height'] = 0;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('image')) {
				// Handle image upload error
				$error = $this->upload->display_errors();
				echo $error;
			} else {
				$upload_data = $this->upload->data();
				$image_path = $upload_data['file_name'];

				// Create item
				$formArray = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'stock_quantity' => $this->input->post('stock_quantity'),
					'category_id' => $this->input->post('category_id'),
					'image_path' => $image_path
				);
				$this->ItemModel->create($formArray);
				$this->session->set_flashdata('status', 'Item added successfully');
				redirect(base_url() . 'index.php/items/index');
			}
		}
	}


	function edit($item_id)
	{
		// Load models and views
		$this->load->model('ItemModel');
		$this->load->model('CategoryModel');
		$this->load->view('template/header.php');
		$this->load->view('template/footer.php');

		// Retrieve item data and categories
		$item = $this->ItemModel->getuser($item_id);
		$data['items'] = $item;
		$data['categories'] = $this->CategoryModel->get_categories();

		// Set form validation rules
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description');
		$this->form_validation->set_rules('price', 'Price', 'numeric|required');
		$this->form_validation->set_rules('stock_quantity', 'Quantity', 'numeric|required');

		// Check if image is uploaded
		$image_uploaded = !empty($_FILES['image']['name']);
		if ($image_uploaded) {
			$this->form_validation->set_rules('image', 'Image', 'callback_validate_image');
		}

		if ($this->form_validation->run() === false) {
			$this->load->view('items/edit', $data);
		} else {
			$formArray = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'stock_quantity' => $this->input->post('stock_quantity'),
				'category_id' => $this->input->post('category_id')
			);
			if ($image_uploaded) {
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 4000; // 4 MB
				$config['max_width'] = 5024;
				$config['max_height'] = 5068;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					$data['error'] = $this->upload->display_errors();
					$this->load->view('items/edit', $data);
					return;
				} else {
					$upload_data = $this->upload->data();
					$formArray['image_path'] = $upload_data['file_name'];
				}
			}
			$this->ItemModel->update($formArray, $item_id);
			$this->session->set_flashdata('status', 'Record updated successfully');
			redirect(base_url() . 'index.php/items/index');
		}
	}

	public function validate_image($str)
	{
		if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
			$this->form_validation->set_message('validate_image', 'The {field} field is required.');
			return false;
		}
		return true;
	}

	function delete($item_id)
	{
		$this->load->model('ItemModel');
		$item = $this->ItemModel->getuser($item_id);

		if (empty($item)) {
			$this->session->set_flashdata('status', 'Record not found in database');
			redirect(base_url() . 'index.php/user/index');
		}
		$this->ItemModel->delete($item_id);
		$this->session->set_flashdata('status', 'Record deleted Successfully');
		redirect(base_url() . 'index.php/items/index');
	}
}
