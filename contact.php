<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands App- Mobile Application for iOS and Symbian</title>
   <?php include('includes/links.php'); ?>

</head>

<body>
<div class="wrapper">
           <?php include('includes/header.php'); ?>


    <!-- Features List -->
    <div class="container">
       <div class="twelve columns">
            <h1 class="left">CONTACT<strong class="red left"> US</strong></h1>
       </div>
        <div class="row content">
            <div class="eight columns center feature">
            <ul class="contact">
                <li class="address">Massive Dynamics<br />
                    No. 36 Quendon Road, (Within the Maranatha Prep Complex)<br />
                    Monavale, <br />
                    Mabelreign , <br />
                    Harare, <br />
                    Zimbabwe<br /></li>
           <li class="phone">
                   +263 4 303647
            </li>
           <li class="mobile">
                +263 783 592 50<br />
                +263 783 592 501<br />
           </li>
           <li class="email">
                <a href="mailto:admin@trendmendsystems.co.zw">admin@trendmendsystems.co.zw</a><br />
                <a href="mailto:infobrands@trendmendsystems.co.zw">infobrands@trendmendsystems.co.zw</a><br />
               <a href="mailto:brandafrican@trendmendsystems.co.zw">brandafrican@trendmendsystems.co.zw</a>
           </li>
            </ul>
            </div>
            <div class="four columns phones">
                <img src="images/phone.png" alt="" />
            </div>
        </div>
    </div>

    <div class="container" >
        <div class="twelve columns">
           <h1>DIRECT <strong class="red">CONTACT</strong></h1>
            <form class="contact" method="post" action="sendmessage.php">
                <div class="six columns">
                   <label>FULL NAME:</label>
                    <input class="u-full-width" type="text" placeholder="e.g. Johnathan Dover">
                    <label>E-MAIL ADDRESS:</label>
                    <input class="u-full-width" type="text" placeholder="e.g. example@mail.com">
                    <label>SUBJECT:</label>
                    <input class="u-full-width" type="text" placeholder="e.g. Pricing Inquiry">
                </div>
                <div class="six columns">
                   <label>MESSAGE</label>
                    <textarea placeholder="Type your message Here" class="u-full-width" style="height:200px;"></textarea>
                </div>
                <div class="u-cf"></div>
                <div class="offset-by-four four columns right">
                    <input class="mail_btn width30" type="submit" value="SEND MESSAGE" />
                </div>
            </form>
        </div>
    </div>
    </div>

   <?php include('includes/footer.php'); ?>

</body>

</html>
