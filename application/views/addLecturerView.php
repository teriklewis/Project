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

        <div class="padded-top"><h1>Choose a Lecturer</br></h1></div>
            <h1><table>
                    <caption>For Course</caption>
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
                </tbody>
            </table></h1>

        <?php echo form_open("ScheduleEditorController/addLecturer2?CourseCode=$CourseCode&semester=$semester&day=$day&time=$time&classroom=$classroom") ?>
        <h2>Select the lecturer</h2>

        <select name="lecturerID">
            <option value ="TBA">To be announced</option>
            <?php
            foreach ($coursesLectured as $c):
                if ($c->courseCode == $CourseCode) :

                    if ($c->cid != NULL) {
                        $busy = false;

                        //if the sum of the course's credits and their current credits is less than their max creidts
                        foreach ($contractLecturer as $cl) {
                            if($cl->id == $c->cid) {
                                if($cl->noCredits >= $cl->maxCredits) {
                                    $busy = true;
                                }
                            }
                            
                        }
                            foreach ($schedule as $s) {
                                if ($s->lecturerID == $c->cid && $s->time == $time && $s->day == $day) {
                                    $busy = true;
                                }
                                switch ($time) {
                                    //period 1
                                    case "8:00":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw1 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt1 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw1 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt1 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } else {//thirdsem
                                                    if ($day == "mw") {
                                                        if ($a->tsmw1 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->tstt1 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;
                                    //period 2 
                                    case "9:25":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw2 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt2 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw2 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt2 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    case "10:40":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($day == "mw") {
                                                    if ($a->tsmw2 == 0) {
                                                        $busy = true;
                                                    }
                                                } else {
                                                    if ($a->tstt2 == 0) {
                                                        $busy = true;
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 3
                                    case "10:50":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw3 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt3 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw3 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt3 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    case "1:20":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($day == "mw") {
                                                    if ($a->tsmw3 == 0) {
                                                        $busy = true;
                                                    }
                                                } else {
                                                    if ($a->tstt3 == 0) {
                                                        $busy = true;
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 4 
                                    case "12:15":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw4 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt4 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw4 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt4 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    case "4:00":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($day == "mw") {
                                                    if ($a->tsmw4 == 0) {
                                                        $busy = true;
                                                    }
                                                } else {
                                                    if ($a->tstt4 == 0) {
                                                        $busy = true;
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 5 
                                    case "1:40":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw5 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt5 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw5 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt5 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    case "6:40":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($day == "mw") {
                                                    if ($a->tsmw5 == 0) {
                                                        $busy = true;
                                                    }
                                                } else {
                                                    if ($a->tstt5 == 0) {
                                                        $busy = true;
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 6
                                    case "3:05":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw6 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt6 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw6 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt6 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 7
                                    case "4:30":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw7 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt7 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw7 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt7 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 8
                                    case "5:55":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw8 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt8 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw8 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt8 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;

                                    //period 9s
                                    case "7:20":
                                        foreach ($availability as $a) {
                                            if ($a->id == $c->cid) {
                                                if ($semester == "firstsem") {
                                                    if ($day == "mw") {
                                                        if ($a->fsmw9 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->fstt9 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                } elseif ($semester == "secondsem") {
                                                    if ($day == "mw") {
                                                        if ($a->ssmw9 == 0) {
                                                            $busy = true;
                                                        }
                                                    } else {
                                                        if ($a->sstt9 == 0) {
                                                            $busy = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        break;
                                }
                            }
                            if ($busy == false) {
                                foreach ($contractLecturer as $cl) {
                                    if ($c->cid == $cl->id) {
                                        $lecturerfn = $cl->firstName;
                                        $lecturerln = $cl->lastName;
                                    }
                                }
                                ?><option value ="<?php echo $c->cid;
                                ?>"><?php
                                        echo $lecturerfn . " " . $lecturerln;
                                        if ($c->preferred == 1) {
                                            echo " (Recommended)";
                                        }
                                        ?></option>
                                    <?php
                            }
                    } else {
                        $busy = false;
                        foreach ($schedule as $s) {
                            if ($s->lecturerID == $c->lid && $s->time == $time && $s->day == $day) {
                                $busy = true;
                            }
                        }
                        if ($busy == false) {
                            foreach ($lecturer as $l) {
                                if ($c->lid == $l->id) {
                                    $lecturerfn = $l->firstName;
                                    $lecturerln = $l->lastName;
                                }
                            }
                            ?><option value ="<?php echo $c->lid;
                            ?>"><?php
                                    echo $lecturerfn . " " . $lecturerln;
                                    if ($c->preferred == 1) {
                                        echo " (Recommended)";
                                    }
                                    ?></option>
                                <?php
                        }
                    }
                endif;
            endforeach;
            ?>

        </select>

    </select> </br></br>
    <h2><input type="submit" value='Add Lecturer' name='submit'/></h2>
    <form/> </br>
    <h2><?php echo $busy; ?> </h2>

    <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>