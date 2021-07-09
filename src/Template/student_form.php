<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) { 

?>


<html>
<head><title>Inserting Student Data</title></HEAD>
<body>

 
<h1>Student Data Form</h1>

<p>Please fill in the following information:<br><br>

<form name="form1" method="POST" action="insert_student.php" >
<table border="0">
	<tr>
        <td>Student's Name</td>
        <td><INPUT type="text" name="studentName" size="50"></td>
    </tr>
    <tr>
		<td>IC Number</td>
		<td><INPUT type="text" name="studentIC" size="15"></td>
	</tr>
	<tr>
		<td>Matric Number</td>
		<td><input type="" name="studentMatric" size="8" style="text-transform:uppercase;"></td>
	</tr>
	<tr>
		<td></td><td align="left"><br/><input type="submit" name="button1" value="Submit"></td>
	</tr>
</table>
</form>
	</body>
	</html>


<?php 
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
 
  echo "<p><a href='main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='logout.php'>LOGOUT</a></p>";}
 
  
 
   
	

