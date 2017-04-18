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
                        <?php endif; ?>
                    </ul>
                </div> <!-- cd-panel-content -->
            </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->  

        <div class="padded-top"><h1>Add a course</br></h1></div>
        <?php if($type == "request"): ?>
        <h1><table>
                <caption>Adding Course</caption>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>Preferences</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Classroom</th>
                </tr>
                
                <?php foreach ($requests as $r): ?>
                    <?php if ($reqID == $r->reqID): ?>
                        <tr>
                            <td><?php echo $r->courseCode . " "; ?></td>
                            <?php $courseCode = $r->courseCode; ?>
                            <td><?php echo $r->courseName . " "; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><?php
                                if ($r->preferences != NULL) {
                                    echo $r->preferences . " ";
                                } else {
                                    echo " - ";
                                }
                                ?></td>
                            <td><?php echo $day; ?></td>
                            <td><?php echo $time; ?> </td>
                            <td><?php echo $classroom ?></td>
                        </tr>
                    <?php endif; ?> 
                <?php endforeach; ?>

                </tbody>
            </table></h1>
        
        <?php elseif($type == "add"):?>
            <h1><table>
                <caption>Adding Course</caption>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester</th> 
                    <th>Day</th>
                    <th>Time</th>
                    <th>Classroom</th>
                </tr>
                <tr>
                    <td><?php echo $CourseCode; ?></td>
                    <td><?php echo $CourseName; ?></td>
                    <td><?php echo $semester; ?></td>
                    <td><?php echo $day; ?></td>
                    <td><?php echo $time; ?> </td>
                    <td><?php echo $classroom; ?></td>
                </tr>
            <?php endif; ?>
                </tbody>
                </table></h1>
        
        <?php echo form_open("ScheduleEditorController/step5?courseCode=$courseCode&semester=$semester&day=$day&time=$time&classroom=$classroom") ?>
        <?php if($type == "request"): ?><h1>Step 4</h1><?php endif; ?>
        <h2>Select the lecturer</h2>

        <select name="lecturerID">
            <option value ="TBA">To be announced</option>
            <?php
            foreach ($coursesLectured as $c):
                if ($c->courseCode == $courseCode) :
                    ?>                   
                    <option value ="<?php
                    if ($c->cid != NULL) {
                        //if lecturer set the time as available
                        //if they aren't occupied in that time
                        //if the sum of the course's credits and their current credits is less than their max creidts
                        echo $c->cid;
                        foreach ($contractLecturer as $cl) {
                            if ($c->cid == $cl->id) {
                                $lecturerfn = $cl->firstName;
                                $lecturerln = $cl->lastName;
                            }
                        }
                    } else {
                        $busy = false;
                        foreach ($schedule as $s) {
                            if ($s->lecturerID == $c->lid && $s->time == $time && $s->day == $day) {
                                $busy = true;
                                //if the lecturer isn't occupied at the time
                        } }
                            if($busy == false )
                            {
                                echo $c->lid;
                                foreach ($lecturer as $l) {
                                    if ($c->lid == $l->id) {
                                        $lecturerfn = $l->firstName;
                                        $lecturerln = $l->lastName;
                                    }
                                }
                            }
                        
                    }
                    ?>"><?php echo $lecturerfn . " " . $lecturerln;
            if ($c->preferred == 1) {
                echo " (Recommended)";
            } ?></option>
                        <?php
                        endif;
                    endforeach;
                    ?>

        </select>

    </select> </br></br>
    <h2><input type="submit" value='Go' name='submit'/></h2>
    <form/> </br>

    <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>