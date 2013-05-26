<?php

class Gallery_controller extends Controller {

	function Gallery_controller() {
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}

	function index() {

        $query = $this->db->query('SELECT image_info.raw_name raw_name, image_info.file_ext file_ext, image_gallery.id id, image_gallery.name name, image_gallery.description description FROM image_info, image_gallery WHERE image_gallery.cover_image = image_info.id');

        $data['image_gallery_list'] = $query->result();

		$this->load->view('gallery_view', $data);
	}

	function selected($gallery_id) {

        $query = $this->db->query('SELECT image_info.raw_name raw_name, image_info.file_ext file_ext, image_gallery.id id, image_gallery.name name, image_gallery.description description FROM image_info, image_gallery WHERE image_gallery.cover_image = image_info.id');

        $data['image_gallery_list'] = $query->result();

        $query = $this->db->query('SELECT image_info.raw_name raw_name, image_info.file_ext file_ext, image_info.title title, image_info.description description FROM image_info, image_in_gallery WHERE image_in_gallery.image_gallery_id = ? and image_in_gallery.image_id = image_info.id', array($gallery_id));
        $data['image_list'] = $query->result();

        $this->load->view('gallery_view', $data);
	}
}
?>