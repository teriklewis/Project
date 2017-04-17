<?php

class LoginController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;
            
            $this->load->model('LoginModel');
            $data['name'] = $this->LoginModel->getName($data['id']);       
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            //sending $data to the HomeView and displaying the view
            $data['semester'] = "unselected";
            $this->load->view('HomeView', $data);
        } else {
            $this->load->view('LoginView');
        }
        
    }

    public function checkLogin() {
        //form validation.. checking that the user inputs a username and password
        //username is the name of the variable, Username is how it appears to the user, 
        //and required means it will produce an error message if the form is not filled in 
        $this->form_validation->set_rules('id', 'ID', 'required');

        //same for password
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');

        if ($this->form_validation->run() == false) { //if there are any errors in the form validation
            //reload the login view
            $this->load->view('LoginView');
        } else { //user is logged in, send them to homepage
            redirect('HomeController');
        }
    }
    
        public function verifyUser() {
        //assign the password from the form to $pass
        $pass = $this->input->post('password');
        //assign the username from the form to $name
        $id = $this->input->post('id');
        //loading the Login Model
        $this->load->model('LoginModel');

        //if this returns true from the Model, the user exists in the database
        if ($this->LoginModel->login($id, $pass)) {
            //set session
            $this->session->set_userdata('logged_in', $id);
            //give control back to the checkLogin function, in the else brackets where validation will be true
            return true;
        } else {
            //send a message to user, if the username or password dont match any row in the database
            $this->form_validation->set_message('verifyUser', 'Incorrect Username or Password. Please try again.');
            return false;
        }
    }
    
    public function logout() {
        if ($this->session->userdata('logged_in')) { //if logged in 
            $this->session->unset_userdata('logged_in'); // remove the login data, so nobody is logged in 
        session_destroy(); 
        redirect('HomeController');
        }else { // else go home
            redirect('HomeController');
        }
    }

}
