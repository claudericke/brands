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
                                    oCurrentForm.append("<span style='color: #4F8A10;background-color: #DFF2BF; padding: 8px; border: 1px #4F8A10; font-weight: bold;'>Registration Successful. An activate link has been sent to your email address.</span>");
                                } else {
                                    $(".errorMessage").empty().html(gData).show().fadeOut(iFadeSpeed);
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
                            <br style="clear: both;"/>
                            <div class="errorMessage red"></div>
                            <form class="registerForm" method="post" name="RegistrationForm" id="RegistrationForm" action="/phpscripts/registeruser.php">
                                <div class="twelve columns">
                                    <h2 class="left large ">COMPANY<strong class="left bold"> DETAILS</strong></h2>
                                    <div class="four columns noMargin">
                                        <label>COMPANY NAME</label>
                                        <input type="text" class="u-full-width" name="companyName" placeholder="Registered Name of Company"  />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>TRADING NAME</label>
                                        <input type="text" class="u-full-width" name="tradingName" placeholder="Name used when Trading" name="TradingName" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>REGISTRATION NUMBER</label>
                                        <input type="text" class="u-full-width" name="registrationNumber" placeholder="Company registration number"  />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>COMPANY PHONE NUMBER 1</label>
                                        <input type="text" class="u-full-width" name="companyPhone1" placeholder="Company registration number"  />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>POSTAL ADDRESS</label>
                                        <input type="text" class="u-full-width" name="postalAddress" placeholder="Address to receive physical mail"  />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>PHYSICAL ADDRESS</label>
                                        <input type="text" class="u-full-width" name="physicalAddress" placeholder="Address of where company trades from" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>COMPANY PHONE NUMBER 2</label>
                                        <input type="text" class="u-full-width" name="companyPhone2" placeholder="Address to receive physical mail" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>COMPANY PHONE NUMBER 3</label>
                                        <input type="text" class="u-full-width" name="companyPhone3" placeholder="Address to receive physical mail" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>E-MAIL ADDRESS *</label>
                                        <input type="email" class="u-full-width" name="emailAddress" placeholder="Your e-mail address"  />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>PREFERED LANGUAGE(S)</label>
                                        <input type="checkbox" name="english" value="English" />&nbsp;English&nbsp;
                                        <input type="checkbox" name="shona" value="Shona" />&nbsp;Shona&nbsp;
                                        <input type="checkbox" name="ndebele" value="Ndebele" />&nbsp;Ndebele&nbsp;
                                    </div>
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">CORRESPONDENCE<strong class="left bold"> WITH BRANDS</strong></h2>
                                    <p>OUR PREFERRED METHOD OF CORRESPONDENCE FROM BRANDS IS BY</p>
                                    <input type="radio" name="preferedCorrespondence" value="MobilePhone" />&nbsp;Mobile Phone (Voice and SMS)
                                    <br/>
                                    <input type="radio" name="preferedCorrespondence" value="eMail" />&nbsp;E-Mail
                                    <br/>
                                    <input type="radio" name="preferedCorrespondence" value="Post" />&nbsp;Post
                                    <p>WOULD YOU LIKE TO SUBSCRIBE TO OUR MAGAZINE</p>
                                    <input type="radio" name="magazineSubscription" value="Yes" />&nbsp;Yes
                                    <br/>
                                    <input type="radio" name="magazineSubscription" value="No" />&nbsp;No
                                    <br/>
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">THIRD-PARTY MARKETING<strong class="left bold"> OPT-OUT</strong></h2>
                                    <p class="uppercase">We do not consent to Massive Dynamics disclosing our information to third party marketing. (place your company initial in this box if you do not wish to receive third party marketing)</p>
                                    <input type="radio" name="thirdPartMarketing" value="Yes" />&nbsp;Yes&nbsp;
                                    <input type="radio" name="thirdPartMarketing" value="No" />&nbsp;No
                                    <br />
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div class="twelve columns">
                                    <h2 class="left large ">SELECTION OF<strong class="left bold"> SERVICES</strong></h2>
                                    <p>WE ASK THAT YOU AUTHORIZE ACCESS TO THE FOLLOWING MASSIVE DYNAMICS SERVICE(S)</p>
                                    <input type="checkbox" name="brandsServices" value="brandsPremium" />Brands Premium
                                    <br/>
                                    <input type="checkbox" name="brandsServices" value="brandsScrollAdvert" />&nbsp;Brands Scroll Advert
                                    <br/>
                                    <input type="checkbox" name="brandsServices" value="brandsPromotionalAdvert" />&nbsp;Brands Promotional Advert
                                    <br/>
                                    <input type="checkbox" name="brandsServices" value="brandsPromotionalAdvert" />&nbsp;Brands Magazine
                                    <br/>
                                    <input type="checkbox" name="brandsServices" value="Post" />&nbsp;Post
                                    <p>WOULD YOU LIKE TO SUBSCRIBE TO OUR MAGAZINE</p>
                                    <input type="radio" name="subscription" value="Yes" />&nbsp;Yes
                                    <br/>
                                    <input type="radio" name="subscription" value="No" />&nbsp;No
                                    <br/>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div class="twelve columns">
                                    <h2 class="left large ">APPLICATION<strong class="left bold"> CONFIRMATION</strong></h2>
                                    <ol>
                                        <li>We agree that Massive Dynamics may communicate with us electronically or by post (including by E-mail, by SMS through our Company lines or on screen messaging through subscriber Interface for purposes of payment arrears notifications, announcements or otherwise for the purpose of processing my requests for access to Massive Dynamics services and or administering to agreement between us and Massive Dynamics.
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may communicate with us for the purpose of marketing or promoting its services or the services of its suppliers or affiliates (“Direct Marketing Communications”)
                                            </li>
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may disclose our personal information to its designers or affiliates for purposes of marketing of their services (“third party marketing designers”)</li>
                                            <li>By requesting a Digital Care Plan, we agree to be bound by the applicable terms and conditions and to pay the fee stipulated by the administration, as amended by the administration from time to time. </li>
                                            <li>You agree to both the <a href="terms.html" target="_blank">terms of service</a>, <a href="privacy.html" target="_blank">privacy policy</a> and <a href="dup.html" target="_blank">data usage policy</a>
                                            </li>
                                    </ol>

                                </div>

                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div class="twelve columns">
                                    <h2 class="left large ">APPLICATION<strong class="left bold"> CONFIRMATION</strong></h2>
                                    <ol>
                                        <li>We agree that Massive Dynamics may communicate with us electronically or by post (including by E-mail, by SMS through our Company lines or on screen messaging through subscriber Interface for purposes of payment arrears notifications, announcements or otherwise for the purpose of processing my requests for access to Massive Dynamics services and or administering to agreement between us and Massive Dynamics.
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may communicate with us for the purpose of marketing or promoting its services or the services of its suppliers or affiliates (“Direct Marketing Communications”)
                                            </li>
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may disclose our personal information to its designers or affiliates for purposes of marketing of their services (“third party marketing designers”)</li>
                                            <li>By requesting a Digital Care Plan, we agree to be bound by the applicable terms and conditions and to pay the fee stipulated by the administration, as amended by the administration from time to time. </li>
                                            <li>You agree to both the <a href="terms.html" target="_blank">terms of service</a>, <a href="privacy.html" target="_blank">privacy policy</a> and <a href="dup.html" target="_blank">data usage policy</a>
                                            </li>
                                    </ol>

                                    <div class="spacer"></div>
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">SPAM<strong class="left bold"> CHECK</strong></h2>
                                    <div class="g-recaptcha" data-sitekey="6Lec3QMTAAAAAMwXk_ATFT1SN-Z9qlaFyfAO_EXc"></div>
                                </div>
                                <div class="twelve columns">
                                    <input type="submit" class="u-width-full redBackground" value="AGREE AND REGISTER" />
                                </div>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    <!-- CALL TO ACTION 1 -->



                    <?php include( 'includes/footer.php'); ?>


                </body>

                </html>
