<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) { //only user level 1 can acess

?>

<html>
<head><title>Inserting Subject Data</title></head>
<body>

 
<h1>Subject Data Form</h1>

<p>Please fill in the following information:<br><br>

<form name="form1" method="POST" action="insert_subject.php" >
<table border="0">
	<tr>
        <td>Subject Code</td>
        <td><input type="text" name="subjectCode" size="15"></td>
    </tr>
    <tr>
		<td>Subject Name</td>
		<td><input type="text" name="subjectName" size="50"></td>
	</tr>
	<tr>
		<td>Credit</td>
		<td><input type="text" name="credit" size="3"></td>
	</tr>
	<tr>
		<td></td><td align="left"><BR><input type="submit" name="button1" value="Submit"></td>
	</tr>
</table>
</form>
</body>
</html>


<?php 
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
  echo "<p><a href='index.php'>Back to main page</a></p>";
    }
  
  ?>
  
  
 

