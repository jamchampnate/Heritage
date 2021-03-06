<?php
session_start();
//Run included PHP scripts to setup the sql database
require_once "config.php";
require_once "mysql.php";
$db = new MySQL($GLOBALS['mysql_host'], $GLOBALS['mysql_user'], $GLOBALS['mysql_pass'], $GLOBALS['mysql_db']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
	<!Title>
        <title>Maintenance Request Form - Heritage Schools, Inc.</title>

	<!style sheet>
	<link href="styles.css" rel="stylesheet" type="text/css">

	<!javascripts>
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="replaceSpecialChars.js"></script>

    </head>
    <body>
        <div id="displayArea">
            <form action="sendsub.php" name="requestSubmitForm" id="requestSubmitForm" method="post" >
                <b>Please fill in the following information:</b>
                <br />
                <br />
                <table>
                    <tr>
                        <td width="80">First Name:</td>
                        <td width="160"><input type="text" name="fname" id="fname" tabindex="1"/></td>
                        <td width="40">Last Name:</td>
                        <td width="160"><input type="text" name="lname" id="lname" tabindex="1"/></td>
                        <td>Phone Ext:</td>
                        <td><input type="text" name="extension" id="extension" size="3" maxlength="3" tabindex="2"/></td>
                    </tr>
                    <tr style="height: 35px;">
                        <td>Email:</td>
                        <td><input type="text" name="email" id="email" tabindex="3"/></td>
                        <td>Department:</td>
                        <td><input type="text" name="department" id="department" tabindex="4"/></td>
                    </tr>
                </table>
                <br />
                <b>Please describe the request:</b>
                <br />
                <br />
                <table>
                    <tr>
                        <td width="40">Issue:</td>
                        <td width="160"><input type="text" name="issue" id="issue" tabindex="4" maxlength="45"/><br /></td>
                        <td width="40">Location:</td>
                        <td width="160"><input type="text" name="location" id="location" tabindex="5" maxlength="45"/><br /></td>
                        <td>Priority</td>
                        <td>
                            <select name="priority" id="priority" tabindex="6">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </td>
                    </tr>
					<! --The following code is for the picture upload it nuges the styles a little bit putting larger spaces between the fields. -->
					<tr>    
                        <td width="40">Picture:</td>
                        <td width="160">
                            <input type ="file" name="photoupload" id="photoupload" size="20" tabindex="7" />
                        <br />
                        </td>
                    </tr>
                </table>
                <br />
                Description:
                <br />
                <textarea name="description" id="description" cols="60" rows="7" tabindex="7"></textarea>
                <br />
                <br />
                <input type="submit" name="submit" id="submit" value="Submit" style="width: 75px" tabindex="8"/>
            </form>
        </div>
    </body>
</html>
