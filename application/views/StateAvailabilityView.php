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
                            <h1><?php echo "Welcome ";?></br> </h1>
                            <h2><?php echo $name; ?></h2>
                            <h2><?php echo "ID: " . $id; ?></h2></br>
                            
                            <li><a href="<?= site_url('HomeController') ?>">Home</a></li>
                            <li><a href="<?= site_url('EditProfileController') ?>">Edit Profile</a></li>
                            <li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li>
                        </ul>
                    </div> <!-- cd-panel-content -->
                </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->
        
        <div class="padded-top"><h1>State Availability</h1></div>
        
        <h3>Please select times when you will be available.
            <br>
            Note that if you have selected times in the past,
        you will need to reselect them, else they will be considered as not available.</h3>
        
        <br>
        
        <form action="StateAvailabilityController/StateAvailability" method="post">
        <h2>First Semester</h2>
        <h1><table style="width:25%">
  <tr>
    <th>Time</th>
    <th>Monday | Wednesday</th> 
    <th>Tuesday | Thursday</th>
  </tr>
  <tr>
    <td>8:00</td>
    <td><center><input type="checkbox" name="fsmw1" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt1" value="1"> <br> <center/> </td>
  </tr>
  <tr>
    <td>9:25</td>
    <td><center><input type="checkbox" name="fsmw2" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt2" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>10:50</td>
     <td><center><input type="checkbox" name="fsmw3" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt3" value="1"> <br> <center/> </td>
  </tr>
  <tr>
  	<td>12:15</td>
     <td><center><input type="checkbox" name="fsmw4" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt4" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>1:40</td>
     <td><center><input type="checkbox" name="fsmw5" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt5" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>3:05</td>
     <td><center><input type="checkbox" name="fsmw6" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt6" value="1"> <br> <center/> </td>
  </tr>
  <tr>
  <td>4:30</td>
     <td><center><input type="checkbox" name="fsmw7" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt7" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>5:55</td>
     <td><center><input type="checkbox" name="fsmw8" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt8" value="1"> <br> <center/> </td>
  <tr>
     <td>7:20</td>
   <td><center><input type="checkbox" name="fsmw9" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="fstt9" value="1"> <br> <center/> </td>
  </tr>
  
  
  </table></h1></br>
           
        <h2>Second Semester</h2>      
  <h1><table style="width:25%">
  <tr>
    <th>Time</th>
    <th>Monday | Wednesday</th> 
    <th>Tuesday | Thursday</th>
  </tr>
  <tr>
    <td>8:00</td>
    <td><center><input type="checkbox" name="ssmw1" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt1" value="1"> <br> <center/> </td>
  </tr>
  <tr>
    <td>9:25</td>
    <td><center><input type="checkbox" name="ssmw2" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt2" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>10:50</td>
     <td><center><input type="checkbox" name="ssmw3" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt3" value="1"> <br> <center/> </td>
  </tr>
  <tr>
  	<td>12:15</td>
     <td><center><input type="checkbox" name="ssmw4" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt4" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>1:40</td>
     <td><center><input type="checkbox" name="ssmw5" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt5" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>3:05</td>
     <td><center><input type="checkbox" name="ssmw6" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt6" value="1"> <br> <center/> </td>
  </tr>
  <tr>
  <td>4:30</td>
     <td><center><input type="checkbox" name="ssmw7" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt7" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>5:55</td>
     <td><center><input type="checkbox" name="ssmw8" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt8" value="1"> <br> <center/> </td>
  <tr>
     <td>7:20</td>
   <td><center><input type="checkbox" name="ssmw9" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="sstt9" value="1"> <br> <center/> </td>
  </tr>
  
  
  </table></h1> </br>
  <h2>Third Semester</h2>
         <h1><table style="width:25%">
  <tr>
    <th>Time</th>
    <th>Monday | Wednesday</th> 
    <th>Tuesday | Thursday</th>
  </tr>
  <tr>
    <td>8:00</td>
    <td><center><input type="checkbox" name="tsmw1" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="tstt1" value="1"> <br> <center/> </td>
  </tr>
  <tr>
    <td>10:40</td>
    <td><center><input type="checkbox" name="tsmw2" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="tstt2" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>1:20</td>
     <td><center><input type="checkbox" name="tsmw3" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="tstt3" value="1"> <br> <center/> </td>
  </tr>
  <tr>
  	<td>4:00</td>
     <td><center><input type="checkbox" name="tsmw4" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="tstt4" value="1"> <br> <center/> </td>
  </tr>
  <tr>
     <td>6:40</td>
     <td><center><input type="checkbox" name="tsmw5" value="1"> <br> <center/> </td>
    <td><center><input type="checkbox" name="tstt5" value="1"> <br> <center/> </td>
  </tr> 

  </table> </h1>
            
            
  <h2><input type="submit" value="Submit"></h2>
        </form>
        
        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
        
        
    </body>