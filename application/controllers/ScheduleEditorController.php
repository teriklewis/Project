<?php

class ScheduleEditorController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            if($data['level'] > 3) {
                //sending $data to the HomeView and displaying the view
            $this->load->view('ScheduleEditorView', $data);
            } else {
                redirect('HomeController');
            }
        } else {
            redirect('LoginController');
        }
    }

}
