<?php require_once("include/db_connect.php");

if(isset($_REQUEST['Submit']))
{
	$error = validate_form();
	if($error)
	{
		display_contact_page($error);
	}
	else
	{
		display_confirmation_page();
	}
}
else
{
	display_contact_page('');
}
?>

<?php
function display_contact_page($error)
{
	$self = $_SERVER['PHP_SELF'];
	$Name = isset($_REQUEST['Name'])? $_REQUEST ['Name']:'';
	$email = isset($_REQUEST['email'])? $_REQUEST['email']:'';
	$number = isset($_REQUEST['number'])? $_REQUEST['number']:'';
	$message = isset($_REQUEST['message'])? $_REQUEST['message']:'';
	$user = isset($_REQUEST['user'])? $_REQUEST['user']:'';
	$subject = isset($_REQUEST['subject'])? $_REQUEST['subject']:'';
?>
<?php
include ('include/header.html');
?>

<?php
	if($error)
	{
	   echo "<p>$error</p>\n";
	}
?>

<br>

<div id="textAreas">
	<h3>Frequently asked questions</h3>
	<p>If you are having trouble using the site, we would recommand checking out the <a href="FAQ.php">F.A.Q</a> section. Our most asked questions are answered there.</p>
</div>

<div id="about-us">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<label><img src="images/email.jpg">Contact us</label>
	<br>
		<label>Please contact us using the options below:</label>
	<br>
		<select name="user" required>
			<option value="" selected="selected">select user type</option>
			<option value="consumer">Consumer</option>
			<option value="tradesmen">Tradesmen</option>
		</select>
	<br>
		<label>First Name:</label><br> <input type="text" name="Name" required>
	<br>
		<label>Email:</label><br> <input type="email" name="email" required>
	<br>
		<label>Number(optional):</label><br> <input type="number" name="number">
	<br>
		<label>Subject:</label><br>
		<select name="subject" required>
				<option value="" selected="selected">select subject matter</option>
				<option value="login">Login issues</option>
				<option value="job">Posting a job</option>
				<option value="review">Leaving a review</option>
				<option value="generalInquery">General inquery</option>
				<option value="feedback">Feedback</option>
				<option value="other">Other</option>
		</select>
	<br>
		<label>Message:</label><br> <textarea name="message" rows="5" cols="20" required></textarea>
	<br>
		<input type="submit" name="Submit" value="Submit" id="button">
		<input type="reset" name="Reset" value="Reset" id="button">

</form>
</div>

</body>
</html>
<?php
}
?>

<?php
function display_confirmation_page()
{
	$Name = $_REQUEST['Name'];
	$number = $_REQUEST['number'];
	$message = $_REQUEST['message'];
	$email = $_REQUEST['email'];
	$user = $_REQUEST['user'];
	$subject = $_REQUEST['subject'];
?>

<?php
include ('include/header.html');
?>

<?php
	if($result)
	{
		echo "Thank you ".$name.". Your message has been sent.";
	}
}
?>
</div>
</body>
</html>

<?php function validate_form()
{
	$Name = $_REQUEST['Name'];
	$number = $_REQUEST['number'];
	$message = $_REQUEST['message'];
	$email = $_REQUEST['email'];
	$user = $_REQUEST['user'];
	$subject = $_REQUEST['subject'];
	$error = '';

	$reg_exp = "^[a-zA-Z\-\']+$^";
	$reg_email = "^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$^";

	if (!preg_match($reg_exp, $Name))
	{
	   $error .= "<span class=\"error\">Name is invalid (letters, hyphens, ', only)</span><br>";
   	}

	if (!preg_match($reg_exp, $message))
	{
	   $error .= "<span class=\"error\">Your message is invalid (letters, hyphens, ', only)</span><br>";
   	}

	if(!preg_match($reg_email, $email))
	{
		$error .= "<span class=\"error\">Your email is invalid</span><br>";
	}
	return $error;
}
?>
