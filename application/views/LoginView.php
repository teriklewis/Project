<!DOCTYPE HTML>
<html>
    <head>

        <title>Crippling Depression</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/foundation.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/normalize.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/styles.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/assets.css" />
    </head>
    
    <body>
        <h1> Login </h1>   
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
        
    </body>
    
</html>

