<?php

class HomeController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;
            
            $this->load->model('LoginModel');
            $data['name'] = $this->LoginModel->getName($data['id']);       
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            //sending $data to the HomeView and displaying the view
            $this->load->model('HomeModel');
            $data['state'] = $this->HomeModel->getState();
            $data['semester'] = "unselected";
            
            $this->load->view('HomeView', $data);
        } else {
            redirect('LoginController');
        }
    }
    
    public function viewSchedule() {  
        $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;
            
            $this->load->model('LoginModel');
            $this->load->model('HomeModel');
                
            $data['name'] = $this->LoginModel->getName($data['id']);       
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            $data['state'] = $this->HomeModel->getState();
            
            //sending $data to the HomeView and displaying the view
            $data['semester'] = $this->input->post('semester');
            if($data['semester'] == "firstsem") {
                //get schedule for first semester
                $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
                
            } else if($data['semester'] == "secondsem") {
                //get schedule for second semester 
                $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
                
            } else if($data['semester'] == "thirdsem"){
                //get schedule for third semester
                $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
            }
            
            $this->load->view('HomeView', $data);   
    }      

}
