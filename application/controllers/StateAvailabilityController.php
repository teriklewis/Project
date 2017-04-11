<?php

class StateAvailabilityController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);

            if ($data['level'] == 2) {
                $this->load->view('StateAvailabilityView', $data);
            } else {
                $this->load->view('HomeView', $data);
            } 
        } else {
            redirect('LoginController');
        }
    }
}
