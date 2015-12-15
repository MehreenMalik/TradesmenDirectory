<?php require_once("include/db_connect.php");

if(isset($_REQUEST['submitted']))
{

	$error = validate_form();
	if($error)
	{
		display_sign_up_page($error);
	}
	else
	{
		display_confirmation_page();
		// Minimal form validation:
	if (!empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['dob']) && !empty($_POST['lastName'])) {

		// Create the body:
		$body = "Name: {$_POST['firstName']}\nSurname: {$_POST['lastName']}\nDate Of Birth: {$_POST['dob']}\nEmail: {$_POST['email']}";

		// Make it no longer than 70 characters long:
		$body = wordwrap($body, 70);

		// Send the email:
		mail("{$_POST['email']}", 'Yourjobdone Registration', $body, "From: postmaster@localhost");

		// Print a message:
		echo '<p><em>Thank you for registering. Please confirm your email.</em></p>';


		// Clear $_POST (so that the forms not sticky):
		$_POST = array();

	}
	else
	  {
		echo '<p style="font-weight: bold; color: #C00">Please fill out the form completely.</p>';
	  }
	}
}
else
{
	display_sign_up_page('');
}

?>


<?php
function display_sign_up_page($error)
{
	$self = $_SERVER['PHP_SELF'];
	$title = isset($_REQUEST['title'])? $_REQUEST ['title']:'';
	$firstName = isset($_REQUEST['firstName'])? $_REQUEST ['firstName']:'';
	$lastName = isset($_REQUEST['lastName'])? $_REQUEST	['lastName']:'';
	$password = isset($_REQUEST['password'])? $_REQUEST	['password']:'';
	$dob = isset($_REQUEST['dob'])? $_REQUEST ['dob']:'';
	$email = isset($_REQUEST['email'])? $_REQUEST['email']:'';
	$trade = isset($_REQUEST['trade'])? $_REQUEST['trade']:'';
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


<form action="<?php echo $self ?>" method="post" style="width:35%; padding:2em;">

<fieldset style="border:solid grey;">
<legend>Enter your personal details</legend>

<label>Title:</label><br>
<select name="title" required>
	<option value="" selected="selected">select</option>
	<option value="Mr">Mr</option>
	<option value="Miss">Miss</option>
	<option value="Mrs">Mrs</option>
	<option value="Ms">Ms</option>
	<option value="Dr">Dr</option>
	<option value="Prof">Prof</option>
</select><br>

<label>First Name:</label><br> <input type="text" name="firstName" required><br>

<label>Last Name:</label><br> <input type="text" name="lastName" required><br>

<label>Password:</label><br> <input type="password" name="password" required><br>

<label>Date of birth:</label><br> <input type="date" name="dob" required><br>

<label>Email:</label><br> <input type="email" name="email" required><br>
</fieldset>

<fieldset style="border:solid grey;">
<legend>Enter your professional details</legend>

<label>Primary trade:</label><br>
	<select name="trade" required>
		<option value="" selected="selected">select</option>
		<option value="bricklayer">BrickLayer</option>
		<option value="builder">Builder</option>
		<option value="carpenter">Carpenter</option>
		<option value="cleaner">Cleaner</option>
		<option value="electrician">Electrician</option>
		<option value="gardener">Gardener</option>
		<option value="drivewayService">Driveway services</option>
		<option value="locksmith">Locksmith</option>
		<option value="loftConversion">Loft conversions</option>
		<option value="painter">Painter</option>
		<option value="pestControl">Pest Control</option>
		<option value="plastering">Plastering</option>
		<option value="plumbing">Plumber</option>
		<option value="security">Security</option>
		<option value="stonework">Stone work and masonry</option>
		<option value="tiling">Tiling</option>
	</select>
</fieldset>

<fieldset style="border:solid grey;">
<legend>User Agrreement</legend>
	<p>
		By clicking 'Submit' I agree that:<br>
		I have read and accept the <a href="user-agreement.php" target="_blank">User agreement</a> and <a href="privacy-policy.php" target="_blank">Privacy Policy</a>
		<input type="checkbox" name="agreement" required>
	</p>

		<input type="submit" name="Submit" value="Submit" id="button">
		<input type="hidden" name="submitted" value="TRUE" />
		<input type="reset" name="Reset" value="Reset" id="button">
</fieldset>

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
	$title = $_REQUEST['title'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$password = $_REQUEST['password'];
	$dob = $_REQUEST['dob'];
	$email = $_REQUEST['email'];
	$trade = $_REQUEST['trade'];

	$db_link = db_connect('$email_signup');
	$sql = mysql_query("INSERT INTO `users` VALUES(NULL,'$firstName','$password','$email')");

    $result = "";
?>

<?php
include ('include/header.html');
?>

<?php
	if($result)
	{
		echo "Thank you ".$name.". Your profile has been created.";
	}

}
?>
</div>
</body>
</html>

<?php function validate_form()
{
	$title = $_REQUEST['title'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$password = $_REQUEST['password'];
	$dob = $_REQUEST['dob'];
	$email = $_REQUEST['email'];
	$trade = $_REQUEST['trade'];
	$error = '';

	$reg_exp = "^[a-zA-Z\-\']+$^";
	$reg_email = "^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$^";

	if (!preg_match($reg_exp, $firstName))
	{
	   $error .= "<span class=\"error\">First name is invalid (letters, hyphens, ', only)</span><br>";
   	}

   	if (!preg_match($reg_exp, $lastName))
	{
	   $error .= "<span class=\"error\">Last name is invalid (letters, hyphens, ', only)</span><br>";
   	}

	if(!preg_match($reg_email, $email))
	{
		$error .= "<span class=\"error\">Email is invalid</span><br>";
	}
	return $error;
}
?>
