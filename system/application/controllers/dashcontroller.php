<?php
class DashController extends Controller {

	function DashController() {
        parent::Controller();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        if ($this->session->userdata('login_name') == null) {
            $this->output->set_header("Location: /index.php/logincontroller/");
        }
	}
	function index() {
    $data = array(
                   'title' => 'My Title',
                   'heading' => 'My Heading',
                   'message' => 'My Message'
              );
	    
        $this->load->view('dashview', $data);
    }
}
?>