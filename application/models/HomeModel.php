<?php

class HomeModel extends CI_Model {

    public function getCreditsCompleted($data) {
        $query = $this->db->get('student');
        $student = $query->result();

        foreach ($student as $s) {
            if ($s->id == $data['id']) {
                $credits = $s->creditsCompleted;
                return $credits;
            }
        }
    }

    public function setAvailability($data) {

        $this->db->where('id', $data['id']);
        $query = $this->db->get('availability');

        if ($query->num_rows() == 1) {
            $this->db->where('id', $data['id']);
            $this->db->set($data);
            $this->db->update('availability');
        } else {
            $this->db->where('id', $data['id']);
            $this->db->set($data);
            $this->db->insert('availability');
        }
        echo '<script>alert("Your availability has been updated!");</script>';
        redirect(site_url('HomeController'), 'refresh');
    }
    
    public function getSchedule($semester) {
        $query = $this->db->get("$semester");
        return $query->result();
    }
    
    public function getCoursesLectured() { 
        $query = $this->db->get('courseslectured');
        return $query->result();
    }
    
    public function getContractLecturers() {
        $query = $this->db->get('contractlecturers');
        return $query->result();
    }
    
    public function getLecturers() { 
        $query = $this->db->get('lecturers');
        return $query->result();
    }
    
    public function getAvailability() { 
        //gets availability of contract lecturers
        $query = $this->db->get('availability');
        return $query->result();
    }

}
