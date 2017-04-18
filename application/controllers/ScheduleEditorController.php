<?php

class ScheduleEditorController extends CI_Controller {

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            $data['name'] = $this->LoginModel->getName($data['id']);

            if ($data['level'] > 3) {

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

    public function EditSchedule() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            $data['name'] = $this->LoginModel->getName($data['id']);

            if ($data['level'] == 4) {

                $this->load->model('CourseModel');
                $data['courses'] = $this->CourseModel->getCourses();

                $this->load->model('RequestModel');
                $data['requests'] = $this->RequestModel->getRequests();
                $data['semester'] = "unselected";
                $this->load->view('EditScheduleView', $data);
            } else {
                redirect('HomeController');
            }
        } else {
            redirect('LoginController');
        }
    }

    public function viewEditSchedule() {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('LoginModel');
        $this->load->model('HomeModel');
        $this->load->model('RequestModel');
        $data['requests'] = $this->RequestModel->getRequests();
        $data['name'] = $this->LoginModel->getName($data['id']);
        $data['level'] = $this->LoginModel->checkLevel($data['id']);

        //sending $data to the HomeView and displaying the view
        $data['semester'] = $this->input->post('semester');
        if ($data['semester'] == "firstsem") {
            //get schedule for first semester
            $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
        } else if ($data['semester'] == "secondsem") {
            //get schedule for second semester 
            $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
        } else if ($data['semester'] == "thirdsem") {
            //get schedule for third semester
            $data['scheduledCourse'] = $this->HomeModel->getSchedule($data['semester']);
        }

        $this->load->view('EditScheduleView', $data);
    }

    public function EditCourses() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['id'] = $session_data;

            //load the home model to the controller
            $this->load->model('LoginModel');

            $data['level'] = $this->LoginModel->checkLevel($data['id']);
            $data['name'] = $this->LoginModel->getName($data['id']);

            if ($data['level'] == 4) {

                $this->load->model('CourseModel');
                $data['courses'] = $this->CourseModel->getCourses();

                $this->load->view('EditCoursesView', $data);
            } else {
                redirect('HomeController');
            }
        } else {
            redirect('LoginController');
        }
    }

    public function denyRequest() {
        $data['reqID'] = $this->input->get('id');
        $this->load->model('RequestModel');
        $this->RequestModel->denyRequest($data['reqID']);
    }

    public function approveRequest() {
        $data['reqID'] = $this->input->get('id');
        $this->load->model('RequestModel');

        $this->RequestModel->approveRequest($data['reqID']);

        $data['requests'] = $this->RequestModel->getRequests();
        $data['courseCode'] = $this->RequestModel->getCourseCode($data['reqID']);

        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $this->step1($data);
    }

    public function addCourse1() {
        //probably have an intermediate function that lets you pick the course, and sends the course code to this function
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;
        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $this->load->model('CourseModel');
        $data['courses'] = $this->CourseModel->getCourses();
        $data['day'] = $this->input->get('day');
        $data['time'] = $this->input->get('time');
        $data['classroom'] = $this->input->get('classroom');
        $data['semester'] = $this->input->get('semester');

        $this->load->model('HomeModel');
        $data['schedule'] = $this->HomeModel->getSchedule($data['semester']);
        $this->load->view('AddCourseView', $data);
    }

    public function addCourse2() {

        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;
        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        //get the course code you want to add
        //$data['courseCode'] = $this->input->get/post('courseCode');

        $this->load->model('CourseModel');
        $data['courseCode'] = $this->input->get('CourseCode');
        $data['CourseName'] = $this->CourseModel->getCourseName($data);
        $data['CourseCode'] = $data['courseCode'];
        $data['day'] = $this->input->get('day');
        $data['time'] = $this->input->get('time');
        $data['classroom'] = $this->input->get('classroom');
        $data['type'] = "add";
        $this->step4b($data);
    }

    public function step1($data) {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        //load the home model to the controller
        $this->load->model('LoginModel');

        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $this->load->model('CourseModel');
        $data['courseName'] = $this->CourseModel->getCourseName($data);
        $data['requests'] = $this->RequestModel->getRequests();
        $this->load->view('step1view', $data);
        //select semester
        //select day
    }

    public function step2() {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        //load the home model to the controller
        $this->load->model('LoginModel');

        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $data['courseCode'] = $this->input->get('courseCode');
        $data['semester'] = $this->input->post('semester');
        $data['day'] = $this->input->post('day');
        $data['reqID'] = $this->input->get('reqID');

        $this->load->model('RequestModel');
        $data['requests'] = $this->RequestModel->getRequests();
        $this->load->view('step2view', $data);

        //select time
    }

    public function step3() {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $data['courseCode'] = $this->input->get('courseCode');
        $data['semester'] = $this->input->get('semester');
        $data['day'] = $this->input->get('day');
        $data['reqID'] = $this->input->get('reqID');
        $data['time'] = $this->input->post('time');

        $this->load->model('RequestModel');
        $data['requests'] = $this->RequestModel->getRequests();

        $this->load->model('HomeModel');
        $data['schedule'] = $this->HomeModel->getSchedule($data['semester']);

        $this->load->view('step3view', $data);
        //select location
    }

    public function step4() {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);

        $data['courseCode'] = $this->input->get('courseCode');
        $data['semester'] = $this->input->get('semester');
        $data['day'] = $this->input->get('day');
        $data['reqID'] = $this->input->get('reqID');
        $data['time'] = $this->input->get('time');
        $data['classroom'] = $this->input->post('classroom');

        $this->load->model('RequestModel');
        $data['requests'] = $this->RequestModel->getRequests();

        $this->load->model('HomeModel');
        $data['coursesLectured'] = $this->HomeModel->getCoursesLectured();
        $data['contractLecturer'] = $this->HomeModel->getContractLecturers();
        $data['lecturer'] = $this->HomeModel->getLecturers();
        $data['schedule'] = $this->HomeModel->getSchedule($data['semester']);
        $data['availability'] = $this->HomeModel->getAvailability();

        $data['type'] = "request";
        
        $this->load->view('step4view', $data);
        //select lecturer. can be set to TBA
    }
    public function step4b($data) {
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data;

        $this->load->model('LoginModel');
        $data['level'] = $this->LoginModel->checkLevel($data['id']);
        $data['name'] = $this->LoginModel->getName($data['id']);
        $data['semester'] = $this->input->get('semester');

        $this->load->model('RequestModel');
        $data['requests'] = $this->RequestModel->getRequests();

        $this->load->model('HomeModel');
        $data['coursesLectured'] = $this->HomeModel->getCoursesLectured();
        $data['contractLecturer'] = $this->HomeModel->getContractLecturers();
        $data['lecturer'] = $this->HomeModel->getLecturers();
        $data['schedule'] = $this->HomeModel->getSchedule($data['semester']);
        $data['availability'] = $this->HomeModel->getAvailability();
        
        $this->load->view('step4view', $data);
        //select lecturer. can be set to TBA
    }

    public function step5() {

        $data['courseCode'] = $this->input->get('courseCode');
        $this->load->model('CourseModel');
        $data['CourseName'] = $this->CourseModel->getCourseName($data);
        $semester = $this->input->get('semester');
        $data['day'] = $this->input->get('day');
        $data['time'] = $this->input->get('time');
        $data['classroom'] = $this->input->get('classroom');
        $data['lecturerID'] = $this->input->post('lecturerID');

        $this->load->model('LoginModel');
        $data['lecturerName'] = $this->LoginModel->getName($data['lecturerID']);

        $credits = $this->CourseModel->getCourseCredits($data['courseCode']);
        $data['level'] = $this->LoginModel->checkLevel($data['lecturerID']);
        $noCredits = $this->LoginModel->getNoCredits($data['lecturerID'], $data['level']);
        
        $data['newNoCredits'] = $credits + $noCredits;
        
        $this->CourseModel->setNoCredits($data);
        $this->CourseModel->addCourse($data, $semester);
    }

    public function editCourse1() {
        $data['courseCode'] = $this->input->get('courseCode');
        $this->load->model('CourseModel');
        $data['CourseName'] = $this->CourseModel->getCourseName($data);
        $data['day'] = $this->input->get('day');
        $data['time'] = $this->input->get('time');
        $data['classroom'] = $this->input->get('classroom');
        $data['lecturerID'] = $this->input->get('lecturerID');
        $data['lecturerName'] = $this->input->get('lecturerName');
    }

    public function EditCourse() { //edits the time location and teachers 
        $course['ID'] = $this->input->get('ID');
        if ($this->input->post('title') != "") {
            $data['Title'] = $this->input->post('title');
        }if ($this->input->post('fname') != "") {
            $data['FirstName'] = $this->input->post('fname');
        }if ($this->input->post('time') != "") {
            $data['Time'] = $this->input->post('lname');
        }if ($this->input->post('location') != "") {
            $data['Location'] = $this->input->post('position');
        }
    }

}
