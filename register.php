<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands App- Mobile Application for iOS and Symbian</title>
    <?php include( 'includes/links.php'); ?>

    <script type="text/javascript">
        $(function () {
            $("#RegistrationForm").submit(function (e) {
                e.preventDefault();
                var iFadeSpeed = 15000;
                var oCurrentForm = $(this);
                sContent = oCurrentForm.serialize();

                $.post("phpscripts/registeruser.php", sContent, function (gData) {
                    if (gData.indexOf("Successfully") > -1) {
                        oCurrentForm.empty();
                        $('#notification').easyModal({
                            top: 100,
                            left: 0,
                            autoOpen: true,
                            overlayOpacity: 0.3,
                            overlayColor: "#333",
                            overlayClose: true,
                            closeOnEscape: true,
                            updateZIndexOnOpen: true,
                            onClose: function (redirect) {
                                window.location.replace("http://brands.etcetera.co.zw");
                            }
                        });
                        $("#notification").empty().html("Registration Successful. An activate link has been sent to your email address.").show();
                    } else {
                        $('#alert').easyModal({
                            top: 100,
                            left: 0,
                            autoOpen: true,
                            overlayOpacity: 0.3,
                            overlayColor: "#333",
                            overlayClose: true,
                            closeOnEscape: true,
                            updateZIndexOnOpen: true
                        });
                        $("#alert").empty().html(gData).show();
                    }
                    $.post("phpscripts/registeruser.php", sContent, function (gData) {
                        if (gData.indexOf("Successfully") > -1) {
                            oCurrentForm.empty();
                            $('#notification').easyModal({
                                top: 100,
                                left: 0,
                                autoOpen: true,
                                overlayOpacity: 0.3,
                                overlayColor: "#333",
                                overlayClose: true,
                                closeOnEscape: true,
                                updateZIndexOnOpen: true,
                                onClose: function (redirect) {
                                    window.location.replace("http://demo.etcetera.co.zw/brands");
                                }
                            });
                            $("#notification").empty().html("Registration Successful. An activate link has been sent to your email address.").show();
                        } else {
                            $('#alert').easyModal({
                                top: 100,
                                left: 0,
                                autoOpen: true,
                                overlayOpacity: 0.3,
                                overlayColor: "#333",
                                overlayClose: true,
                                closeOnEscape: true,
                                updateZIndexOnOpen: true
                            });
                            $("#alert").empty().html(gData).show();
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <div class="wrapper">
            <?php include( 'includes/header.php'); ?>


            <!-- Terms List -->
            <div class="container">
                <div class="twelve columns">
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                    <h1 class="left large ">REGISTER<strong class="red left bold"> ON BRANDS</strong></h1>
                    <p>If you are a company that wishes to register on Brands please complete the form below. Users wanting to browse the directory can download the app from the <a href="#">Google Play App Store</a>
                    </p>
                </div>
        </div>
        </form>
        </div>




        <?php include( 'includes/footer.php'); ?>


</html>
