<?php
require_once 'common.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Brands App- Error! <?php echo $_GET['errorCode']; ?></title>
                <?php include('includes/links.php'); ?>
                </head>

                <body>
                    <div class="wrapper">
                        <?php include('includes/header.php'); ?>

                        <!-- Features List -->
                        <div class="container">
                            <div class="twelve columns">
                                <h1 class="left"><strong class="red left"> Error! <?php echo $_GET['errorCode']; ?></strong></h1>
                            </div>
                            <div class="row content">
                                <?php Errors::getErrorDescription($_GET['errorCode']); ?>

                                <?php echo $_GET["message"] ?>
                            </div>

                        </div>
                                <div class="four columns">&nbsp;</div>
                            </div>
                        </div>



                        <?php include('includes/footer.php'); ?>

                </body>

                </html>
