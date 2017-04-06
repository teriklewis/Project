<?php

class HomeController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;
            
            //load the home model to the controller
            $this->load->model('LoginModel');
            
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
        } else {
            $data['level'] = 0;
        }
        //sending $data to the HomeView and displaying the view
        $data['search'] = false;
        $this->load->view('HomeView', $data);
    }

}
