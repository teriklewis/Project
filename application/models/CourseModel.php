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
            if ($c->CourseCode == $data['courseCode']) {
                $name = $c->CourseName;
                return $name;
            }
        }
    }

    public function getCourseCredits($CourseCode) {
        $query = $this->db->get('courses');
        $courses = $query->result();

        foreach ($courses as $c) {
            if ($c->CourseCode == $CourseCode) {
                $credits = $c->credits;
                return $credits;
            }
        }
    }

    public function addCourse($data, $semester) {
        $newData = array(
            "CourseCode"   => $data['courseCode'],
            "CourseName"   => $data['CourseName'],
            "time"         => $data['time'],
            "day"          => $data['day'],
            "classroom"    => $data['classroom'],
            "lecturerID"   => $data['lecturerID'],
            "lecturerName" => $data['lecturerName']
        );
        $this->db->insert("$semester", $newData);
        
        if($data['type'] == "move") {
            echo '<script>alert("Course moved to new schedule slot.");</script>';
        } else {
            echo '<script>alert("Course addded to schedule.");</script>';
        }
        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }

    public function setNoCredits($data) {
        if ($data['level'] == 1 || $data['level'] == 4) {
            //set lecturer credits
            $this->db->where('id', $data['lecturerID']);
            $this->db->set('noCredits', $data['newNoCredits']);
            $this->db->update('lecturers');
        } else {
            //set contract lecturer credits
            $this->db->where('id', $data['lecturerID']);
            $this->db->set('noCredits', $data['newNoCredits']);
            $this->db->update('contractlecturers');
        }
    }
    
    public function removeCourse($courseCode, $semester) {
        $this->db->where('CourseCode', $courseCode);
        $this->db->delete("$semester");
        echo '<script>alert("Course Deleted!");</script>';
        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }
    
    public function removeCourse2($courseCode, $semester) {
        $this->db->where('CourseCode', $courseCode);
        $this->db->delete("$semester");
        
    }
    
    public function addLecturer($data, $semester) {  
        $this->db->where('CourseCode', $data['CourseCode']);   
        
        $this->db->set('lecturerID', $data['lecturerID']);
        $this->db->set('lecturerName', $data['lecturerName']);
        $this->db->update("$semester");
        echo '<script>alert("Lecturer Updated");</script>';
        redirect(site_url('ScheduleEditorController/EditSchedule'), 'refresh');
    }

}
