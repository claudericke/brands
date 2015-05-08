<?php
require_once 'common.php';
$oSetUp = new Setup;
$oSetUp->createtables();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Software Configuration</title>
        <meta name="msapplication-TileColor" content="#5bc0de" />
        <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
        <link rel="shortcut icon" href="assets/img/favicon.png" >
        <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/lib/magic/magic.css">
        <link rel="stylesheet" href="assets/lib/Font-Awesome/css/font-awesome.css" />
    </head>
    <body class="error">
        <div class="container">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <div class="logo">
                    <h1>Installing Software</h1>
                </div>
                <p class="lead text-muted">
                    <?php
                    if ($oSetUp->hasErrors()) {
                        $aErrors = $oSetUp->geterrors();
                        echo "<ul style='color:#F20000'>Below are the errors that occured while setting up.";
                        foreach ($aErrors as $sError) {
                            echo "<li>$sError</li>";
                        }
                        echo "</ul>";
                    } else {
                        ?>
                        Software installation is complete
                        <?php
                    }
                    ?>
                </p>
                <div class="clearfix"></div>
            </div><!-- /.col-lg-8 col-offset-2 -->
        </div>
    </body>
</html>
