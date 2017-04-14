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
                                <li class="text-center"><a href="#0" class="cd-btn"><img src="<?php echo base_url(); ?>/theme/assets/menu_icon.png" alt="menu icon"></a></li>
                            </ul>       
                        </div> <!--box-->
                    </div> <!--row-->
                </header>
        </main> 
        
        
        <div class="cd-panel from-right">
                <header class="cd-panel-header">
                    <h6>Please Login</h6>
                    <a href="#0" class="cd-panel-close">Close</a>
                </header>
                <div class="cd-panel-container">
                    <div class="cd-panel-content">
                        <ul>
                            <h1><?php echo "Welcome Guest   !"; ?></h1></br>                            
                        </ul>
                    </div> <!-- cd-panel-content -->
                </div> <!-- cd-panel-container -->
        </div> <!-- cd-panel -->
        
        <div class="padded-top"><h1>Login</h1></div>     
        
        <?php echo validation_errors(); ?> 
        <!--        appoints the form to the checkLogin function-->
        <?php echo form_open('LoginController/checkLogin') ?>

        ID: <br/>
        <input type="text" name="id"/><br/>

        Password: <br/>
        <input type="password" name='password'/><br/>

        <input type="hidden" name="form" value="Login"/>

        <input type="submit" value='Log in' name='Login'/>
        <form/>   
        
        
        <script src="<?php echo base_url(); ?>/theme/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/scripts.js"></script>
        <script src="<?php echo base_url(); ?>/theme/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
    
</html>

