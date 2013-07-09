<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
<title>View Reports</title>

<link href="styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
</style>

<script>
    function sendPHP($input) 
    {
        $qry = $input;
    }

</script>
</head>

<body>

    <img alt="Heritage School" src="../Graphics/logo.png" />

<!-- View Reports -->
<input id="1R" type="button" value="First Report"  tabindex="1" onclick="sendPHP($qry1)" />
<input id="2R" type="button" value="Second Report" tabindex="2" onclick="sendPHP($qry2)"/>
<input id="3R" type="button" value="Third Report" tabindex="3" onclick="sendPHP($qry3)" />
<input id="4R" type="button" value="Fourth Report" tabindex="4" onclick="sendPHP($qry4)"/>

<br /><br /><br />


<div>
<!-- PHP goes here -->
RunQry($qry);

</div>

</body>
</html>