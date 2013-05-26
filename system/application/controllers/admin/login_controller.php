<?php
class Login_controller extends Controller {

	function Login_controller() {
		parent::Controller();
	}

	function index() {
        $this->session->sess_destroy();
		$this->load->view('loginview');
	}

    function doLogin() {
        $this->load->model('Login');
        $login_name = $this->input->post('login_name');
        $password = $this->input->post('password');
        if ($login_name == '' || $password == '') {
            return $this->index();
        }
        $login = $this->Login->getLogin($login_name, $password);
        if ($login == null) {
            $this->load->view('loginview', array('errorMsg' => 'Incorrenct Username/Password'));
        } else {
            $this->session->set_userdata('login_id', $login->id);
            $this->session->set_userdata('login_name', $login->login_name);
            $this->session->set_userdata('first_name', $login->first_name);
            $this->session->set_userdata('last_name', $login->last_name);
            $this->session->set_userdata('title', $login->title);
            $this->session->set_userdata('login_type', $login->login_type);
            $this->load->view('loginview');
        }
    }
}
?>