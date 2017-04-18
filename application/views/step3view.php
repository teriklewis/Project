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
        <h1><table>
                <caption>Adding Course</caption>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>Preferences</th>
                    <th>Day</th>
                    <th>Time</th>
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
                        </tr>
                    <?php endif; ?> 
                <?php endforeach; ?>

                </tbody>
            </table></h1>

        
        <h1>Step 3</h1>
        <?php
        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $c4 = 0;

        foreach ($schedule as $s) {
            if ($s->classroom == "Computer Science Lab" && $s->time == $time && $s->day == $day) {
                $c1 = 1;
            }
            if ($s->classroom == "Computer Room" && $s->time == $time && $s->day == $day) {
                $c2 = 1;
            }
            if ($s->classroom == "Linux Lab" && $s->time == $time && $s->day == $day) {
                $c3 = 1;
            }
            if ($s->classroom == "New Building Computer Lab" && $s->time == $time && $s->day == $day) {
                $c4 = 1;
            }
        }
        if ($c1 == 1 && $c2 == 1 && $c3 == 1 && $c4 == 1):
            ?>
            <h2>No classrooms available. Please return to previous step and pick another time.</h2>
        <?php else: ?> 
            <?php echo form_open("ScheduleEditorController/step4?courseCode=$courseCode&semester=$semester&day=$day&reqID=$reqID&time=$time&type=request") ?>
            <h2>Select from available classrooms</h2>

            <select name="classroom">


                <?php if ($c1 == 0): ?>
                    <option value ="Computer Science Lab">Computer Science Lab</option>
                <?php endif; ?>

                <?php if ($c2 == 0): ?>
                    <option value ="Computer Room">Computer Room</option>
                <?php endif; ?>

                <?php if ($c3 == 0): ?>
                    <option value ="Linux Lab">Linux Lab</option>
                <?php endif; ?>

                <?php if ($c4 == 0): ?>
                    <option value ="New Building Computer Lab">New Building Computer Lab</option>
                <?php endif;
            endif; ?>

        </select>

        </br></br>
        <h2><input type = "submit" value = 'Next' name = 'submit'/></h2>
        <form/> </br>

        <script src = "<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>