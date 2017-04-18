<!DOCTYPE HTML>
<html>
    <head>
        <title>Class Scheduler</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/foundation.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/normalize.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/styles.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/assets.css" />
    </head>

    <body>

        <main class="cd-main-content">
            <header id="aminbar_header" class="aminbar_header fixed bar_top bx_dkgreen cd-header">
                <div class="row fullrow">
                    <div class="large-9 medium-6 small-6 columns ">
                        <a href="<?php echo site_url('HomeController') ?>"><p class="logo_top"><img src="<?php echo base_url(); ?>/theme/assets/yay.png" width="98" height="98" alt="usc logo"></a>
                    </div> <!--box-->
                    <div class="large-1 medium-2 small-2 columns bx_ltgreen">
                        <ul class="mnu_top">
                            <li class="text-center"><a href="#0" class="cd-btn"><img src="<?php echo base_url(); ?>/theme/assets/library_menu.png" alt="menu icon"></a></li>
                            <li class="text-center txt_lgreen show-for-medium-up">Site <br>menu</li>
                        </ul>       
                    </div> <!--box-->
                </div> <!--row-->
            </header>
        </main> 

        <div class="cd-panel from-right">
            <header class="cd-panel-header">
                <h6>MENU</h6>
                <a href="#0" class="cd-panel-close">Close</a>
            </header>
            <div class="cd-panel-container">
                <div class="cd-panel-content">
                    <ul>
                        <h1><?php echo "Welcome "; ?></br> </h1>
                        <h2><?php echo $name; ?></h2>
                        <h2><?php echo "ID: " . $id; ?></h2></br> 

                        <li><a href="<?= site_url('HomeController') ?>">Home</a></li>
                        <li><a href="<?= site_url('EditProfileController') ?>">Edit Profile</a></li>
                        <?php if ($level == 2): ?><li><a href="<?= site_url('RequestCourseController') ?>">Request a Course</a></li><?php endif; ?>
                        <?php if ($level > 3): ?><li><a href="<?= site_url('ScheduleEditorController') ?>">Schedule Admin Panel</a></li><?php endif; ?>
                        <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        <?php if ($level == 4): ?></br></br>
                            <h2><?php echo "Scheduler Tools"; ?></h2>
                            <li><a href="<?= site_url('ScheduleEditorController/EditCourses') ?>">View Courses</a></li>
                            <li><a href="<?= site_url('ScheduleEditorController/ViewLecturers') ?>">View Lecturers</a></li>
                        <?php endif; ?>
                    </ul>
                </div> <!-- cd-panel-content -->
            </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->  

        <div class="padded-top">
            <h1><table>
                <caption>Course Requests</caption>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Preferred Semester</th>
                    <th>Preferences</th>
                    <th>Student ID</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Approve</th>
                    <th>Deny</th>
                </tr>

                <?php foreach ($requests as $r): ?>
                    <tr <?php if ($r->priority == 1 && $r->status =="Pending Approval"): ?> bgcolor="#F98"<?php endif; ?> >
                        <td><?php echo $r->courseCode . " "; ?></td>
                        <td><?php echo $r->courseName . " "; ?></td>
                        <td><?php
                            if ($r->semester != NULL) {
                                echo $r->semester . " ";
                            } else {
                                echo " - ";
                            }
                            ?></td>
                        <td><?php
                            if ($r->preferences != NULL) {
                                echo $r->preferences . " ";
                            } else {
                                echo " - "; //it would be nice to center this dash
                            }
                            ?></td>
                        <td><?php echo $r->id . " "; ?></td>
                        <td><?php echo $r->priority . " "; ?></td>
                        <td><?php echo $r->status . " "; ?></td>

                        <!--it would also be nice to center the possible dashes here as well.-->
                        <td><?php if ($r->status == "Pending Approval"): ?><a href="<?= site_url("ScheduleEditorController/ApproveRequest?id=$r->reqID") ?>">Approve<?php else : ?>-<?php endif; ?></a></td>
                        <td><?php if ($r->status == "Pending Approval"): ?><a href="<?= site_url("ScheduleEditorController/DenyRequest?id=$r->reqID") ?>">Deny<?php else : ?>-<?php endif; ?></a></td>

                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table></h1>
    </div>
    </br>
    <h1>Edit Schedule</h1>

    <?php if ($semester == "unselected"): ?>
        <h2>Select a semester to view the schedule</h2>
    <?php endif; ?>

    <?php if ($semester == ""): ?>
        <h2>No semester selected. Please select a semester and try again.</h2>
    <?php endif; ?>

    <?php echo form_open('ScheduleEditorController/viewEditSchedule') ?>

    <select name="semester">
        <option value = "" > - No semester selected -</option>
        <option value ="firstsem">1st Semester</option>
        <option value ="secondsem">2nd Semester</option>
        <option value ="thirdsem">3rd Semester</option>
    </select> </br></br>
    <h2><input type="submit" value='Go' name='submit'/></h2>
    <form/> </br>

    <?php
    $csl = "Computer Science Lab";
    $cr = "Computer Room";
    $ll = "Linux Lab";
    $nbcl = "New Building Computer Lab";
    ?>
    <?php if ($semester != "unselected" && $semester != ""): ?>

        <?php if ($semester != "thirdsem"): ?>
            <h1><caption>Schedule</caption>
                <table> 
                    <tr>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Monday/Wednesday</th> 
                        <th>Tuesday/Thursday</th>
                    </tr>
                    <tr>
                        <td>8:00</td>
                        <th>all labs</th>
                        <td>free</td>
                        <td>free</td>

                    </tr>

                    <tr>
                        <td>9:25</td>
                        <th>all labs</th>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <td>10:50</td>
                        <th>all labs</th>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <td>12:15</td>
                        <th>all labs</th>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <td>1:40</td>
                        <th>all labs</th>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <td>3:05</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td>chapel</br></br></br>chapel</br></br></br>chapel</br></br></br>chapel</td> <!--Monday/Wednesday Block -->

                        <td> <!--Tuesday/Thursday Block
                            <!--Computer Science Lab-->

                            <?php $tt305cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "3:05" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt305cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?> </br>

                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=3:05&CourseName=$s->CourseName&day=tt&classroom=$csl&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>

                                <?php endif; ?> 
                            <?php endforeach; ?>

                            <?php if ($tt305cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?time=3:05&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt305cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "3:05" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt305cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>

                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=3:05&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>

                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt305cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=3:05&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt305ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "3:05" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt305ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=3:05&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>

                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt305ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=3:05&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt305nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "3:05" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt305nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>

                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=3:05&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>

                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt305nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=3:05&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4:30</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw430cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw430cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw430cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw430cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw430cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw430cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw430ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw430ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw430ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw430nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw430nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw430nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt430cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt430cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt430cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt430cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt430cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt430cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt430ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt430ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt430ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt430nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:30" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt430nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:30&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt430nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:30&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>5:55</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw555cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw555cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw555cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw555cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw555cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw555cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw555ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw555ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw555ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw555nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw555nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw555nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt555cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt555cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt555cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt555cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt555cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt555cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt555ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt555ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt555ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt555nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "5:55" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt555nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=5:55&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt555nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=5:55&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>7:20</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw720cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw720cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw720cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw720cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw720cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw720cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw720ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw720ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw720ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw720nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw720nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw720nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt720cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt720cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt720cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                            <!--Computer Room-->
                            <?php $tt720cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt720cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt720cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt720ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt720ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt720ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt720nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "7:20" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt720nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=7:20&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt720nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=7:20&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>

                </table></h1>

        <?php else: ?>

            <h1><caption>Schedule</caption>
                <table> 
                    <tr>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Monday/Wednesday</th> 
                        <th>Tuesday/Thursday</th>
                    </tr>
                    <tr>
                        <td>8:00</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw800cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw800cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw800cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw800cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw800cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw800cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw800ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw800ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw800ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw800nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw800nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw800nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt800cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt800cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt800cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                            <!--Computer Room-->
                            <?php $tt800cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt800cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt800cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt800ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt800ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt800ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt800nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "8:00" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt800nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=8:00&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt800nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=8:00&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>10:40</td>
                        <th>Computer Science Lab</br></br>Computer Room</br></br>Linux Lab</br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw1040cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw1040cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw1040cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw1040cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw1040cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw1040cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw1040ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw1040ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw1040ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw1040nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw1040nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw1040nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt1040cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt1040cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt1040cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt1040cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt1040cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt1040cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt1040ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt1040ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt1040ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt1040nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "10:40" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt1040nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=10:40&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt1040nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=10:40&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    <tr>
                        <td>1:20</td>
                        <th>Computer Science Lab</br></br>Computer Room</br></br>Linux Lab</br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw120cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw120cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw120cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw120cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw120cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw120cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw120ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw120ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw120ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw120nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw120nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw120nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt120cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt120cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt120cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt120cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt120cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt120cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt120ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt120ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt120ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt120nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "1:20" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt120nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=1:20&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt120nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=1:20&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>4:00</td>
                        <th>Computer Science Lab</br></br></br>Computer Room</br></br></br>Linux Lab</br></br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw400cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw400cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw400cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw400cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw400cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw400cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw400ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw400ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw400ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw400nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw400nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw400nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt400cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt400cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt400cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt400cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt400cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt400cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt400ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt400ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt400ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt400nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "4:00" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt400nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=4:00&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt400nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=4:00&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>6:40</td>
                        <th>Computer Science Lab</br></br>Computer Room</br></br>Linux Lab</br></br>New Building Computer Lab</th>
                        <td> <!--Monday/Wednesday Block -->
                            <!--Computer Science Lab-->
                            <?php $mw640cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "mw" && $s->classroom == "Computer Science Lab"):
                                    $mw640cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=mw&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw640cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=mw&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $mw640cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "mw" && $s->classroom == "Computer Room"):
                                    $mw640cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=mw&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw640cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=mw&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $mw640ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "mw" && $s->classroom == "Linux Lab"):
                                    $mw640ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=mw&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw640ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=mw&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $mw640nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "mw" && $s->classroom == "New Building Computer Lab"):
                                    $mw640nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=mw&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($mw640nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=mw&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td> 

                        <td> <!--Tuesday/Thursday Block-->
                            <!--Computer Science Lab-->
                            <?php $tt640cs = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "tt" && $s->classroom == "Computer Science Lab"):
                                    $tt640cs = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=tt&classroom=$csl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt640cs == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=tt&classroom=$csl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Computer Room-->
                            <?php $tt640cr = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "tt" && $s->classroom == "Computer Room"):
                                    $tt640cr = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=tt&classroom=$cr&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt640cr == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=tt&classroom=$cr&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--Linux Lab-->
                            <?php $tt640ll = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "tt" && $s->classroom == "Linux Lab"):
                                    $tt640ll = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=tt&classroom=$ll&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt640ll == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=tt&classroom=$ll&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>

                            <!--New Building Computer Lab-->
                            <?php $tt640nb = false; ?>
                            <?php foreach ($scheduledCourse as $s): ?>                        
                                <?php
                                if ($s->time == "6:40" && $s->day == "tt" && $s->classroom == "New Building Computer Lab"):
                                    $tt640nb = true;
                                    echo $s->CourseName;
                                    ?></br>
                                    <?php echo $s->lecturerName; ?></br>
                                    <?php if($s->lecturerID == 0): ?><a href="<?= site_url("ScheduleEditorController/addLecturer?courseCode=$s->CourseCode&time=6:40&day=tt&classroom=$nbcl&CourseName=$s->CourseName&semester=$semester") ?>">Add Lecturer </a>-<?php endif;?>
                                    <a href="<?= site_url("ScheduleEditorController/deleteCourse?courseCode=$s->CourseCode&lecturerID=$s->lecturerID&semester=$semester") ?>">Delete</a></br>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($tt640nb == false): ?>
                                <a href="<?= site_url("ScheduleEditorController/addCourse1?&time=6:40&day=tt&classroom=$nbcl&semester=$semester") ?>">Add</a></br></br></br>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table></h1>
        <?php endif; ?>
    <?php endif; ?>

    <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>
