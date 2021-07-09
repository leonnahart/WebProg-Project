<?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

?>


<html>
<head><title>List of Registrations</title></head>

<body>

<b>Search for Subjects Offered</b><br/><br/>

<form name="form1" method ="POST" action="view_search_subject.php">

<table border="0">
	<tr>
        <td>Type Subject Code :</td>
        <td><input type="text" name="subjectCode" size="30"></td>
		<td><input type="submit" name="button1" value="Search"></td>
    </tr>
</table>
 
</form>

    <a href="main.php">Go back to main page</a><br/><br/> 
	<a href="logout.php">LOGOUT</a><br/><br/> 
</body>
</html>