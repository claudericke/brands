<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
                <br style="clear: both;" />
                <div class="errorMessage red"></div>
                <form class="registerForm" method="post" name="RegistrationForm" id="RegistrationForm" action="/phpscripts/registeruser.php">
                    <div class="twelve columns">
                        <h2 class="left large ">COMPANY<strong class="left bold"> DETAILS</strong></h2>
                        <div class="four columns noMargin">
                            <label>COMPANY NAME</label>
                            <input type="text" class="u-full-width" name="companyName" placeholder="Registered Name of Company" />
                        </div>
                        <div class="four columns noMargin">
                            <label>TRADING NAME</label>
                            <input type="text" class="u-full-width" name="tradingName" placeholder="Name used when Trading" name="TradingName" />
                        </div>
                        <div class="four columns noMargin">
                            <label>REGISTRATION NUMBER</label>
                            <input type="text" class="u-full-width" name="registrationNumber" placeholder="Company registration number" />
                        </div>
                        <div class="four columns noMargin">
                            <label>COMPANY PHONE NUMBER 1</label>
                            <input type="text" class="u-full-width" name="companyPhone1" placeholder="Company registration number" />
                        </div>
                        <div class="four columns noMargin">
                            <label>POSTAL ADDRESS</label>
                            <input type="text" class="u-full-width" name="postalAddress" placeholder="Address to receive physical mail" />
                        </div>
                        <div class="four columns noMargin">
                            <label>PHYSICAL ADDRESS</label>
                            <input type="text" class="u-full-width" name="physicalAddress" placeholder="Address of where company trades from" />
                        </div>
                        <div class="four columns noMargin">
                            <label>COMPANY PHONE NUMBER 2</label>
                            <input type="text" class="u-full-width" name="companyPhone2" placeholder="000 000 0000" />
                            <input type="text" class="u-full-width" name="companyPhone3" placeholder="000 000 0000" value="123" hidden="hidden" />
                        </div>
                        <div class="four columns noMargin">
                            <label>INDUSTRY</label>
                            <select name="industry">
                                <option value="">Bank</option>
                                <option value="Beverage Manufacturer">Beverage Manufacturer</option>
                                <option value="Childrens Home">Childrens Home</option>
                                <option value="Church">Church</option>
                                <option value="Estate Agent">Estate Agent</option>
                                <option value="Food and Dining">Food and Dining</option>
                                <option value="Government">Government</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Hotels">Hotels</option>
                                <option value="NGO">NGO</option>
                                <option value="Night Club">Night Club</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Tertiary Institution">Tertiary Institution</option>
                                <option value="School">School</option>
                                <option value="Service Provider">Service Provider</option>
                                <option value="Supermarket">Supermarket</option>
                                <option value="Travel">Travel</option>
                            </select>
                        </div>
                        <div class="four columns noMargin">
                            <label>E-MAIL ADDRESS *</label>
                            <input type="email" class="u-full-width" name="emailAddress" placeholder="Your e-mail address" />
                        </div>
                        <div class="four columns noMargin">
                            <label>PREFERED LANGUAGE(S)</label>
                            <input type="checkbox" name="preferredLanguage" value="English" />&nbsp;English&nbsp;
                            <input type="checkbox" name="preferredLanguage" value="Shona" />&nbsp;Shona&nbsp;
                            <input type="checkbox" name="preferredLanguage" value="Ndebele" />&nbsp;Ndebele&nbsp;
                        </div>
                    </div>
                    <div class="twelve columns">
                        <h2 class="left large ">CORRESPONDENCE<strong class="left bold"> WITH BRANDS</strong></h2>
                        <p>OUR PREFERRED METHOD OF CORRESPONDENCE FROM BRANDS IS BY</p>
                        <input type="radio" name="preferedCorrespondence" value="MobilePhone" checked="checked"/>&nbsp;Mobile Phone (Voice and SMS)
                        <br/>
                        <input type="radio" name="preferedCorrespondence" value="eMail" />&nbsp;E-Mail
                        <br/>
                        <input type="radio" name="preferedCorrespondence" value="Post" />&nbsp;Post
                    </div>
                    <div class="twelve columns">
                        <h2 class="left large ">THIRD-PARTY MARKETING<strong class="left bold"> OPT-OUT</strong></h2>
                        <p class="uppercase">We do not consent to Massive Dynamics disclosing our information to third party marketing. (place your company initial in this box if you do not wish to receive third party marketing)</p>
                        <input type="radio" name="thirdPartMarketing" value="Yes" checked="checked"/>&nbsp;Yes&nbsp;
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
                        <input type="checkbox" name="brandsServices" value="Brands Premium"  checked="checked"/>Brands Premium
                        <br/>
                        <input type="checkbox" name="brandsServices" value="Brands Scroll Advert" />&nbsp;Brands Scroll Advert
                        <br/>
                        <input type="checkbox" name="brandsServices" value="Brands Promotional Advert" />&nbsp;Brands Promotional Advert
                        <br/>
                        <input type="checkbox" name="brandsServices" value="Brands Magazinet" />&nbsp;Brands Magazine
                        <br/>
                        <input type="checkbox" name="brandsServices" value="Post" />&nbsp;Post
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



        <?php include( 'includes/footer.php'); ?>


    </body>

</html>
