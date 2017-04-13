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
                            <a href="HomeController"><p class="logo_top"><img src="<?php echo base_url(); ?>/theme/assets/yay.png" width="98" height="98" alt="library logo"></a>
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
                            <h1><?php echo "Welcome " . $id . "!"; ?></h1></br> 
                            <li><a href="<?= site_url('HomeController') ?>">Home</a></li>
                            <?php if ($level == 2): ?><li><a href="<?= site_url('RequestCourseController') ?>">Request a Course</a></li><?php endif; ?>
                            <?php if ($level == 3): ?><li><a href="<?= site_url('StateAvailabilityController') ?>">State Availability</a></li><?php endif; ?>
                            <?php if ($level > 3): ?><li><a href="<?= site_url('ScheduleEditorController') ?>">Schedule Editor</a></li><?php endif; ?>
                            <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        </ul>
                    </div> <!-- cd-panel-content -->
                </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->
        
      <!--  <div class="padded-top"><h1>Edit Profile</h1></div> -->
        
        <div class="padded-top"><h1> Change Password </h1>

        <?php echo validation_errors(); ?> 
        <?php echo form_open('EditProfileController/ChangePassword') ?>

        Current Password: 
        <input type="password" name="password"/>

        New Password:
        <input type="password" name='newPassword'/>
        Confirm New Password:
        <input type="password" name='confNewPassword'/>

        <input type="submit" value='Submit' name='submit'/>
        <form/>  
        
        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
        
        
    </body>