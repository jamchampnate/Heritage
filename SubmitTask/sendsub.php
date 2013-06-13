<?php

//This php script is used to submit form data into a SQL database
//Written by Sean LeFevre
session_start();
//Run included PHP scripts to setup the sql database
require_once "config.php";
require_once "mysql.php";
$db = new MySQL($GLOBALS['mysql_host'], $GLOBALS['mysql_user'], $GLOBALS['mysql_pass'], $GLOBALS['mysql_db']);
//$imagename = $_POST["photoupload"]


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<!Title>
        <title>Maintenance Form Submission - Heritage Schools, Inc.</title>

	<!style sheet>
	<link href="styles.css" rel="stylesheet" type="text/css">

</head>

<html>
<body>



Thank you <?php echo $_POST["fname"]; echo " "; echo $_POST["lname"]; ?>!<br>
You are at ext <?php echo $_POST["extension"]; ?>.
Your email is <?php echo $_POST["email"]; ?><br>
You are having a problem with <?php echo $_POST["issue"]; ?><br>
You are in <?php echo $_POST["location"]; ?><br>
It is a <?php echo $_POST["priority"]; ?> priority<br>
and you described it as:<br><?php echo $_POST["description"]; ?><br>



<?php
require_once "config.php";
$fname = $_POST["fname"]; 
$lname = $_POST["lname"];
$ext = $_POST["extension"];
$email = $_POST["email"];
$issue = $_POST["issue"];
$loc = $_POST["location"];
$priority = $_POST["priority"];
$desc = $_POST["description"];
//$photo = $_POST["photoupload"];
$date = date('Y-m-d H:i:s');

$con=mysqli_connect($GLOBALS['mysql_host'], $GLOBALS['mysql_user'], $GLOBALS['mysql_pass'], $GLOBALS['mysql_db']);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo "\nConnected correctly\n";
$sql="INSERT INTO incident (Priority, Category, Description, Location)
VALUES('$priority','$issue','$desc','$loc')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);


?>
<br>
Thank you for your submission have a nice day!

</body>
</html>