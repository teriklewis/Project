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
        <div class="top" > 
            <?php if ($level == 0): ?><li><a href="<?= site_url('LoginController') ?>">Login</a></li><?php endif; ?>
            <?php if ($level > 0): ?><li><a href="<?= site_url('LoginController/Logout') ?>">Logout</a></li><?php endif; ?>
            <h2>
                <?php if ($level > 0): ?><h1><?php echo "Welcome " . $id . "!"; ?></h1></br> 
                <?php else: ?><h1><?php echo "Welcome Guest!"; ?></h1><br> <?php endif; ?>
            </h2>
        </div>
        <h1><marquee behavior="slide" direction="left">i like tits..........................................................but i like butts more</marquee></h1>
        <img src="<?php echo base_url(); ?>/theme/assets/753.png" width="300" height="300" alt="753">
        <div class="top"><h1>GO SUCK YO MOTHA</h1></div>

<div class="example1">
<h3>PEARS!!!</h3>
</div>
    </body>
</html>