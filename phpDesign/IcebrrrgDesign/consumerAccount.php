
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
                    <li id="menu-item-5" class="current">
                        <a href="loginSignUp.php">Login in/Sign up</a>
                    </li>
                    <li id="menu-item-6">
                        <a href="contact.php">Contact us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
 
    <div class="container" style="width:60%;">
    <?php
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
    	$username = mysql_real_escape_string($_POST['username']);
        $password = md5(mysql_real_escape_string($_POST['password']));
        $email = mysql_real_escape_string($_POST['email']);
        
    	 $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
         
         if(mysql_num_rows($checkusername) == 1)
         {
         	echo "<h1>Error</h1>";
            echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
         }
         else
         {
         	$registerquery = mysql_query("INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
            if($registerquery)
            {
            	echo "<h1>Success</h1>";
            	echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
            }
            else
            {
         		echo "<h1>Error</h1>";
            	echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
            }    	
         }
    }
    else
    {
    	?>
        
       <h1>Register</h1>
        
       <p>Please enter your details below to register.</p>
        
    	<form method="post" action="register.php" name="registerform" id="registerform">
    	<fieldset>
    		<label for="username">Username:</label><input type="text" name="username" id="username" /><br />
    		<label for="password">Password:</label><input type="password" name="password" id="password" /><br />
            <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
    		<input type="submit" name="register" id="register" value="Register" />
    	</fieldset>
    	</form>
        
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