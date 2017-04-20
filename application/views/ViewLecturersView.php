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

                        <li><a href="<?= site_url('EditProfileController') ?>">Edit Profile</a></li>
                        <?php if ($level == 2): ?><li><a href="<?= site_url('RequestCourseController') ?>">Requests</a></li><?php endif; ?>
                        <?php if ($level == 3): ?><li><a href="<?= site_url('StateAvailabilityController') ?>">State Availability</a></li><?php endif; ?>
                        <?php if ($level > 3): ?><li><a href="<?= site_url('ScheduleEditorController') ?>">Schedule Admin Panel</a></li><?php endif; ?>
                        <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        <?php if ($level == 4): ?></br></br>
                            <h2><?php echo "Scheduler Tools"; ?></h2>
                            <li><a href="<?= site_url('ScheduleEditorController/EditSchedule') ?>">Edit Schedule</a></li>
                            <li><a href="<?= site_url('ScheduleEditorController/EditCourses') ?>">View Courses</a></li>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="padded-top"><h1>Full Time Lecturers</h1></div>     
        
        <h1><table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Min Credits</th>
                    <th>No. Credits</th>
                </tr>

                <?php foreach ($lecturer as $l): ?>
                    <tr>
                        <td><?php echo $l->id . " "; ?></td>
                        <td><?php echo $l->firstName . " " . $l->lastName; ?></td>
                        <td><?php echo $l->minCredits . " "; ?></td>
                        <td><?php echo $l->noCredits . " "; ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table></h1></br>
        
        <h1>Contract Lecturers</h1>
        
        <h1><table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Max Credits</th>
                    <th>No. Credits</th>
                </tr>

                <?php foreach ($contractlecturer as $cl): ?>
                    <tr>
                        <td><?php echo $cl->id . " "; ?></td>
                        <td><?php echo $cl->firstName . " " . $cl->lastName; ?></td>
                        <td><?php echo $cl->maxCredits . " "; ?></td>
                        <td><?php echo $cl->noCredits . " "; ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table></h1>
        
        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
    
</html>

