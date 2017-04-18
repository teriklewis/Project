<?php

class StateAvailabilityController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);

            $this->load->model('LoginModel');
            $data['name'] = $this->LoginModel->getName($data['id']);
            
            if ($data['level'] == 3) {
                $this->load->view('StateAvailabilityView', $data);
            } else {
                $this->load->view('HomeView', $data);
            }
        } else {
            redirect('LoginController');
        }
    }

    public function StateAvailability() { 
        //also check the credits of contract lecturers
        //
        //first semester
        if ($this->input->post('fsmw1') == 1) {
            $data['fsmw1'] = 1;
        } else {
            $data['fsmw1'] = 0;
        }
        if ($this->input->post('fsmw2') == 1) {
            $data['fsmw2'] = 1;
        } else {
            $data['fsmw2'] = 0;
        }
        if ($this->input->post('fsmw3') == 1) {
            $data['fsmw3'] = 1;
        } else {
            $data['fsmw3'] = 0;
        }
        if ($this->input->post('fsmw4') == 1) {
            $data['fsmw4'] = 1;
        } else {
            $data['fsmw4'] = 0;
        }
        if ($this->input->post('fsmw5') == 1) {
            $data['fsmw5'] = 1;
        } else {
            $data['fsmw5'] = 0;
        }
        if ($this->input->post('fsmw6') == 1) {
            $data['fsmw6'] = 1;
        } else {
            $data['fsmw6'] = 0;
        }
        if ($this->input->post('fsmw7') == 1) {
            $data['fsmw7'] = 1;
        } else {
            $data['fsmw7'] = 0;
        }
        if ($this->input->post('fsmw8') == 1) {
            $data['fsmw8'] = 1;
        } else {
            $data['fsmw8'] = 0;
        }
        if ($this->input->post('fsmw9') == 1) {
            $data['fsmw9'] = 1;
        } else {
            $data['fsmw9'] = 0;
        }
        if ($this->input->post('fstt1') == 1) {
            $data['fstt1'] = 1;
        } else {
            $data['fstt1'] = 0;
        }
        if ($this->input->post('fstt2') == 1) {
            $data['fstt2'] = 1;
        } else {
            $data['fstt2'] = 0;
        }
        if ($this->input->post('fstt3') == 1) {
            $data['fstt3'] = 1;
        } else {
            $data['fstt3'] = 0;
        }
        if ($this->input->post('fstt4') == 1) {
            $data['fstt4'] = 1;
        } else {
            $data['fstt4'] = 0;
        }
        if ($this->input->post('fstt5') == 1) {
            $data['fstt5'] = 1;
        } else {
            $data['fstt5'] = 0;
        }
        if ($this->input->post('fstt6') == 1) {
            $data['fstt6'] = 1;
        } else {
            $data['fstt6'] = 0;
        }
        if ($this->input->post('fstt7') == 1) {
            $data['fstt7'] = 1;
        } else {
            $data['fstt7'] = 0;
        }
        if ($this->input->post('fstt8') == 1) {
            $data['fstt8'] = 1;
        } else {
            $data['fstt8'] = 0;
        }
        if ($this->input->post('fstt9') == 1) {
            $data['fstt9'] = 1;
        } else {
            $data['fstt9'] = 0;
        }
        
        //second semester
        if ($this->input->post('ssmw1') == 1) {
            $data['ssmw1'] = 1;
        } else {
            $data['ssmw1'] = 0;
        }
        if ($this->input->post('ssmw2') == 1) {
            $data['ssmw2'] = 1;
        } else {
            $data['ssmw2'] = 0;
        }
        if ($this->input->post('ssmw3') == 1) {
            $data['ssmw3'] = 1;
        } else {
            $data['ssmw3'] = 0;
        }
        if ($this->input->post('ssmw4') == 1) {
            $data['ssmw4'] = 1;
        } else {
            $data['ssmw4'] = 0;
        }
        if ($this->input->post('ssmw5') == 1) {
            $data['ssmw5'] = 1;
        } else {
            $data['ssmw5'] = 0;
        }
        if ($this->input->post('ssmw6') == 1) {
            $data['ssmw6'] = 1;
        } else {
            $data['ssmw6'] = 0;
        }
        if ($this->input->post('ssmw7') == 1) {
            $data['ssmw7'] = 1;
        } else {
            $data['ssmw7'] = 0;
        }
        if ($this->input->post('ssmw8') == 1) {
            $data['ssmw8'] = 1;
        } else {
            $data['ssmw8'] = 0;
        }
        if ($this->input->post('ssmw9') == 1) {
            $data['ssmw9'] = 1;
        } else {
            $data['ssmw9'] = 0;
        }
        if ($this->input->post('sstt1') == 1) {
            $data['sstt1'] = 1;
        } else {
            $data['sstt1'] = 0;
        }
        if ($this->input->post('sstt2') == 1) {
            $data['sstt2'] = 1;
        } else {
            $data['sstt2'] = 0;
        }
        if ($this->input->post('sstt3') == 1) {
            $data['sstt3'] = 1;
        } else {
            $data['sstt3'] = 0;
        }
        if ($this->input->post('sstt4') == 1) {
            $data['sstt4'] = 1;
        } else {
            $data['sstt4'] = 0;
        }
        if ($this->input->post('sstt5') == 1) {
            $data['sstt5'] = 1;
        } else {
            $data['sstt5'] = 0;
        }
        if ($this->input->post('sstt6') == 1) {
            $data['sstt6'] = 1;
        } else {
            $data['sstt6'] = 0;
        }
        if ($this->input->post('sstt7') == 1) {
            $data['sstt7'] = 1;
        } else {
            $data['sstt7'] = 0;
        }
        if ($this->input->post('sstt8') == 1) {
            $data['sstt8'] = 1;
        } else {
            $data['sstt8'] = 0;
        }
        if ($this->input->post('sstt9') == 1) {
            $data['sstt9'] = 1;
        } else {
            $data['sstt9'] = 0;
        }
        
        //third semester
        if ($this->input->post('tsmw1') == 1) {
            $data['tsmw1'] = 1;
        } else {
            $data['tsmw1'] = 0;
        }
        if ($this->input->post('tsmw2') == 1) {
            $data['tsmw2'] = 1;
        } else {
            $data['tsmw2'] = 0;
        }
        if ($this->input->post('tsmw3') == 1) {
            $data['tsmw3'] = 1;
        } else {
            $data['tsmw3'] = 0;
        }
        if ($this->input->post('tsmw4') == 1) {
            $data['tsmw4'] = 1;
        } else {
            $data['tsmw4'] = 0;
        }
        if ($this->input->post('tsmw5') == 1) {
            $data['tsmw5'] = 1;
        } else {
            $data['tsmw5'] = 0;
        }
        
        if ($this->input->post('tstt1') == 1) {
            $data['tstt1'] = 1;
        } else {
            $data['tstt1'] = 0;
        }
        if ($this->input->post('tstt2') == 1) {
            $data['tstt2'] = 1;
        } else {
            $data['tstt2'] = 0;
        }
        if ($this->input->post('tstt3') == 1) {
            $data['tstt3'] = 1;
        } else {
            $data['tstt3'] = 0;
        }
        if ($this->input->post('tstt4') == 1) {
            $data['tstt4'] = 1;
        } else {
            $data['tstt4'] = 0;
        }
        if ($this->input->post('tstt5') == 1) {
            $data['tstt5'] = 1;
        } else {
            $data['tstt5'] = 0;
        }

        //send data to database
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('HomeModel');
        $this->HomeModel->setAvailability($data);
    }

}
