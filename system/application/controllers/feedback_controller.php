<?php
class Feedback_controller extends Controller {

    function Feedback_controller() {
        parent::Controller();
    }

    function index() {
        $this->load->view('feedbackview');
    }

    function send() {
        $this->load->library('email');

        $this->email->from($this->input->post('mail'), $this->input->post('name'));
        $this->email->to('info@email.com');

        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('message'));

        $this->email->send();

        $this->load->view('success', array('type' => 'feedback'));
    }
}
?>