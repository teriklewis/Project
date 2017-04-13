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
                            <a href="HomeController"><p class="logo_top"><img src="<?php echo base_url(); ?>/theme/assets/yay.png" width="98" height="98" alt="usc logo"></a>
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
                            <li><a href="<?= site_url('EditProfileController') ?>">Edit Profile</a></li>
                            <?php if ($level == 2): ?><li><a href="<?= site_url('RequestCourseController') ?>">Request a Course</a></li><?php endif; ?>
                            <?php if ($level == 3): ?><li><a href="<?= site_url('StateAvailabilityController') ?>">State Availability</a></li><?php endif; ?>
                            <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        </ul>
                    </div> <!-- cd-panel-content -->
                </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->
            
        <div class="padded-top"><h1>Schedule Editor</h1></div>  
        
        <table>
            <caption>Courses</caption>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Lecturer</th>
                <th>Time</th>
            </tr>
            
            <?php foreach ($courses as $c): ?>
                <tr>
                    <td><?php echo $c->CourseCode . " "; ?></td>
                    <td><?php echo $c->CourseName . " "; ?></td>
                    <td><?php if ($c->cid != NULL) {echo $c->cid . " ";} else if($c->lid != NULL) {echo $c->lid . " ";} else {echo " - ";}?></td>
                    <td><?php if ($c->time != NULL) {echo $c->time . " ";} {echo " - ";} ?></td>
                </tr>
            <?php endforeach; ?>
                
        </tbody>
    </table>
        
        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
