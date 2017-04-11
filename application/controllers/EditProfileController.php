<?php

class EditProfileController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            //sending $data to the EditProfileView and displaying the view
            $this->load->view('EditProfileView', $data);
        } else {
            redirect('LoginController');
        }
        
    }

}
