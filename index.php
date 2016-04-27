<?php
include "base.php";
    if (isset($_REQUEST['button'])) // submit was clicked
    {
       $keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
       $trade = isset($_REQUEST['trade']) ? $_REQUEST['trade'] : '';
       $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : '';

       $checkResult = mysql_query("SELECT * FROM tradesmen WHERE Trade = '".$trade."' AND Area = '".$area."'");

        if(mysql_num_rows($checkResult) >= 1)
        {
            $row = mysql_fetch_array($checkResult);
            display_search_result();
        }
        else
        {
            display_no_results();       
        }
    }
    else
    {
       display_index_page();
    }
?>

<?php
function display_index_page()
{
?>
    <!DOCTYPE html>
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>
        <!-- ================= Basic Page Needs ==================== -->
        <meta charset="utf-8">
        <title>TradesmenDirectory</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- ================ Mobile Specific Metas ================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- ====================== CSS ========================= -->
        <link rel="stylesheet" href="stylesheets/base.css">
        <link rel="stylesheet" href="stylesheets/skeleton.css">
        <link rel="stylesheet" href="stylesheets/layout.css">
        <link rel="stylesheet" href="stylesheets/flexslider.css">
        <link rel="stylesheet" href="stylesheets/prettyPhoto.css">

        <!-- ===================== CSS ===================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/scripts.js"></script>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- =========== Favicons ========================== -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>

    <body class="wrap">
        <!-- ============= Index Page ====================== -->
        <header id="header" class="site-header" role="banner">
            <div id="header-inner" class="container sixteen columns over">
                <hgroup class="one-third column alpha">
                    <h1 id="site-title" class="site-title">
                        <a href="index.html" id="logo"><img src="images/logo.png" alt="TradesmenDirectory logo"/></a>
                    </h1>
                </hgroup>

                <nav id="main-nav" class="two thirds column omega">
                    <ul id="main-nav-menu" class="nav-menu">
                        <li id="menu-item-1" class="current">
                            <a href="index.php">Home</a>
                        </li>
                        <li id="menu-item-2">
                            <a href="jobsboard.php">Job's Board</a>
                        </li>
                        <li id="menu-item-4">
                            <a href="tradesmen.php">Tradesmen</a>
                        </li>
                        <li id="menu-item-5">
                            <a href="loginSignUp.php">Login in/Sign up</a>
                        </li>
                        <li id="menu-item-6">
                            <a href="contact.php">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

    	<div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST" style="background-image:url(images/indexBackground.jpg); background-repeat:no-repeat; height:200px; padding:2em;">
                <h3>Find your local tradesmen</h3>

                <input type="text" name="keyword" placeholder="Enter Keyword" id="keyword">

                <select name="trade" id="trade">
                   <option value="selecttrade">Select Trade</option>
                   <option value="brick">Brick Layer</option>
                   <option value="builder">Builder</option>
                   <option value="carpenter">Carpenter</option>
                   <option value="cleaner">Cleaner</option>
                   <option value="drainage">Drainage Specalist</option>
                   <option value="electrician">Electrician</option>
                   <option value="floor">Floor Specalist</option>
                   <option value="gardener">Gardener</option>
                   <option value="handyman">HandyMan</option>
                   <option value="heating">Heating Engineer</option>
                   <option value="kitchen">Kitchen Specalist</option>
                   <option value="lock">Locksmith</option>
                   <option value="painter">Painter</option>
                   <option value="plumber">Plumber</option>
                   <option value="roofer">Roofer</option>
                   <option value="tiler">Tiler</option>
                   <option value="window">Window Specalist</option>
                </select>

                <select name="area" id="area">
                   <option value="selectarea">Select Area</option>
                   <option value="blanchardstown">Blanchardstown</option>
                   <option value="corduff">Corduff</option>
                   <option value="clonsilla">Clonsilla</option>
                   <option value="coolmine">Coolmine</option>
                   <option value="hartstown">Hartstown</option>
                   <option value="hunstdown">Huntstown</option>
                   <option value="mulhuddart">Mulhuddart</option>
                   <option value="tyrrelstown">Tyrrelstown</option>
                </select>
                <input type="submit" value="Search Jobs" id="button" name="button">
            </form>

            <div class="one-third column">
                <ul>
                    <li><a href="#">Brick Layer</a></li>
                    <li><a href="#">Builder</a></li>
                    <li><a href="#">Carpenter</a></li>
                    <li><a href="#">Cleaner</a></li>
                    <li><a href="#">Drainage Specalist</a></li>
                    <li><a href="#">Electrician</a></li>
                </ul>
            </div>

            <div class="one-third column">
                <ul>
                    <li><a href="#">Floor Specalist</a></li>
                    <li><a href="#">Gardener</a></li>
                    <li><a href="#">HandyMan</a></li>
                    <li><a href="#">Heating Engineer</a></li>
                    <li><a href="#">Kitchen Specalist</a></li>
                    <li><a href="#">Locksmith</a></li>
                </ul>
            </div>

            <div class="one-third column">
                <ul>
                    <li><a href="#">Pest Control</li>
                    <li><a href="#">Painter</a></li>
                    <li><a href="#">Plumber</a></li>
                    <li><a href="#">Roofer</a></li>
                    <li><a href="#">Tiler</a></li>
                    <li><a href="#">Window Specalist</a></li>
                </ul>
            </div>

            <div class="tagline">
                <p>
                    Welcome to <strong>TradesmenDirectory</strong>, an online diretory of tradesmen throughout Ireland.
                </p>
            </div>

            <hr>
            <section class="container">
        		<div class="one-third column">
        			<h3><i class="icon-star rounded"></i> Varified Tradesmen</h3>
        			<p>
                        All tradesmen on this website have had their qualifications veriefied by us and any previous work expirence has also been verified.
                    </p>
        		</div>
        		<div class="one-third column">
        			<h3><i class="icon-edit rounded"></i> Feedback Section</h3>
        			<p>
                        Tradesmen on our website have their own feedback section on their profile, where previous clients have left feedback.
                    </p>
        		</div>
        		<div class="one-third column">
        			<h3><i class="icon-comment rounded"></i> Job's Board</h3>
        			<p>
                        You can publish a job you woud like done on our jobs board, where tradesmen can contact you.
                    </p>
        		</div>
            </section>

            <hr>
            <section class="container">
                <article id="photo-item-1" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Tommy DeVito</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>

                <article id="photo-item-2" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Ivan Drago</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>

                <article id="photo-item-3" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Jack Torrance</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>
    	   </section>
        </div>

        <footer>
            <div class="footer-inner container">
                <div class="social footer-columns one-third column">
                    <h2><i class="icon-bullhorn icon-large"></i> Get Social</h2>
                    <p>Want to stalk us? That would be super:</p>
                    <ul>
                        <li>
                            <a href="http://www.twitter.com/opendesigns/"><i class="icon-twitter-sign icon-large"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="http://www.facebook.com/opendesigns"><i class="icon-facebook-sign icon-large"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/b/110224753971231624818/110224753971231624818/posts"><i class="icon-google-plus-sign icon-large"></i> Google+</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-columns one-third column">
                    <h2><i class="icon-book icon-large"></i> User agreements</h2>
                    <p>
                        Boring stuff like privacy policy and user agreements can go here.
                    </p>
                </div>

                <div class="footer-columns one-third column">
                    <h2><i class="icon-user icon-large"></i> About Us</h2>
                    <p>
                        A group of college students trying to pass a project module!<br>
                        B00067565 Mehreen Malik<br>
                        B00067382 Mirza Rizvanovic<br>
                        B00074947 Seth Harbottle<br>

                    </p>
                </div>
            </div>

            <div id="footer-base">
                <div class="container">
                    <div class="eight columns">
                        <a href="http://www.opendesigns.org/design/icebrrrg/">Icebrrg Website Template</a> &copy; 2012
                    </div>

                    <div class="eight columns far-edge">
                        Design by <a href="http://www.opendesigns.org">OD</a>
                    </div>
                </div>
            </div>
        </footer>
    <!-- ===================== End Document ======================= -->
    <script src="js/jquery.prettyPhoto.js"></script>
    </body>
    </html>
<?php
}
?>

<?php
function display_search_result()
{
?>
    <!DOCTYPE html>
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>
        <!-- ================= Basic Page Needs ==================== -->
        <meta charset="utf-8">
        <title>TradesmenDirectory</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- ================ Mobile Specific Metas ================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- ====================== CSS ========================= -->
        <link rel="stylesheet" href="stylesheets/base.css">
        <link rel="stylesheet" href="stylesheets/skeleton.css">
        <link rel="stylesheet" href="stylesheets/layout.css">
        <link rel="stylesheet" href="stylesheets/flexslider.css">
        <link rel="stylesheet" href="stylesheets/prettyPhoto.css">

        <!-- ===================== CSS ===================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/scripts.js"></script>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- =========== Favicons ========================== -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>

    <body class="wrap">
        <!-- ============= Index Page ====================== -->
        <header id="header" class="site-header" role="banner">
            <div id="header-inner" class="container sixteen columns over">
                <hgroup class="one-third column alpha">
                    <h1 id="site-title" class="site-title">
                        <a href="index.html" id="logo"><img src="images/logo.png" alt="TradesmenDirectory logo"/></a>
                    </h1>
                </hgroup>

                <nav id="main-nav" class="two thirds column omega">
                    <ul id="main-nav-menu" class="nav-menu">
                        <li id="menu-item-1">
                            <a href="index.php">Home</a>
                        </li>
                        <li id="menu-item-2">
                            <a href="jobsboard.php">Job's Board</a>
                        </li>
                        <li id="menu-item-4" class="current">
                            <a href="tradesmen.php">Tradesmen</a>
                        </li>
                        <li id="menu-item-5">
                            <a href="loginSignUp.php">Login/SignUp</a>
                        </li>
                        <li id="menu-item-6">
                            <a href="contact.php">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container" style="width:50%;">
        <?php
            $trade = $_REQUEST['trade'];
            $area = $_REQUEST['area'];

            $query ="SELECT * FROM tradesmen WHERE Trade = '".$trade."' AND Area = '".$area."'";
            $result = @mysql_query($query) or die("Could not execute SQL query");

            while($row = mysql_fetch_array($result))
            {
        ?>
        <!-- User profile Image-->
        <?php echo '<img width="260" height="260" src="data:image/jpeg;base64,'.base64_encode( $row['profilePicture'] ).'"/>';?>
            <table style="float: right;">
                <tr>
                    <td>Username</td>
                    <td><input type="text" value="<?php echo $row["Username"];?>"></input></td>
                </tr>

                <tr>
                    <td>Trade</td>
                    <td><input type="text" value="<?php echo $row["Trade"];?>"></input></td>
                </tr>

                <tr>
                     <td>Area</td>
                     <td><input type="text" value="<?php echo $row["Area"];?>"></input></td>
                </tr>

                <tr>
                     <td>Email</td>
                     <td><input type="email" value="<?php echo $row["EmailAddress"];?>"></input></td>
                </tr>

                <tr>
                     <td>Experience</td>
                     <td><input type="email" value="<?php echo $row["Experience"];?>"></input></td>
                </tr>
            </table>
            <br>
            <?php
            }
            ?>
        </div>

    <footer>
        <div class="footer-inner container">
            <div class="social footer-columns one-third column">
                <h2><i class="icon-bullhorn icon-large"></i> Get Social</h2>
                <p>Want to stalk us? That would be super:</p>
                <ul>
                    <li>
                        <a href="http://www.twitter.com/opendesigns/"><i class="icon-twitter-sign icon-large"></i> Twitter</a>
                    </li>
                    <li>
                        <a href="http://www.facebook.com/opendesigns"><i class="icon-facebook-sign icon-large"></i> Facebook</a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/b/110224753971231624818/110224753971231624818/posts"><i class="icon-google-plus-sign icon-large"></i> Google+</a>
                    </li>
                </ul>
            </div>

            <div class="footer-columns one-third column">
                <h2><i class="icon-book icon-large"></i> User agreements</h2>
                <p>
                    Boring stuff like privacy policy and user agreements can go here.
                </p>
            </div>

            <div class="footer-columns one-third column">
                <h2><i class="icon-user icon-large"></i> About Us</h2>
                <p>
                    A group of college students trying to pass a project module!
                </p>
            </div>
        </div>

        <div id="footer-base">
            <div class="container">
                <div class="eight columns">
                    <a href="http://www.opendesigns.org/design/icebrrrg/">Icebrrg Website Template</a> &copy; 2012
                </div>

                <div class="eight columns far-edge">
                    Design by <a href="http://www.opendesigns.org">OD</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.prettyPhoto.js"></script>
    </body>
    </html>
<?php
}
?>

<?php
function display_no_results()
{
?>
    <!DOCTYPE html>
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>
        <!-- ================= Basic Page Needs ==================== -->
        <meta charset="utf-8">
        <title>TradesmenDirectory</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- ================ Mobile Specific Metas ================= -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- ====================== CSS ========================= -->
        <link rel="stylesheet" href="stylesheets/base.css">
        <link rel="stylesheet" href="stylesheets/skeleton.css">
        <link rel="stylesheet" href="stylesheets/layout.css">
        <link rel="stylesheet" href="stylesheets/flexslider.css">
        <link rel="stylesheet" href="stylesheets/prettyPhoto.css">

        <!-- ===================== CSS ===================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/scripts.js"></script>

        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- =========== Favicons ========================== -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    </head>

    <body class="wrap">
        <!-- ============= Index Page ====================== -->
        <header id="header" class="site-header" role="banner">
            <div id="header-inner" class="container sixteen columns over">
                <hgroup class="one-third column alpha">
                    <h1 id="site-title" class="site-title">
                        <a href="index.html" id="logo"><img src="images/logo.png" alt="TradesmenDirectory logo"/></a>
                    </h1>
                </hgroup>

                <nav id="main-nav" class="two thirds column omega">
                    <ul id="main-nav-menu" class="nav-menu">
                        <li id="menu-item-1" class="current">
                            <a href="index.php">Home</a>
                        </li>
                        <li id="menu-item-2">
                            <a href="jobsboard.php">Job's Board</a>
                        </li>
                        <li id="menu-item-4">
                            <a href="tradesmen.php">Tradesmen</a>
                        </li>
                        <li id="menu-item-5">
                            <a href="loginSignUp.php">Login in/Sign up</a>
                        </li>
                        <li id="menu-item-6">
                            <a href="contact.php">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST" style="background-image:url(images/indexBackground.jpg); background-repeat:no-repeat; height:200px; padding:2em;">
                <h3>Find your local tradesmen</h3>
                <p style="color: white;">Sorry no results found, please try again.<p>
                <input type="text" name="keyword" placeholder="Enter Keyword" id="keyword">

                <select id="trade">
                   <option value="selecttrade">Select Trade</option>
                   <option value="brick">Brick Layer</option>
                   <option value="builder">Builder</option>
                   <option value="carpenter">Carpenter</option>
                   <option value="cleaner">Cleaner</option>
                   <option value="drainage">Drainage Specalist</option>
                   <option value="electrician">Electrician</option>
                   <option value="floor">Floor Specalist</option>
                   <option value="gardener">Gardener</option>
                   <option value="handyman">HandyMan</option>
                   <option value="heating">Heating Engineer</option>
                   <option value="kitchen">Kitchen Specalist</option>
                   <option value="lock">Locksmith</option>
                   <option value="painter">Painter</option>
                   <option value="plumber">Plumber</option>
                   <option value="roofer">Roofer</option>
                   <option value="tiler">Tiler</option>
                   <option value="window">Window Specalist</option>
                </select>

                <select id="area">
                   <option value="selectarea">Select Area</option>
                   <option value="blanchardstown">Blanchardstown</option>
                   <option value="corduff">Corduff</option>
                   <option value="clonsilla">Clonsilla</option>
                   <option value="coolmine">Coolmine</option>
                   <option value="hartstown">Hartstown</option>
                   <option value="hunstdown">Huntstown</option>
                   <option value="mulhuddart">Mulhuddart</option>
                   <option value="tyrrelstown">Tyrrelstown</option>
                </select>
                <input type="submit" value="Search Jobs" id="button" name="button">
            </form>

            <div class="one-third column">
                <ul>
                    <li><a href="url">Brick Layer</a></li>
                    <li><a href="url">Builder</a></li>
                    <li><a href="url">Carpenter</a></li>
                    <li><a href="url">Cleaner</a></li>
                    <li><a href="url">Drainage Specalist</a></li>
                    <li><a href="url">Electrician</a></li>
                </ul>
            </div>

            <div class="one-third column">
                <ul>
                    <li><a href="url">Floor Specalist</a></li>
                    <li><a href="url">Gardener</a></li>
                    <li><a href="url">HandyMan</a></li>
                    <li><a href="url">Heating Engineer</a></li>
                    <li><a href="url">Kitchen Specalist</a></li>
                    <li><a href="url">Locksmith</a></li>
                </ul>
            </div>

            <div class="one-third column">
                <ul>
                    <li><a href="#">Pest Control</li>
                    <li><a href="url">Painter</a></li>
                    <li><a href="url">Plumber</a></li>
                    <li><a href="url">Roofer</a></li>
                    <li><a href="url">Tiler</a></li>
                    <li><a href="url">Window Specalist</a></li>
                </ul>
            </div>

            <div class="tagline">
                <p>
                    Welcome to <strong>TradesmenDirectory</strong>, an online diretory of tradesmen throughout Ireland.
                </p>
            </div>

            <hr>
            <section class="container">
                <div class="one-third column">
                    <h3><i class="icon-star rounded"></i> Varified Tradesmen</h3>
                    <p>
                        All tradesmen on this website have had their qualifications veriefied by us and any previous work expirence has also been verified.
                    </p>
                </div>
                <div class="one-third column">
                    <h3><i class="icon-edit rounded"></i> Feedback Section</h3>
                    <p>
                        Tradesmen on our website have their own feedback section on their profile, where previous clients have left feedback.
                    </p>
                </div>
                <div class="one-third column">
                    <h3><i class="icon-comment rounded"></i> Job's Board</h3>
                    <p>
                        You can publish a job you woud like done on our jobs board, where tradesmen can contact you.
                    </p>
                </div>
            </section>

            <hr>
            <section class="container">
                <article id="photo-item-1" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Tommy DeVito</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>

                <article id="photo-item-2" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Ivan Drago</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>

                <article id="photo-item-3" class="feature-column one-third column">
                    <div class="featured-image img-wrapper">
                        <img src="images/the-joker.jpg" class="scale-with-grid" alt="Random Iceberg Photo">
                        </a>
                    </div>
                    <h4><a href="#">Jack Torrance</a></h4>
                    <p>
                        Promote users profile here, who pays to be put on Homepage. Profile stays here for 2 weeks?
                    </p>
                </article>
           </section>
        </div>

        <footer>
            <div class="footer-inner container">
                <div class="social footer-columns one-third column">
                    <h2><i class="icon-bullhorn icon-large"></i> Get Social</h2>
                    <p>Want to stalk us? That would be super:</p>
                    <ul>
                        <li>
                            <a href="http://www.twitter.com/opendesigns/"><i class="icon-twitter-sign icon-large"></i> Twitter</a>
                        </li>
                        <li>
                            <a href="http://www.facebook.com/opendesigns"><i class="icon-facebook-sign icon-large"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/b/110224753971231624818/110224753971231624818/posts"><i class="icon-google-plus-sign icon-large"></i> Google+</a>
                        </li>
                    </ul>
                </div>

                <div class="footer-columns one-third column">
                    <h2><i class="icon-book icon-large"></i> User agreements</h2>
                    <p>
                        Boring stuff like privacy policy and user agreements can go here.
                    </p>
                </div>

                <div class="footer-columns one-third column">
                    <h2><i class="icon-user icon-large"></i> About Us</h2>
                    <p>
                        A group of college students trying to pass a project module!<br>
                        B00067565 Mehreen Malik<br>
                        B00067382 Mirza Rizvanovic<br>
                        B00074947 Seth Harbottle<br>

                    </p>
                </div>
            </div>

            <div id="footer-base">
                <div class="container">
                    <div class="eight columns">
                        <a href="http://www.opendesigns.org/design/icebrrrg/">Icebrrg Website Template</a> &copy; 2012
                    </div>

                    <div class="eight columns far-edge">
                        Design by <a href="http://www.opendesigns.org">OD</a>
                    </div>
                </div>
            </div>
        </footer>
    <!-- ===================== End Document ======================= -->
    <script src="js/jquery.prettyPhoto.js"></script>
    </body>
    </html>
<?php
}
?>