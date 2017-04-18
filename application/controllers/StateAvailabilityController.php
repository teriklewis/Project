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

    public function StateAvailability() { //put the new semester variable stuff. then finish step4 view to check availability 
        //also check the credits of contract lecturers
        if ($this->input->post('mw1') == 1) {
            echo $this->input->post('mw1');
            $data['mw1'] = 1;
        } else {
            $data['mw1'] = 0;
        }
        if ($this->input->post('mw2') == 1) {
            echo $this->input->post('mw2');
            $data['mw2'] = 1;
        } else {
            $data['mw2'] = 0;
        }
        if ($this->input->post('mw3') == 1) {
            echo $this->input->post('mw3');
            $data['mw3'] = 1;
        } else {
            $data['mw3'] = 0;
        }
        if ($this->input->post('mw4') == 1) {
            echo $this->input->post('mw4');
            $data['mw4'] = 1;
        } else {
            $data['mw4'] = 0;
        }
        if ($this->input->post('mw5') == 1) {
            echo $this->input->post('mw5');
            $data['mw5'] = 1;
        } else {
            $data['mw5'] = 0;
        }
        if ($this->input->post('mw6') == 1) {
            echo $this->input->post('mw6');
            $data['mw6'] = 1;
        } else {
            $data['mw6'] = 0;
        }
        if ($this->input->post('mw7') == 1) {
            echo $this->input->post('mw7');
            $data['mw7'] = 1;
        } else {
            $data['mw7'] = 0;
        }
        if ($this->input->post('mw8') == 1) {
            echo $this->input->post('mw8');
            $data['mw8'] = 1;
        } else {
            $data['mw8'] = 0;
        }
        if ($this->input->post('mw9') == 1) {
            echo $this->input->post('mw9');
            $data['mw9'] = 1;
        } else {
            $data['mw9'] = 0;
        }
        if ($this->input->post('tt1') == 1) {
            echo $this->input->post('tt1');
            $data['tt1'] = 1;
        } else {
            $data['tt1'] = 0;
        }
        if ($this->input->post('tt21') == 1) {
            echo $this->input->post('tt2');
            $data['tt2'] = 1;
        } else {
            $data['tt2'] = 0;
        }
        if ($this->input->post('tt3') == 1) {
            echo $this->input->post('tt3');
            $data['tt3'] = 1;
        } else {
            $data['tt3'] = 0;
        }
        if ($this->input->post('tt4') == 1) {
            echo $this->input->post('tt4');
            $data['tt4'] = 1;
        } else {
            $data['tt4'] = 0;
        }
        if ($this->input->post('tt5') == 1) {
            echo $this->input->post('tt5');
            $data['tt5'] = 1;
        } else {
            $data['tt5'] = 0;
        }
        if ($this->input->post('tt6') == 1) {
            echo $this->input->post('tt6');
            $data['tt6'] = 1;
        } else {
            $data['tt6'] = 0;
        }
        if ($this->input->post('tt7') == 1) {
            echo $this->input->post('tt7');
            $data['tt7'] = 1;
        } else {
            $data['tt7'] = 0;
        }
        if ($this->input->post('tt8') == 1) {
            echo $this->input->post('tt8');
            $data['tt8'] = 1;
        } else {
            $data['tt8'] = 0;
        }
        if ($this->input->post('tt9') == 1) {
            echo $this->input->post('tt9');
            $data['tt9'] = 1;
        } else {
            $data['tt9'] = 0;
        }

        //send data to database
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('HomeModel');
        $this->HomeModel->setAvailability($data);
    }

}
