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
                            <li><a href="<?= site_url('ScheduleEditorController/EditSchedule') ?>">Edit Schedule</a></li>
                        <?php endif; ?>
                    </ul>
                </div> <!-- cd-panel-content -->
            </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->

        <div class="padded-top"><h1>Add a Course<?php echo " - " . $semester; ?></h1></div>  

        <h1><table>
                <tr>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Add</th>
                </tr>
                <?php
                $csl = "Computer Science Lab";
                $cr = "Computer Room";
                $ll = "Linux Lab";
                $nbcl = "New Building Computer Lab";
                ?>
                <?php foreach ($courses as $c): 
                    $exists = false;
                    ?>
                    <?php
                    foreach ($schedule as $s):
                        if($c->CourseCode == $s->CourseCode) {
                            $exists = true;
                        }
                    endforeach;
                    ?>
                    <?php if($exists == false): ?>
                    <tr>
                        <td><?php echo $c->CourseCode . " "; ?></td>
                        <td><?php echo $c->CourseName . " "; ?></td>
                        <td><a href="<?= site_url("ScheduleEditorController/addCourse2?&time=$time&day=$day&classroom=$classroom&semester=$semester&CourseCode=$c->CourseCode&CourseName=$c->CourseName") ?>">Add</a></td>
                    </tr>
                    <?php endif; ?>
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
