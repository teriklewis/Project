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
                        <a href="<?php echo site_url('HomeController') ?>"><p class="logo_top"><img src="<?php echo base_url(); ?>/theme/assets/yay.png" width="98" height="98" alt="library logo"></a>
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
                        <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                    </ul>
                </div> <!-- cd-panel-content -->
            </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->

        <div class="padded-top"><h1>Requests</h1></div>
        
        <?php $request = false; 
        foreach ($requests as $r) {
            if ($id == $r->id) {
                $request = true;
            }
        } 
        if ($request == true): ?>
        
        <h1><table>
                <caption>Your Requests</caption>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester</th>
                    <th>Preferences</th>
                    <th>Status</th>
                </tr>

                
                    <?php foreach ($requests as $r): ?>
                        <?php if ($id == $r->id): ?>
                    <tr>
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
                            echo " - ";
                            }
                            ?></td>
                        <td><?php echo $r->status . " "; ?></td>

                    </tr>
                    <?php endif; ?> 
                <?php endforeach; ?>

                </tbody>
            </table></h1>
        <?php else: ?> 
        <h2>You have no requests stored</h2>
        <?php endif; ?>
        </br>
        <h1> Request a Course</h1>
        <?php echo validation_errors(); ?> 
        <!--        appoints the form to the request function-->
        <?php echo form_open('RequestCourseController/request') ?>

        Course: <br/>
        <select name="courseCode">
            <option value=""> - Please select a course - </option>
            <?php foreach ($courses as $c): ?>                        
                <option value="<?php echo $c->CourseCode; ?>"><?php echo $c->CourseCode . " - " . $c->CourseName; ?></option>
            <?php endforeach; ?>
        </select></br></br>

        Semester (Optional): </br>
        <select name="semester">
            <option value ="">- No semester selected -</option>
            <option value ="1">1st Semester</option>
            <option value ="2">2nd Semester</option>
            <option value ="3">3rd Semester</option>
        </select> </br></br>

        Preferred Day/Time - Please describe (Optional): </br>
        <input type="text" name="preferences"/>
        </br>

        <input type="submit" value='Submit' name='Login'/>
        <form/>   

        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>


    </body>