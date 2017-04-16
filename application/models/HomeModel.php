<?php

class HomeModel extends CI_Model {

    public function getCreditsCompleted($data) {
        $query = $this->db->get('student');
        $student = $query->result();
        
        foreach ($student as $s) {
            if($s->id == $data['id']) {
                $credits = $s->creditsCompleted;
                return $credits;
            }
        }
    }

}
