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


<!//echo results/>
Thank you <?php echo $_POST["name"]; ?>!<br>
You are at ext <?php echo $_POST["extension"]; ?>.
Your email is <?php echo $_POST["email"]; ?><br>
You are having a problem with <?php echo $_POST["issue"]; ?><br>
You are in <?php echo $_POST["location"]; ?><br>
It is a <?php echo $_POST["priority"]; ?><br>
and you described it as:<br><?php echo $_POST["description"]; ?><br>
and the photo attached was:<br><img src="<?php echo $_POST["photoupload"]; ?>" alt="your upload" />

<!//submit data/>
<? php
$name = $_POST["name"]; 
$ext = $_POST["extension"];
$email = $_POST["email"];
$issue = $_POST["issue"];
$loc = $_POST["location"];
$priority = $_POST["priority"];
$desc = $_POST["description"];
$photo = $_POST["photoupload"];
$date = date('Y-m-d H:i:s');

mysql_connect($GLOBALS['mysql_host'],$GLOBALS['mysql_user'],$GLOBALS['mysql_pass']);
@mysql_select_db($db) or die( "Unable to select database");

$query = "INSERT INTO incident VALUES ('','$priority','$desc','','$loc','$date', '', '', '$photo')";
mysql_query($query);

mysql_close();
?>
<br>
Thank you for your submission have a nice day!

</body>
</html>