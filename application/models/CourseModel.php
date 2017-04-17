<?php
// get all the data from courses
class CourseModel extends CI_Model {
    
    public function getCourses() {
        $query = $this->db->get('courses');
        return $query->result();
    }
    
    public function getCourseName($data) {
        $query = $this->db->get('courses');
        $courses = $query->result();
        
        foreach ($courses as $c) {
            if($c->CourseCode == $data['courseCode']) {
                $name = $c->CourseName;
                return $name;
            }
        }
    }
    
    public function addCourse($data, $semester) {
        $this->db->insert("$semester", $data);
        echo '<script>alert("Course addded to schedule. Go suck yo motha!");</script>';
        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }
}

