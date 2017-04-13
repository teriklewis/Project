<?php
// get all the data from courses
class CourseModel extends CI_Model {
    
    public function getCourses() {
        $query = $this->db->get('courses');
        return $query->result();
    }
}