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
                    </tr>
                    <?php endif; ?> 
                <?php endforeach; ?>

                </tbody>
            </table></h1>
        
            <?php echo form_open("ScheduleEditorController/step3?courseCode=$courseCode&semester=$semester&day=$day&reqID=$reqID") ?>
            <h1>Step 2</h1>
            <h2>Select the time</h2>
            
            <select name="time">
            <option value ="8:00">8:00</option>
            <option value ="9:25">9:25</option>
            <option value ="10:50">10:50</option>
            <option value ="12:15">12:15</option>
            <option value ="1:40">1:40</option>
            <option value ="3:05">3:05</option>
            <option value ="4:30">4:30</option>
            <option value ="5:55">5:55</option>
            <option value ="7:20">7:20</option>
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