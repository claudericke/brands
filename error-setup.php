<?php
require_once 'common.php';
$oSetUp = new Setup;
$oSetUp->createtables();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Brands : Software Configuration</title>
                <?php include('includes/links.php'); ?>
                </head>

                <body>
                    <div class="wrapper">
                        <?php include('includes/header.php'); ?>

                        <!-- Features List -->
                        <div class="container">
                            <div class="twelve columns">
                                <h1 class="left"><strong class="red left">Configuration</strong></h1>
                            </div>
                            <div class="row content">
                                Setup completed successfully.
                            </div>

                        </div>
                        <!-- CALL TO ACTION 1 -->
                        <div class="container">
                            <div class="row">
                                <div class="four columns">&nbsp;</div>
                                <div class="four columns center">
                                    <p class=" center">ADD YOUR BUSINESS ON OUR EVER EXPANDING LISTED INDEX</p>
                                    <p class=" center">
                                        <a href="register.html" class="register_btn">
                                            Register
                                        </a>
                                    </p>
                                </div>
                                <div class="four columns">&nbsp;</div>
                            </div>
                        </div>



                        <?php include('includes/footer.php'); ?>

                </body>

                </html>
