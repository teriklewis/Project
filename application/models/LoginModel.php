<?php

class LoginModel extends CI_Model {

    public function login($id, $pass) {
        $this->db->select('id', 'password'); //reading from the columns "username" and "password"
        $this->db->from('logininfo'); //reading from the login table
        $this->db->where('id', $id); //check if username in the database matches the username provided
        $this->db->where('password', sha1($pass)); //check if password matches

        $query = $this->db->get(); //get all the results from the database given the conditions

        if ($query->num_rows() == 1) {//if the username and password matches a row in the database
            return true;
        } else {
            return false;
        }
    }

    public function checkLevel($id) {
        //function to find level of user
        //read entire login table
        $query = $this->db->get('logininfo');
        //gives login the results from the query as objects per row
        $login = $query->result();
        //for each row object
        foreach ($login as $r) {
            //if the username matches the one inputted
            if ($r->id == $id) {
                //get the value of their level and store it in level
                $level = $r->level;
                return $level;
            }
        }
    }

    public function changePassword($id, $newPass) {
        $this->db->where('id', $id);
        $this->db->set('password', sha1($newPass));
        $this->db->update('logininfo');
        echo '<script>alert("Password Successfully Changed!");</script>';
        redirect(site_url('EditProfileController'), 'refresh');
    }

    public function getName($id) {

        if ($this->checkLevel($id) == 1) {
            //get name from lecturer table
            $query = $this->db->get('lecturers');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $name = $r->firstName . " " . $r->lastName;
                    return $name;
                }
            }
        } else if ($this->checkLevel($id) == 2) {
            //get name from student table
            $query = $this->db->get('student');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $name = $r->firstName . " " . $r->lastName;
                    return $name;
                }
            }
        } else if ($this->checkLevel($id) == 3) {
            //get name from contract lecturer table
            $query = $this->db->get('contractlecturers');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $name = $r->firstName . " " . $r->lastName;
                    return $name;
                }
            }
        } else {
            //get name from admin table
            $query = $this->db->get('admin');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $name = $r->firstName . " " . $r->lastName;
                    return $name;
                }
            }
        }
    }

    public function getNoCredits($id, $level) {
        if ($level == 1) {
            //lecturer
            $query = $this->db->get('contractlecturers');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $noCredits = $r->noCredits;
                    return $noCredits;
                }
            }
        }
        //
        if ($level == 3) {
            //lecturer
            $query = $this->db->get('lecturers');
            $login = $query->result();

            foreach ($login as $r) {
                if ($r->id == $id) {
                    $noCredits = $r->noCredits;
                    return $noCredits;
                }
            }
        }
    }

}
