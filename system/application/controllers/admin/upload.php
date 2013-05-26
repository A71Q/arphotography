<?php

class Upload extends Controller {

	function Upload() {
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}

	function index() {
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload() {

	    $config['upload'] = array('upload_path' => ('./uploads/original'),'allowed_types'=> ('gif|jpg|png'), 'encrypt_name' => TRUE);
		$this->load->library('upload', $config['upload']);

		if ( ! $this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this->upload->data());

            $this->load->model('Image_info');
            $this->Image_info->insert_entry($this->upload->data());
            $data["image_id"] = $this->db->insert_id();

			$this->load->library('image_lib');

            $config['thumbnail'] = array('create_thumb' => TRUE,
                                         'source_image'=> ('./uploads/original/' . $data["upload_data"]['file_name']),
                                         'width' => 100,
                                         'height' => 75,
                                         'maintain_ratio' => TRUE,
                                         'new_image' => ('./uploads/thumb/' . $data["upload_data"]['file_name']));
            $this->image_lib->initialize($config['thumbnail']);
            if ($this->image_lib->resize()) {
                $data['thumb_success'] = 'Success';
            } else {
                $data['thumb_success'] = 'Error';
            }

            $this->image_lib->clear();

            $config['resized'] = array('create_thumb' => TRUE,
                                         'source_image'=> ('./uploads/original/' . $data["upload_data"]['file_name']),
                                         'width' => 500,
                                         'height' => 333,
                                         'maintain_ratio' => TRUE,
                                         'thumb_marker' => '_resized',
                                         'new_image' => ('./uploads/resized/' . $data["upload_data"]['file_name']));
            $this->image_lib->initialize($config['resized']);
            if ($this->image_lib->resize()) {
                $data['resized_success'] = 'Success';
            } else {
                $data['resized_success'] = 'Error';
            }

            $this->image_lib->clear();

            $config['watermark'] = array('create_thumb' => false,
                                         'source_image'=> ('./uploads/resized/' . $data["upload_data"]['raw_name'] . '_resized' . $data["upload_data"]['file_ext'] ),
                                         'wm_hor_alignment'=> 'right',
                                         'wm_vrt_alignment' => 'bottom',
                                         'wm_font_color' => '000000',
                                         'wm_font_size'=> '5',
                                         'wm_type'=> 'text',
                                         'wm_text' => 'Copyright Atiqur Rahman. All rights reserved.',);
            $this->image_lib->initialize($config['watermark']);
            if ($this->image_lib->watermark()) {
                $data['watermark_success'] = 'Success';
            } else {
                $data['watermark_success'] = 'Error';
            }

            $this->load->model('image_gallery');
            $this->load->model('Image_gallery');
            $data['image_gallery_list'] = $this->Image_gallery->get_list($this->Image_gallery->row_count(), 0);

            $this->load->view('image_info', $data);
		}
	}

	function save_image_info() {

	    $image_id = $this->input->post('image_id');
	    $image_title = $this->input->post('image_title');
        $image_description = $this->input->post('image_description');

        $this->load->model('Image_info');
        $this->Image_info->set_title_desc($image_id, $image_title, $image_description);

        $image_gallery_id = $this->input->post('select_gallery');
        $this->load->model('Image_in_gallery');
        $this->Image_in_gallery->insert_entry($image_gallery_id, $image_id);

        $this->load->view('header');
		$this->load->view('footer');
	}
}
?>