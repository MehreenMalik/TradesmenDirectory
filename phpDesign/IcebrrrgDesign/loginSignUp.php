<?php
include "base.php";    
    //IF a user is logged on show their profile
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
    {
        display_user_profile();
    }

    //Else allow them to sign in
    elseif(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username = mysql_real_escape_string($_POST['username']);
        $password = md5(mysql_real_escape_string($_POST['password']));
        
        $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
        
        if(mysql_num_rows($checklogin) == 1)
        {
            $row = mysql_fetch_array($checklogin);
            $email = $row['EmailAddress'];
            
            $_SESSION['Username'] = $username;
            $_SESSION['EmailAddress'] = $email;
            $_SESSION['LoggedIn'] = 1;
            
            display_user_profile();
        }
        else
        {
            display_login_page();
        }
    }
    //show the login page if no user is logged in
    else
    {
        display_login_page();
    }
?>

<?php
function display_login_page()
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

        <div class="container" style="width:55%;">
        <p>
            Test profile <br>
            username:jamesf<br> 
            password:password
        </p>
            <section class="consumerForm" style="float:left;">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  name="loginform" id="loginform">
                    <fieldset>
                        <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
                        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
                        <input type="submit" name="login" id="login" value="Login" />
                        <a href="registerOptions.php">Register</a>
                    </fieldset>
                </form>
            </section>

            <section  class="tradesmenForm" style="float:right;">
                <form action="">
                    <h1>Tradesmen login Form</h1>
                    <div>
                        <input type="text" placeholder="Username" required="" id="username" />
                    </div>
                    <div>
                        <input type="password" placeholder="Password" required="" id="password" />
                    </div>
                    <div>
                        <input type="submit" value="Log in" />
                        <br>
                        <a href="#">Lost your password?</a>
                        <a href="#">Register</a>
                    </div>
                </form>
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
function display_user_profile()
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
                        <li id="menu-item-4">
                            <a href="tradesmen.php">Tradesmen</a>
                        </li>
                        <li id="menu-item-5" class="current">
                            <a href="loginSignUp.php">my profile</a>
                        </li>
                        <li id="menu-item-6">
                            <a href="contact.php">Contact us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container" style="width:50%;">
        <h1>Your Profile:</h1>

            <!-- Display user data here-->
            <?php
                $username = $_SESSION['Username'];
                $query ="SELECT * from users WHERE Username = '".$username."'";
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
                    <td>Password</td> 
                    <td><input type="password" value="<?php echo $row["Password"];?>"></input></td> 
                </tr>

                <tr>
                     <td>Email</td> 
                     <td><input type="email" value="<?php echo $row["EmailAddress"];?>"></input></td>
                </tr>

                <tr>
                    <td> <!-- Blank --> </td>
                    <td> <input type="submit" name="save" id="save" value="update profile"/>  </td>
                </tr>
            </table>
            <br>
             <a style="float: right;" href="logout.php">Logout</a>
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