<?php
require_once 'common.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Brands App- Account Activation</title>
            <?php include('includes/links.php'); ?>
    </head>

    <body>
        <div class="wrapper">
            <?php include('includes/header.php'); ?>
            <!-- Features List -->
            <div class="container">

                <div class="row content">

                    <div class="twelve columns">
                        <h1 class="left">ACCOUNT<strong class="red left"> ACTIVATION</strong></h1>
                        <?php UserData::accountActivation(); ?>
                        <br style="clear: both"/>
                        <br style="clear: both"/>
                        <br style="clear: both"/>
                        <br style="clear: both"/>
                        <br style="clear: both"/>
                    </div>
                </div>

            </div>

            <?php include('includes/footer.php'); ?>
        </div>
    </body>

</html>
