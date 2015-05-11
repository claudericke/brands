<footer>
    <div class="footer u-full-width center">
        <a class="center" href="terms">TERMS OF USE</a> | <a href="privacy">PRIVACY POLICY</a> | <a href="dup">DATA USE POLICY</a> | <a href="pages">PAGES GOVERNANCE POLICY</a>
        <p class="small uppercase center">&copy; Massive Dynamics 2015 | Designed by <a href="http://www.etcetera.co.zw" target="_blank">Et Cetera Creative</a>
        </p>
    </div>

<!-- Notication Windows -->
    <div id="notification" class="modal">
    <p>This is a notification window</p>
</div>

<div id="alert" class="modal">
    <p>This is an alert window to show something is wrong</p>
</div>
</footer>


<!-- Recaptcha Initialization -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Recaptcha Initialization End -->
<!-- Mobile Navigation -->
<script type="text/javascript">
    $('.menu nav').slicknav();


    $('#open-alert').click(function (e) {
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
    });


    $('#open-notification').click(function (e) {
        $('#notification').easyModal({
            top: 100,
            left: 0,
            autoOpen: true,
            overlayOpacity: 0.3,
            overlayColor: "#333",
            overlayClose: true,
            closeOnEscape: true,
            updateZIndexOnOpen: true
        });

            $('#open-alert').click(function (e) {
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
    });


 $(function openNotification() {
        $('#notification').easyModal({
            top: 100,
            left: 0,
            autoOpen: true,
            overlayOpacity: 0.3,
            overlayColor: "#333",
            overlayClose: true,
            closeOnEscape: true,
            updateZIndexOnOpen: true
        });
    });

$(function openAlert() {
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
    });
</script>

<!-- End Mobile Navigation -->
