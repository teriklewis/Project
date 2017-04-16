<?php

class RequestModel extends CI_Model {

    public function RequestUpdate($data) {

        $data['status'] = "Pending Approval";
        $this->db->insert('courserequest', $data);
        echo '<script>alert("Request Submitted! Please wait up to 2 business days for your request to be processed.");</script>';
        redirect(site_url('RequestCourseController'), 'refresh');
    }

}
