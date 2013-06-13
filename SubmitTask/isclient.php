<?php
function IsClient($first, $last, $mail, $ext, $loc)
{
	$con=mysqli_connect($GLOBALS['mysql_host'], $GLOBALS['mysql_user'], $GLOBALS['mysql_pass'], $GLOBALS['mysql_db']);

	$clisql = "SELECT ClientID FROM client WHERE (ClientFName = '$first' AND ClienLName = '$last')";
	$res = mysqli_query($con, $clisql)
	if($res >= 0)
	{
		echo "Client found!"
		return $res;
	}
	$ins = "INSERT INTO client (ClientFName, ClientLName, ClientPhoneNumber, ClientEmail, ClientLocation)";
	VALUES($first, $last, $mail, $ext, $loc)";
	if(!mysqli_query($con, $ins))
	{
		die('Error: ' . mysqli_error($con));
  	}
		echo" Client Created!"
	$res = if(!mysqli_query($con, $clisql))
		{
		  die('Error: ' . mysqli_error($con));
  		}	
	if($res)
	{
		echo "Client found!"
		return $res;
	}
	echo "Client fail"
	return "null";

	mysqli_close($con);

}
?>