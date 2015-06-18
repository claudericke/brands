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
                    <p>If you are a company that wishes to register on Brands please complete the form below. Users wishing to browse the directory can download the app from the <a href="#">Google Play</a> <a href="#">App Store</a>
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
                            <label>NAME<sup>required</sup></label>
                            <input type="text" class="u-full-width" name="name" placeholder="Your name" value="" data-validate="required" />
                        </div>

                        <div class="four columns noMargin">
                            <label>SURNAME<sup>required</sup></label>
                            <input type="text" class="u-full-width" name="surname" placeholder="Your surname" value="" data-validate="required" />
                        </div>

                        <div class="four columns noMargin">
                            <label>Password<sup>required</sup></label>
                            <input type="password" class="u-full-width" name="password" placeholder="Password" value="" data-validate="required" />
                        </div>

                        <div class="four columns noMargin">
                            <label>COMPANY PHONE NUMBER <sup>Digits Only</sup>
                            </label>
                            <input type="text" class="u-full-width" name="companyPhone" placeholder="Company telephone number" value="" data-validate="alphanumeric,number" />
                        </div>

                        <div class="four columns noMargin">
                            <label>INDUSTRY</label>
                            <select name="industry" class="u-full-width">
                                <option value="Other">Other</option>

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

                                <optgroup label="Church">
                                    <option value="Pentecostal ">Pentecostal </option>
                                    <option value="Customary">Customary</option>
                                    <option value="Anglican">Anglican</option>
                                    <option value="Catholic	">Catholic </option>
                                </optgroup>

                                <optgroup label="Airport / Airline">
                                    <option value="Airport ">Airport</option>
                                    <option value="Airline">Airline</option>
                                    <option value="Airport logistics">Airport Logistics</option>
                                </optgroup>

                                <option value="Internet Service Provider"><strong>Internet Service Provider</strong></option>

                                <optgroup label="Travel">
                                    <option value="Taxis">Travel Agent</option>
                                    <option value="Taxis">Car Rental</option>
                                    <option value="Taxis">House Boat</option>
                                    <option value="Taxis">Taxi</option>
                                </optgroup>

                                <option value="Telecoms"><strong>Telecoms</strong></option>

                                <optgroup label="Orphanage / Support Center">
                                    <option value="Children's Home">Children's Home</option>
                                    <option value="Old age Home">Old Age Home</option>
                                    <option value="Psychiatric Ward">Psychiatric Ward</option>
                                </optgroup>
                                <optgroup label="Night Club">
                                    <option value="Indoor Bar">Indoor Bar</option>
                                    <option value="Open Bar">Open Bar</option>
                                    <option value="Club">Club</option>
                                </optgroup>


                                <optgroup label="Burial Services">
                                    <option value="Funeral Parlour">Funeral Parlour</option>
                                    <option value="Funeral Agent">Funeral Agent</option>
                                    <option value="Tombstones supplier">Tombstones Supplier</option>
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

                                <optgroup label="Agriculture">
                                    <option value="Commercial Farming">Commercial Farming</option>
                                    <option value="Livestock Rearing">Livestick Rearing</option>
                                    <option value="Farming Equipment">Farming Equipment</option>
                                </optgroup>

                                <optgroup label="Accommodition">
                                    <option value="Hotel">Hotels</option>
                                    <option value="Lodges">Lodges</option>
                                    <option value="Motels">Motel</option>
                                    <option value="Caravan">Caravan</option>
                                </optgroup>

                                <optgroup label="Goverment Institutes">
                                    <option value="Hotel">Government Ministry</option>
                                    <option value="Lodges">Municipality</option>
                                    <option value="Motels">Public Registry Department</option>
                                </optgroup>

                                <optgroup label="N.G.Os">
                                    <option value="Aid Agency">Aid Agency</option>
                                    <option value="Reconciliation Agency">Reconciliation Agency</option>
                                    <option value="Governmental Agency">Governmental Agency</option>
                                    <option value="Healthcare Agency">Healthcare Agency</option>
                                </optgroup>

                                <optgroup label="Consultancy">
                                    <option value="Insurance Firm">Insurance Firm</option>
                                    <option value="Law Firm">Law Firm</option>
                                    <option value="Business Start Up Agency">Business Start Up Agency</option>
                                    <option value="Taxation Agency">Taxation Agency</option>
                                    <option value="Accounting Agency">Accounting Agency</option>
                                    <option value="Writing, editing and translating Agency">Writing, editing and translating Agency</option>
                                </optgroup>

                                <optgroup label="Information Technology">
                                    <option value="Internet Cafe">Internet Cafe</option>
                                    <option value="App Developer">App Developer</option>
                                    <option value="Website Developer">Website Developer</option>
                                    <option value="Software Retailer">Software Retailer</option>
                                    <option value="Programmer">Programmer</option>
                                </optgroup>

                                <optgroup label="Household Goods">
                                    <option value="Domestic Furniture Store">Domestic Furniture Store</option>
                                    <option value="Domestic Accessories">Domestic Accessories</option>
                                    <option value="Appliances">Appliances</option>
                                </optgroup>

                                <optgroup label="Manufacturing and Engineering">
                                    <option value="Domestic Furniture Store">Production Lines</option>
                                    <option value="Domestic Accessories">Industrial Equipment</option>
                                </optgroup>

                                <optgroup label="Entertainment and Leisure">
                                    <option value="Shows / Tours">Shows / Tours</option>
                                    <option value="Film / Drama">Films / Drama</option>
                                    <option value="Books">Books</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Resort">Resort</option>
                                </optgroup>

                                <optgroup label="Brokers">
                                    <option value="Vendor">Vendor</option>
                                    <option value="Painter">Painter</option>
                                    <option value="Driving School">Driving School</option>
                                    <option value="Other">Other</option>
                                    <option value="Resort">Resort</option>
                                </optgroup>

                                <optgroup label="Mining and Constructoin">
                                    <option value="Mine">Mine</option>
                                    <option value="Contractor">Contractor</option>
                                    <option value="Mining Equipment">Mining Equipment</option>
                                </optgroup>

                                <optgroup label="Advertising and Security">
                                    <option value="Billboards">Billboards</option>
                                    <option value="Magazines">Magazines</option>
                                    <option value="Television">Television</option>
                                    <option value="Domestic Security">Domestic Security</option>
                                    <option value="Co-oporate Security">Co-oporate Security</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="four columns noMargin">
                            <label>E-MAIL ADDRESS <sup>required</sup>
                            </label>
                            <input type="email" class="u-full-width" name="emailAddress" placeholder="Your e-mail address" value="" data-validate="email,required" />
                        </div>

                        <div class="four columns noMargin">
                            <label>ALTERNATIVE E-MAIL ADDRESS
                            </label>
                            <input type="email" class="u-full-width" name="alternativeEmail" placeholder="Your alternative e-mail address" value="" data-validate="email" />
                        </div>

                    </div>


                    <br/>
                    <br/>
                    <div class="twelve columns">
                        <h2 class="left large ">APPLICATION<strong class="left bold"> CONFIRMATION</strong></h2>
                        <ol>
                            <li>We agree that Massive Dynamics may communicate with us electronically or by post (including by E-mail, by SMS through our Company lines or on screen messaging through subscriber Interface for purposes of payment arrears notifications, announcements or otherwise for the purpose of processing my requests for access to Massive Dynamics services and or administering to agreement between us and Massive Dynamics.
                                <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may communicate with us for the purpose of marketing or promoting its services or the services of its suppliers or affiliates (Direct Marketing Communications.)
                                </li>
                                <li>Unless and until we notify Massive Dynamics in writing that we withdraw our consent thereto, we agree that Massive Dynamics may disclose our personal information to its designers or affiliates for purposes of marketing of their services (third party marketing designers.)</li>
                                <li>By requesting a Digital Care Plan, we agree to be bound by the applicable terms and conditions and to pay the fee stipulated by the administration, as amended by the administration from time to time. </li>
                                <li>You agree to the <a href="terms.html" target="_blank">terms of service</a>, <a href="privacy.html" target="_blank">privacy policy</a> and <a href="dup.html" target="_blank">data usage policy</a>
                                </li>
                        </ol>

                    </div>
                    <br/>
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
