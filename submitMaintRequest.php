<?php
session_start();
//comment here
require_once "config.php";
require_once "mysql.php";
$db = new MySQL($GLOBALS['mysql_host'], $GLOBALS['mysql_user'], $GLOBALS['mysql_pass'], $GLOBALS['mysql_db']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Employee Goals - Heritage Schools, Inc.</title>
        <script type="text/javascript" src="jquery.js"></script>


        <script type="text/javascript">
            <!--
            /*
             * Name: replaceSpecialCharacters
             * Parameters: string str
             * Returns: string str
             * Description: Creates two arrays, with each numbered element corresponding to that same numbered element of the other array. str is
             *   			searched for RegExp(chars[i], 'g') and replaced with escapeChars[i].
             */
            function replaceSpecialCharacters(str){
                var chars = new Array("&", "#");
                var escapeChars = new Array("%26", "%23");
                for(var i = 0; i < chars.length; i ++){
                    var search = new RegExp(chars[i], 'g');
                    str = str.replace(search, escapeChars[i]);
                }
                return str;
            }
	
            $(document).ready(function(){
                $("#name").focus();
                $("#submit").click(function(){
                    /* Form check */
                    if($("#name").val() == ''){
                        alert("Please fill out your name");
                        return;
                    }
                    var ok = /^[0-9]{3}$/.test($("#extension").val());
                    if(!ok){
                        alert("Please fill out your three digit extension");
                        return;
                    }
                    ok = /^[a-zA-Z0-9\._]{3,}@heritagertc.org/.test($("#email").val());
                    if(!ok){
                        alert("Please fill out your Heritage email address");
                        return;
                    }
                    if($("#department").val() == ''){
                        alert("Please fill out your department");
                        return;
                    }
                    if($("#issue").val() == ''){
                        alert("Please input the issue");
                        return;
                    }
                    if($("#description").val() == ''){
                        alert("Please input a description of the issue");
                        return;
                    }
                    $.ajax({
                        type: "POST",
                        url: "insiteProcessor.php",
                        data: "module=submitMaintRequest" +
                            "&name=" + $("#name").val() +
                            "&extension=" + $("#extension").val() +
                            "&email=" + $("#email").val() +
                            "&department=" + $("#department").val() +
                            "&issue=" + replaceSpecialCharacters($("#issue").val()) +
                            "&location=" + replaceSpecialCharacters($("#location").val()) +
                            "&priority=" + $("#priority").val() +
                            "&description=" + replaceSpecialCharacters($("#description").val()),
                        success: function(returnData){
                            if(returnData == '0'){
                                alert("Confirmation: Thank you for submitting your request. It has been emailed  to maintenance and will be assessed. You will be notified of any status change.");
                            }
                            else if(returnData == '1'){
                                alert("Your request was submitted but a notification email could not be sent.<br />If problem persists, please call Sonia Hall at x353 in reference to your request.");
                            }
                            else if(returnData == '2'){
                                alert("Your request could not be submitted. Please try again.");
                                return;
                            }
                            window.close();
					
				
                        },
                        error: function(){
                            alert("There was a problem connecting to the database. Please try again");
                        }
                    });
                });
            });
            //-->
        </script>

    </head>
    <body style="background-image: url('templates/joomlage0027-pretender-freedownload/images/wrapperbackground.png');">
        <div id="displayArea">
            <form name="requestSubmitForm" id="requestSubmitForm" method="post" action="submitMaintRequest.php">
                <b>Please fill in the following information:</b>
                <br />
                <br />
                <table>
                    <tr>
                        <td width="40">Name:</td>
                        <td width="160"><input type="text" name="name" id="name" tabindex="1"/></td>
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
                        <td width="160"><input type="text" name="issue" id="issue" tabindex="5" maxlength="45"/><br /></td>
                        <td width="40">Location:</td>
                        <td width="160"><input type="text" name="issue" id="location" tabindex="4" maxlength="45"/><br /></td>
                        <td>Priority</td>
                        <td>
                            <select name="priority" id="priority" tabindex="6">
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br />
                Description:
                <br />
                <textarea name="description" id="description" cols="60" rows="7" tabindex="7"></textarea>
                <br />
                <br />
                <input type="button" name="submit" id="submit" value="Submit" style="width: 75px" tabindex="8"/>
            </form>
        </div>
    </body>
</html>
