<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands App- Mobile Application for iOS and Symbian</title>
    <?php include( 'includes/links.php');?>
</head>

<body>
    <div class="wrapper">
        <?php include( 'includes/header.php'); ?>

        <!-- SLIDER IMAGE FOR HOME PAGE -->
        <div class="u-full-width slider">
            <img class="mobile" src="images/slider_mobile.png" alt="" />
            <!-- START REVOLUTION SLIDER 2.1.6 -->
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev_slider_1_1" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade"> <img src="images/rev/bg1.png" alt="" />
                            <div class="tp-caption sfr" data-x="-100" data-y="15" data-speed="700" data-start="600" data-easing="Sine.easeOut"><img src="images/rev/iphone.png" alt="" />
                            </div>
                            <div class="tp-caption sfr" data-x="40" data-y="3" data-speed="500" data-start="500" data-easing="Sine.easeOut"><img src="images/rev/samsung.png" alt="" />
                            </div>

                            <div class="tp-caption fade" data-x="300" data-y="350" data-speed="500" data-start="750" data-easing="Sine.easeOut"><img src="images/rev/glasses.png" alt="" />
                            </div>
                            <div class="tp-caption te-caption sfr thin black" data-x="260" data-y="30" data-speed="500" data-start="1000" data-easing="Sine.easeOut">GET <strong class="red">ALL<br /></strong> THE INFORMATION
                                <br/> YOU NEED ON
                                <br/><strong class="red">EVERYONE<br/></strong> IN ONE PLACE
                                <br/><strong class="black">ALL THE TIME</strong>
                            </div>
                            <div class="tp-caption medium_whitebg sfr" data-x="0" data-y="176" data-speed="500" data-start="2500" data-easing="Sine.easeOut"></div>
                            <div class="tp-caption sfr" data-x="400" data-y="300" data-speed="500" data-start="600" data-easing="Sine.easeOut"><img src="images/rev/mug.png" alt="" />
                            </div>
                            <div class="tp-caption sft" data-x="700" data-y="80" data-speed="500" data-start="2000" data-easing="Sine.easeOut"><img src="images/rev/comingsoon.png" alt="" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- END REVOLUTION SLIDER -->
    </div>
    <!-- END SLIDER IMAGE FOR HOME PAGE -->

    <!-- CALL TO ACTION 1 -->
    <div class="container">


        <div class="row">
            <div class="four columns">&nbsp;</div>
            <div class="four columns center">
                <p class=" center">ADD YOUR BUSINESS ON OUR EVER EXPANDING LISTED INDEX</p>
                <p class=" center"><a href="register.html" class="register_btn">Register</a>
                </p>
            </div>
            <div class="four columns">&nbsp;</div>
        </div>
    </div>

    <!-- Hero Unit -->
    <div class="u-full-width hero">
        <img src="images/hero1.png" alt="" />
    </div>
    <!-- End Hero Unit -->

    <!-- Features List -->
    <div class="container ">
        <div class="row features">
            <div class="four columns center feature">
                <span class="center"><img src="images/contact_icon.png" alt="" /></span>
                <h2 class="red">EASY CONTACT SYSTEMS</h2>
                <p>Give your customers and potential customers a convienient way to reach you, ask questions and learn more about you</p>
            </div>

            <div class="four columns center feature">
                <span class="center"><img src="images/news_icon.png" alt="" /></span>
                <h2 class="red">NEWS FEED MANAGEMENT</h2>
                <p>Provide updates about your business by pushing news about your business directly to customers</p>
            </div>

            <div class="four columns center feature">
                <span class="center"><img src="images/insights_icon.png" alt="" /></span>
                <h2 class="red">INSIGHTS</h2>
                <p>Get information about who is viewing your company, how many times and where from. Enchance Know Your Customer system</p>
            </div>
        </div>

        <div class="row">
            <div class="four columns center feature">
                <span class="center"><img src="images/direct_icon.png" alt="" /></span>
                <h2 class="red">DIRECT CONTACT</h2>
                <p>Brands allow customers to reach you directly through the app with a rapid response system</p>
            </div>

            <div class="four columns center feature">
                <span class="center"><img src="images/update_icon.png" alt="" /></span>
                <h2 class="red">EASY TO UPDATE DETAILS</h2>
                <p>Add up to 5 business to your dashboard to allow you to control information from one place</p>
            </div>

            <div class="four columns center feature">
                <span class="center"><img src="images/customize_icon.png" alt="" /></span>
                <h2 class="red">CUSTOMIZABLE</h2>
                <p>Easily customizable dashboard options allow you to see the information you need</p>
            </div>
        </div>
    </div>


    <!-- CALL TO ACTION 2 -->
    <div class="container">
        <div class="row">
            <div class="four columns">&nbsp;</div>
            <div class="four columns center">
                <p class="center uppercase large"><strong>Register your Business and Get a FREE 30 Day Trial!</strong>
                </p>
                <p class="center condense">Experience a the full feature benefits of Brands by registering and getting access to the listing managenemt</p>
                <p class="center"><a href="register.html" class="register_btn center">Register</a>
                </p>
            </div>
            <div class="four columns">&nbsp;</div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
    <!-- Revolution Slider Scripts-->
    <script type='text/javascript' src='js/jquery.themepunch.plugins.min.js'></script>
    <script type='text/javascript' src='js/jquery.themepunch.revolution.min.js'></script>
    <script type="text/javascript">
        var tpj = jQuery;

        var revapi1;

        tpj(document).ready(function () {

            if (tpj.fn.cssOriginal != undefined)
                tpj.fn.css = tpj.fn.cssOriginal;

            if (tpj('#rev_slider_1_1').revolution == undefined)
                revslider_showDoubleJqueryError('#rev_slider_1_1');
            else
                revapi1 = tpj('#rev_slider_1_1').show().revolution({
                    delay: 9000,
                    startwidth: 920,
                    startheight: 430,
                    hideThumbs: 200,

                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 5,

                    navigationType: "both",
                    navigationArrows: "solo",
                    navigationStyle: "round",

                    touchenabled: "on",
                    onHoverStop: "on",

                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 30,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: "on",
                    fullScreen: "off",

                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,


                    shuffle: "off",

                    autoHeight: "off",
                    forceFullWidth: "off",

                    hideThumbsOnMobile: "off",
                    hideBulletsOnMobile: "on",
                    hideArrowsOnMobile: "on",
                    hideThumbsUnderResolution: 0,

                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 768,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0,
                    videoJsPath: "plugins/revslider/rs-plugin/videojs/",
                    fullScreenOffsetContainer: ""
                });

        }); //ready
    </script>
    <!-- Revolution Slider Script -->

    <!-- Mobile Navigation -->
    <script type="text/javascript">
        $('.menu nav').slicknav();
    </script>

    <script type="text/javascript">
        $('.features').bind('inview', function (event, visible) {
            if (visible) {
                $('.feature').addClass("animated fadeIn");
            } else {
                $('.feature').removeClass("animated fadeIn");
            }
        });


    </script>
    <!-- End Mobile Navigation -->
</body>

</html>
