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
                                        <label>COMPANY NAME <sup>required</sup>
                                        </label>
                                        <input type="text" class="u-full-width" name="companyName" placeholder="Registered Name of Company" value="" data-validate="required" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>TRADING NAME</label>
                                        <input type="text" class="u-full-width" name="tradingName" placeholder="Name used when Trading" name="TradingName" value="" data-validate="required" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>REGISTRATION NUMBER</label>
                                        <input type="text" class="u-full-width" name="registrationNumber" placeholder="Company registration number" value="" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>COMPANY PHONE NUMBER 1 <sup>Digits Only</sup>
                                        </label>
                                        <input type="text" class="u-full-width" name="companyPhone1" placeholder="Company registration number" value="" data-validate="alphanumeric,number" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>POSTAL ADDRESS</label>
                                        <input type="text" class="u-full-width" name="postalAddress" placeholder="Address to receive physical mail" value="" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>PHYSICAL ADDRESS</label>
                                        <input type="text" class="u-full-width" name="physicalAddress" placeholder="Address of where company trades from" value=""/>
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>COMPANY PHONE NUMBER 2</label>
                                        <input type="text" class="u-full-width" name="companyPhone2" placeholder="Address to receive physical mail" value="" data-validate="number" />
                                        <input type="text" class="u-full-width" name="companyPhone3" placeholder="Address to receive physical mail" value="123" hidden="hidden" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>INDUSTRY</label>
                                        <select name="industry">
                                            <option value="Other">Other</option>
                                            <optgroup label="Church">
                                                <option value="Pentecostal ">Pentecostal </option>
                                                <option value="Customary">Customary</option>
                                                <option value="Anglican">Anglican</option>
                                                <option value="Catholic	">Catholic </option>
                                            </optgroup>
                                            <optgroup label="Education">
                                                <option value="Preschool">Preschool</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="College">College</option>
                                                <option value="Tertiary">Tertiary</option>
                                                <option value="University">University</option>
                                            </optgroup>
                                            <optgroup label="S.M.E">
                                                <option value="Saloon">Saloon</option>
                                                <option value="Barber">Barber</option>
                                                <option value="Spa">Spa</option>
                                                <option value="Boutique">Boutique</option>
                                                <option value="Plumber">Plumber</option>
                                                <option value="Carpenter">Carpenter</option>
                                                <option value="Builder">Builder</option>
                                                <option value="Other">Other</option>
                                            </optgroup>
                                            <optgroup label="Healthcare">
                                                <option value="Healthcare">Healthcare</option>
                                                <option value="Hospital">Hospital</option>
                                                <option value="Clinic">Clinic</option>
                                                <option value="Pharmacy">Pharmacy</option>
                                                <option value="Rehabilitation Centre	">Rehabilitation Centre </option>
                                            </optgroup>
                                            <optgroup label="Food Outlets">
                                                <option value="Restaurant">Restaurant</option>
                                                <option value="Food Court">Food Court</option>
                                            </optgroup>

                                            <optgroup label="Financial Institutes">
                                                <option value="Bank">Bank</option>
                                                <option value="Micro Finance">Micro Finance</option>
                                                <option value="Investors ">Investors </option>
                                            </optgroup>

                                            <optgroup label="Auto Indusrty">
                                                <option value="Vehicle">Vehicle</option>
                                                <option value="Panel beater">Panel beater</option>
                                                <option value="Car sale">Car sale</option>
                                                <option value="Car breaker">Car breaker</option>
                                                <option value="Spray Painter">Spray Painters </option>
                                            </optgroup>


                                            <optgroup label="Property">
                                                <option value="Real estate">Real estate</option>
                                                <option value="Cooperative">Cooperative</option>
                                                <option value="Land developers	">Land developers </option>
                                            </optgroup>

                                            <optgroup label="Airport / Airline">
                                                <option value="Airport ">Airport</option>
                                                <option value="Airline">Airline</option>
                                                <option value="Airport logistics">Airport Logistics</option>
                                            </optgroup>


                                            <option value="Internet Service Provider">Internet Service Provider</option>

                                            <optgroup label="Travel">
                                                <option value="Taxis">Taxis </option>
                                            </optgroup>
                                            <option value="Telecoms">Telecoms </option>
                                            <optgroup label="Orphanage / Support Center">
                                                <option value="Childrenâ€™s Home">Childrenâ€™s Home</option>
                                                <option value="Old age Home">Old age Home</option>
                                                <option value="Psychiatric Ward">Psychiatric Ward</option>
                                            </optgroup>
                                            <optgroup label="Night Club">
                                                <option value="Indoor Bar">Indoor Bar</option>
                                                <option value="Open Bar">Open Bar</option>
                                                <option value="Clubs  	">Clubs </option>
                                            </optgroup>


                                            <optgroup label="Burial Services">
                                                <option value="Burial Service">Burial Service</option>
                                                <option value="Funeral Parlour">Funeral Parlour</option>
                                                <option value="Funeral Agent">Funeral Agent</option>
                                                <option value="Tombstones supplier">Tombstones supplier</option>
                                            </optgroup>

                                            <optgroup label="Retail Store">
                                                <option value="Grocery Store">Grocery Store</option>
                                                <option value="Supermarket">Supermarket</option>
                                                <option value="Wholesaler ">Wholesaler </option>
                                                <option value="Retail store">Retail Outlet</option>
                                            </optgroup>

                                            <optgroup label="Hardware">
                                                <option value="Building material">Building material</option>
                                                <option value="Domestic Accessories">Domestic Accessories</option>
                                                <option value="Appliances">Appliances </option>
                                            </optgroup>

                                            <optgroup label="Electrical Devices and Accessories">
                                                <option value="Cell Phones">Cell Phones</option>
                                                <option value="Computers">Computers</option>
                                                <option value="Appliances 	">Household Appliances </option>
                                            </optgroup>

                                            <optgroup label="Travel">
                                                <option value="Travelling Agent">Travelling Agent</option>
                                                <option value="Car Rental">Car Rental</option>
                                                <option value="House Boat">House Boat</option>
                                                <option value="Taxi">Taxi</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>E-MAIL ADDRESS <sup>required</sup>
                                        </label>
                                        <input type="email" class="u-full-width" name="emailAddress" placeholder="Your e-mail address" value="" data-validate="email,required" />
                                    </div>
                                    <div class="four columns noMargin">
                                        <label>PREFERED LANGUAGE(S)</label>
                                        <input type="checkbox" name="preferredLanguage" value="English" checked="checked"/>&nbsp;English&nbsp;
                                        <input type="checkbox" name="preferredLanguage" value="Shona" />&nbsp;Shona&nbsp;
                                        <input type="checkbox" name="preferredLanguage" value="Ndebele" />&nbsp;Ndebele&nbsp;
                                    </div>
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">CORRESPONDENCE<strong class="left bold"> WITH BRANDS</strong></h2>
                                    <p>OUR PREFERRED METHOD OF CORRESPONDENCE FROM BRANDS IS BY</p>
                                    <input type="radio" name="preferedCorrespondence" value="MobilePhone"  checked="checked"/>&nbsp;Mobile Phone (Voice and SMS)
                                    <br/>
                                    <input type="radio" name="preferedCorrespondence" value="eMail" />&nbsp;E-Mail
                                    <br/>
                                    <input type="radio" name="preferedCorrespondence" value="Post" />&nbsp;Post
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">THIRD-PARTY MARKETING<strong class="left bold"> OPT-OUT</strong></h2>
                                    <p class="uppercase">We do not consent to Massive Dynamics disclosing our information to third party marketing. (place your company initial in this box if you do not wish to receive third party marketing)</p>
                                    <input type="radio" name="thirdPartMarketing" value="Yes"  checked="checked"/>&nbsp;Yes&nbsp;
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
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may communicate with us for the purpose of marketing or promoting its services or the services of its suppliers or affiliates (â€œDirect Marketing Communications.)
                                            </li>
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may disclose our personal information to its designers or affiliates for purposes of marketing of their services (â€œthird party marketing designers.)</li>
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
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may communicate with us for the purpose of marketing or promoting its services or the services of its suppliers or affiliates (Direct Marketing Communications.)
                                            </li>
                                            <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may disclose our personal information to its designers or affiliates for purposes of marketing of their services (and third party marketing designers.)</li>
                                            <li>By requesting a Digital Care Plan, we agree to be bound by the applicable terms and conditions and to pay the fee stipulated by the administration, as amended by the administration from time to time. </li>
                                            <li>You agree to both the <a href="terms.html" target="_blank">terms of service</a>, <a href="privacy.html" target="_blank">privacy policy</a> and <a href="dup.html" target="_blank">data usage policy</a>
                                            </li>
                                    </ol>

                                    <div class="spacer"></div>
                                </div>
                                <div class="twelve columns">
                                    <h2 class="left large ">SPAM<strong class="left bold"> CHECK</strong><sup>required</sup></h2>
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

                    <script src="js/verify.js"></script>
                    <script>
                    $.verify({
                        // no options required !
                    });
                    </script>
                </body>

                </html>
