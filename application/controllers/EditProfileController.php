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
    
    public function ChangePassword() {
        $this->form_validation->set_rules('password', 'Current Password', 'required|callback_verifyUser');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required');
        $this->form_validation->set_rules('confNewPassword', 'Confirm New Password', 'required|callback_checkPasswordsMatch');

        if ($this->form_validation->run() == false) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            //sending $data to the EditProfileView and displaying the view
            $this->load->view('EditProfileView', $data);
            
        } else {
            $newPass = $this->input->post('newPassword');
            $session_data = $this->session->userdata('logged_in');
            $id = $session_data;
            $this->load->model('loginModel');
            $this->LoginModel->changePassword($id, $newPass);
        }
    }

    public function verifyUser() {
        $pass = $this->input->post('password');
        $session_data = $this->session->userdata('logged_in');
        $id = $session_data;
        $this->load->model('LoginModel');

        if ($this->LoginModel->login($id, $pass)) {
            return true;
        } else {
            $this->form_validation->set_message('verifyUser', 'Incorrect Password. Please try again.');
            return false;
        }
    }

    public function checkPasswordsMatch() {
        $newPass = $this->input->post('newPassword');
        if ($newPass == $this->input->post('confNewPassword')) {
            return true;
        } else {
            $this->form_validation->set_message('checkPasswordsMatch', 'New Passwords do not match, please try again.');
            return false;
        }
    }
}
