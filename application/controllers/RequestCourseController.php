<?php

class RequestCourseController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            $this->load->model('LoginModel');
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            $data['name'] = $this->LoginModel->getName($data['id']);
            
            if ($data['level'] == 2) {
                $this->load->model('CourseModel');
                $data['courses'] = $this->CourseModel->getCourses();
                
                $this->load->model('RequestModel');
                $data['requests'] = $this->RequestModel->getRequests();
                
                $this->load->view('RequestCourseView', $data);
            } else {
                $this->load->view('HomeView', $data);
            } 
        } else {
            redirect('LoginController');
        }
    }
    
    public function request() {
        $this->form_validation->set_rules('courseCode', 'Course', 'required');
        $session_data = $this->session->userdata('logged_in');
        $this->load->model('CourseModel');
        
        if ($this->form_validation->run() == false) {    //if there are any errors in the form validation

            //reload the requestCourseView      
            $data['id'] = $session_data;
            $this->load->model('LoginModel');
            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            
            $data['courses'] = $this->CourseModel->getCourses(); 
            
            $this->load->view('RequestCourseView', $data);          
        } else {
            $data['courseCode'] = $this->input->post('courseCode');
            //get course name
            $data['courseName'] = $this->CourseModel->getCourseName($data);
            
            if($this->input->post('semester') != ""){
                $data['semester'] = $this->input->post('semester');
            }
            if($this->input->post('preferences') != ""){
                $data['preferences'] = $this->input->post('preferences');
            }
            
            $data['id'] = $session_data;
            
            //get priority of this id 
            $this->load->model('HomeModel');
            $credits = $this->HomeModel->getCreditsCompleted($data);
            
            //if their credits completed is over 96, priority is 1, else 2.
            if($credits > 95) {
                $data['priority'] = 1;
            } else {
                $data['priority'] = 2; 
            }
 
            $this->load->model('RequestModel');
            $this->RequestModel->RequestUpdate($data);  
        }
    }

}
