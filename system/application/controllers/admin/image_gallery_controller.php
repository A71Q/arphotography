<?php
class Image_gallery_controller extends Controller {

	function Image_gallery_controller() {
		parent::Controller();
	    $this->load->helper(array('form', 'url'));
	}

	function index() {
        $this->load->model('Image_gallery');
        $data['image_gallery_list'] = $this->Image_gallery->get_list($this->Image_gallery->row_count(), 0);

		$this->load->view('image_gallery_view', $data);
	}

	function save_image_gallery_info() {

	    $data["name"] = $this->input->post('gallery_name');
	    $data["description"] = $this->input->post('gallery_desc');

        $this->load->model('Image_gallery');
        $this->Image_gallery->insert_entry($data);
        $this->load->view('image_gallery_view');
	}
}
?>