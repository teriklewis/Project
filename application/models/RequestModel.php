<?php

class RequestModel extends CI_Model {

    public function RequestUpdate($data) {

        $data['reqID'] = 1;
        $this->db->select('reqID');
        $this->db->from('courserequest');
        $this->db->where('reqID', $data['reqID']);
        $query = $this->db->get();
        while ($query->num_rows() > 0) {
            $data['reqID'] = $data['reqID'] + 1;
            $this->db->select('reqID');
            $this->db->from('courserequest');
            $this->db->where('reqID', $data['reqID']);
            $query = $this->db->get();
        }

        $data['status'] = "Pending Approval";
        $this->db->insert('courserequest', $data);
        echo '<script>alert("Request Submitted! Please wait up to 5 business days for your request to be processed.");</script>';
        redirect(site_url('RequestCourseController'), 'refresh');
    }

    public function getRequests() {
        $query = $this->db->get('courserequest');
        return $query->result();
    }

    public function denyRequest($reqID) {
        $this->db->select('reqID', 'status');
        $this->db->where('reqID', $reqID);
        $this->db->set('status', "Denied");
        $this->db->update('courserequest');

        echo '<script>alert("Request Denied");</script>';
        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }

    public function approveRequest($reqID) {
        $this->db->select('reqID', 'status');
        $this->db->where('reqID', $reqID);
        $this->db->set('status', "Approved");
        $this->db->update('courserequest');

//        echo '<script>alert("Request Approved");</script>';
//        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }

    public function getCourseCode($id) {
        $query = $this->db->get('courserequest');
        $request = $query->result();
        
        foreach ($request as $r) {
            if($r->reqID == $id) {
                return $r->courseCode;
            }
        }
    }

}
