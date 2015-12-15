<?php

if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	require_once ("include/db_connect.php");
	$db_link = db_connect('tradesmendirectory');
	$regExpression = "/^[a-zA-Z0-9]+$/";

	if (!empty($_POST['email'])) // Validate the email address:
	{
		$e = preg_match($regExpression, $_REQUEST['email']) ? $_REQUEST['email']:"";
	}
	else
	{
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}

	if (!empty($_POST['password'])) // Validate the password:
	{
		$p = preg_match($regExpression, $_REQUEST['password']) ? $_REQUEST['password']:"";
	}
	else
	{
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}

	if ($e && $p) // If everythings OK.
	{
		// Query the database:
		$q = "SELECT * FROM tradesman WHERE Email='$e' AND Password='$p'";
		$r = mysqli_query ($db_link, $q);

		if (@mysqli_num_rows($r) == 1) // A match was made.
		{
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			mysql_close($db_link);
			display_admin_page();
		}
		else // No match was made.
		{
		    display_login_page();
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
		}

	}
	mysql_close($db_link);
}
else
	{
		display_login_page();
	}
?>

<?php
function display_login_page()
{
?>
<?php
include ('include/header.html');
?>
<h2>User login</h2>
<form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<table style="width:20%;">
	<tr>
		<td>Email: <input type="text" name="email"></td>
	</tr>

	<tr>
		<td>Password: <input type="password" name="password"></td>
	</tr>

	<tr>
		<td><input type="submit" name="submit" value="Login"></td>
	</tr>
</table>
</form>
</body>
</html>
<?php
}
?>

<?php
function display_admin_page()
{
?>
<?php
include ('include/userHeader.html');
?>
You have successfully logged in as user: <strong><?php echo $_SESSION['valid_user']?></strong>

</body>
</html>
<?php
}
?>