<?php
class Assign_image_to_gallery_controller extends Controller {

	function Assign_image_to_gallery_controller() {
		parent::Controller();
	    $this->load->helper(array('form', 'url'));
	}

	function index() {
        $this->load->model('Image_info');
        $data['image_info_list'] = $this->Image_info->get_list($this->Image_info->row_count(), 0);

        $this->load->model('Image_gallery');
        $data['image_gallery_list'] = $this->Image_gallery->get_list($this->Image_gallery->row_count(), 0);

		$this->load->view('assign_image_to_gallery_view', $data);
	}

}
?>