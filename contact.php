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
                    <li id="menu-item-4">
                        <a href="tradesmen.php">Tradesmen</a>
                    </li>
                    <li id="menu-item-5">
                        <a href="loginSignUp.php">Login in/Sign up</a>
                    </li>
                    <li id="menu-item-6" class="current">
                        <a href="contact.php">Contact us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

	<div class="container">
        <article class="ten columns main-content">
            <h1>We like it when people send us messages</h1>

            <div id="message"></div>
            <form method="post" action="contact.php" name="contactform" id="contactform">
        		<fieldset>
                    <legend>Please fill in the following form to contact us</legend>

        			<label for="name" accesskey="U"><span class="required">*</span> Your Name</label>
        			<input name="name" type="text" id="name" size="30" value="" />

        			<br />
        			<label for="email" accesskey="E"><span class="required">*</span> Email</label>
        			<input name="email" type="text" id="email" size="30" value="" />

        			<br />
        			<label for="phone" accesskey="P"><span class="required">*</span> Phone</label>
        			<input name="phone" type="text" id="phone" size="30" value="" />

        			<br />
        			<label for="subject" accesskey="S">Subject</label>
        			<select name="subject" id="subject">
        			  <option value="Support">Support</option>
        			  <option value="a Sale">Sales</option>
        			  <option value="a Bug fix">Report a bug</option>
        			</select>

        			<br />
        			<label for="comments" accesskey="C"><span class="required">*</span> Your comments</label>
        			<textarea name="comments" cols="40" rows="3" id="comments" style="width: 350px;"></textarea>

        			<p><span class="required">*</span> Are you human?</p>

        			<label for="verify" class="verify-this" accesskey="V">&nbsp;&nbsp;&nbsp;3 + 1 =</label>
        			<input name="verify" type="text" id="verify" class="verify-this" size="4" value="" style="width: 30px;" /><br /><br />

        			<input type="submit" class="submit" id="submit" value="Submit" />
        		</fieldset>
    	   </form>
        </article>

        <aside class="six columns right-sidebar">
            <div class="sidebar-widget social">
                <h2>Like this?</h2>
                <p>If you like our service, share the social love and let your buddies know:</p>
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
        </aside>
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

<!-- ===================== End Document ======================= -->

<script src="js/jquery.prettyPhoto.js"></script>
</body>
</html>