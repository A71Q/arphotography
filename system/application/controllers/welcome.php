<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();
	}

	function index()
	{
        $data = array(
               'title' => 'AR Photography',
               'heading' => 'AR Photography',
              );

        $this->load->model('Image_info');
        $data['image_infos'] = $this->Image_info->get_recent_list(5);

		$this->load->view('welcomeview', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

/*
If you want to restrict the access to your files with the browser, you could use a .htaccess file, and to load the files using a controler, like this:

$this->load->helper(�download�);
$data = file_get_contents($path_to_document);

$file_name = split(�/�, $path_to_document);
$size = sizeof($file_name);
$name = �dl_� . url_title($name[$size - 1]);

force_download($name, $data);*/
