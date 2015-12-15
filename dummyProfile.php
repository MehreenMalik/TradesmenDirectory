<?php
include ('include/userHeader.html');
?>

<?php
require_once("include/db_connect.php");
$db_link = db_connect('tradesmendirectory');
$query ="SELECT * FROM tradesman ORDER BY RAND() LIMIT 1";
$result = @mysql_query($query) or die("Could not execute SQL query");

while($row = mysql_fetch_array($result))
{
?>
<table style="padding:2em;">
	<tr>
		<td rowspan="7"> <img src="images/untitled.png" width=150 id="profilePicture"> </td>
	</tr>

	<tr>
		<td> <label>Title:</label> </td>
		<td> <input type="text" name="Title" value="<?php echo $row["Title"]; ?>"> </td>
	</tr>

	<tr>
		<td> <label>First Name:</label> </td>
		<td> <input type="text" name="First_Name" value="<?php echo $row["First_Name"];?>"> </td>
	</tr>

	<tr>
		<td> <label>Last Name:</label> </td>
		<td> <input type="text" name="Last_Name" value="<?php echo $row["Last_Name"];?>"> </td>
	</tr>

	<tr>
		<td> <label>Date of birth:</label> </td>
		<td> <input type="date" name="D.O.B" value="<?php echo $row["D.O.B"];?>"> </td>
	</tr>

	<tr>
		<td> <label>Primary Trade:</label> </td>
		<td> <input type="text" name="Primary_Trade" value="<?php echo $row["Primary_Trade"];?>"> </td>
	</tr>

	<tr>
		<td> <label>Education:</label> </td>
		<td> <textarea rows="3" cols="30">Bachelor of Science in Horticulture from ITB(2006-2009)</textarea> </td>
	</tr>
</table>

<h3>Feedback</h3>
<table style="padding:2em;">
	<tr>
		<td> <img src="images/untitled.png" width=150 id="profilePicture"> </td>
		<td> <p>Feedback by Zack White, 12-02-2010</p>
		     <p>Amazing gardener. I hired her to redesign our backyard, she did an amazing job.</p>
		</td>
	</tr>

	<tr>
		<td rowspan="3"> <img src="images/untitled.png" width=150 id="profilePicture"> </td>
		<td> <p>Feedback by Alice King, 12-02-2013</p>
		     <p>One of the best gardeners I've ever hired,</p> </td>
		</td>
	</tr>
</table>

<?php
}
?>
</div>
</body>
</head>