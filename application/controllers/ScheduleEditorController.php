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
                
                $this->load->model('CourseModel');
                $data['courses'] = $this->CourseModel->getCourses();
                
            $this->load->view('ScheduleEditorView', $data);
            } else {
                redirect('HomeController');
            }
        } else {
            redirect('LoginController');
        }
    }
    
    public function EditCourse() { //edits the time location and teachers 
        $course['ID'] = $this->input->get('ID');
        if ($this->input->post('title') != "") {$data['Title'] = $this->input->post('title');
        }if ($this->input->post('fname') != "") {$data['FirstName'] = $this->input->post('fname');
        }if ($this->input->post('time') != "") {$data['Time'] = $this->input->post('lname');
        }if ($this->input->post('location') != "") {$data['Location'] = $this->input->post('position');
        }
     
    }

}
