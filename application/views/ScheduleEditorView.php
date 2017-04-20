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
                        <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        <?php if ($level == 4): ?></br></br>
                            <h2><?php echo "Scheduler Tools"; ?></h2>
                            <li><a href="<?= site_url('ScheduleEditorController/EditSchedule') ?>">Edit Schedule</a></li>
                            <li><a href="<?= site_url('ScheduleEditorController/EditCourses') ?>">View Courses</a></li>
                            <li><a href="<?= site_url('ScheduleEditorController/ViewLecturers') ?>">View Lecturers</a></li>
                        <?php endif; ?>
                    </ul>
                </div> <!-- cd-panel-content -->
            </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->

        <div class="padded-top"><h1>Administrator Panel</h1></div>  
        <?php
        foreach ($state as $s) {
            $sstate = $s->state;
            $comment = $s->comment;
            $statelevel = $s->level;
        }
        ?>

        <h2>Schedule State: <?php
            echo $sstate;
            if ($sstate == "Denied") {
                if ($statelevel == 5) {
                    echo " by Dean";
                } else {
                    echo " by VPAA";
                }
                ?><h2>Reason: <?php echo $comment; ?></h2><?php
            }
            if ($sstate == "Approved"):
                ?>   
                <h2>Pending Approval from VPAA</h2>
            <?php elseif ($sstate == "Submitted"): ?>
                <h2>Pending Approval from Dean</h2>
            <?php endif; ?>

        </h2>

        <!--Level 4 - Can Submit -->
        <?php if ($level == 4):
            if($sstate == "Editing" || $sstate == "Denied"): ?>
            <?php echo form_open('ScheduleEditorController/updateState') ?>
            <h1>Submit Schedule for Approval</h1>
            <h2>Comments (if any)</h2>
            <input type="text" name="comment"/>
            <h2><input type="submit" value='Submit Schedule' name='submit'/></h2>        
            <form/> </br>
        <?php endif; endif; ?>
            
        <!--Level 5 - Can Approve -->
        <?php if ($level == 5 && $sstate == "Submitted"): ?>
            <?php echo form_open('ScheduleEditorController/updateState') ?> 
            <h1>Approve/Deny Schedule</h1>
            <h2>Comments (if any)</h2>
            <input type="text" name="comment"/>
            <h2><input type="submit" value='Approve Schedule' name='submit'/> - 
                <input type="submit" value='Deny Schedule' name='submit'/></h2>
            <form/> </br>
        <?php endif; ?>

        <!--Level 6 - Can Publish -->
        <?php if ($level == 6 && $sstate == "Approved"): ?>
            <?php echo form_open('ScheduleEditorController/updateState') ?>
            <h1>Publish/Deny Schedule</h1>
            <h2>Comments (if any)</h2>
            <input type="text" name="comment"/>
            <h2><input type="submit" value='Publish Schedule' name='submit'/> - 
                <input type="submit" value='Deny Schedule' name='submit'/></h2>
            <form/> </br>
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
