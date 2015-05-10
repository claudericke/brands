<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Brands App <?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../css/normalize.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/skeleton.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../css/animate.css"/>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700,300,400' rel='stylesheet' type='text/css'/>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.pngFix.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row header">
                    <div class="eight columns"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" /></div>
                    <div class="two columns "><a href="settings.html" class="settings_btn">Settings</a> </div>
                    <div class="two columns "><a href="/control/login/logout" class="login_btn">Log Off</a></div>
                </div>

                <div class="row">
                    <div class="three columns sidebar">
                        <ul class="user_profile">
                            <li class="user_image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/user.png" /></li>
                            <li>
                                <p class="welcome">Welcome</p>
                                <p class="user" >Barclays Bank</p>
                            </li>
                        </ul>
                        <nav>
                            <div id="acdnmenu" class="">
                                <ul class="nav accordion">
                                    <li id="v_hm" class="menu_item dash_icon"><a href="#">Dashboard</a>
                                    </li>
                                    <li id="v_hm" class="menu_item settings_icon"><a href="#">Settings</a>
                                    </li>
                                    <li id="v_hm" class="menu_item mybusiness_icon"><a href="#">My Business</a>
                                        <ul class="sub-menu">
                                            <li ><a href="/control/site/profile">Profile</a>
                                            </li>
                                            <li><a href="#">Products</a>
                                            </li>
                                            <li><a href="#">Services</a>
                                            </li>
                                            <li><a href="#">Vacancies</a>
                                            </li>
                                            <li><a href="#">Promotions</a>
                                            </li>
                                            <li><a href="#">Qoutations</a>
                                            </li>
                                            <li><a href="#">Management</a>
                                            </li>
                                            <li><a href="#">Calendar</a>
                                            </li>
                                            <li><a href="#">Events</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li id="v_hm" class="menu_item stats_icon"><a href="#">Statistics</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="nine columns main">
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
