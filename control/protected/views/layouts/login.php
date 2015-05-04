<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Brands App Control Panel Log In</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../css/normalize.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/skeleton.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../css/animate.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700,300,400' rel='stylesheet' type='text/css'/>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.pngFix.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row login_container">
                    <div class="offset-by-four five columns center">
                        <div class="login">
                            <p class="center"><a href="../index.html"><img  src="images/logo_icon.png" alt="" /></a></p>
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>

                <div class="offset-by-four five columns">
                    <p class="center small">©2001–<?php echo date("Y"); ?> All Rights Reserved. Brands ® is a registered trademark of Massive Dynamics. <br />
                        <a href="../terms.html">Privacy and Terms</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
