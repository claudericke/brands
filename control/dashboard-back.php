<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Brands App Dashboard</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="../css/normalize.css"/>
        <link rel="stylesheet" href="css/skeleton.css"/>
        <link rel="stylesheet" href="../css/animate.css"/>
        <link rel="stylesheet" href="css/menu.css"/>
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700,300,400' rel='stylesheet' type='text/css'>-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.pngFix.js"></script>
        <script src="js/modernizr.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row header">
                    <div class="eight columns"><img src="images/logo.png" /></div>
                    <div class="two columns "><a href="settings.html" class="settings_btn">Settings</a> </div>
                    <div class="two columns "><a href="login-back.html" class="login_btn">Log Off</a></div>
                </div>

                <div class="row">
                    <div class="three columns sidebar">
                        <ul class="user_profile">
                            <li class="user_image"><img src="images/user.png" /></li>
                            <li>
                                <p class="welcome">Welcome</p>
                                <p class="user" >Barclays Bank</p>
                            </li>
                        </ul>

                        <nav>
                            <!-- <div id="acdnmenu">
                                <ul class="nav">
                                    <li class="menu_item dash_icon"><a href="#">Dashboard</a></li>
                                    <li class="menu_item settings_icon"><a href="#">Settings</a></li>
                                    <li class="menu_item mybusiness_icon"><a href="#">My Business</a></li>
                                    <li class="menu_item stats_icon"><a href="#">Statistics</a></li>
                                    <li class="menu_item messages_icon"><a href="#">Messages</a></li>
                                </ul>
                            </div>
                        </nav> !-->
                            <div id="acdnmenu" class="">
                                <ul class="nav accordion">
                                    <li id="v_hm" class="menu_item dash_icon"><a href="#">Dashboard</a>
                                    </li>
                                    <li id="v_hm" class="menu_item settings_icon"><a href="#">Settings</a>
                                    </li>
                                    <li id="v_hm" class="menu_item mybusiness_icon"><a href="#">My Business</a>
                                        <ul class="sub-menu">
                                            <li ><a href="#">Profile</a>
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
