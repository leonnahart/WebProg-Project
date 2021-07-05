<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page
 
if ($_SESSION["LEVEL"] == 1) { 	//only user level 1 can access

?>
	<html>
	<head><title>Updating Student Data</title><head>
	<body>
	
	<h1>Update Student Data Form</h1>

<?php
        
		 $ID = $_GET['id'];
		 
		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
		 
	     // Retrieve data from database
		 $sql="SELECT * FROM student WHERE id='$ID'"; 
		 $result = mysqli_query($conn, $sql);
		 $rows=mysqli_fetch_assoc($result);
	   
?>

		 
<form name="form1" method="post" action="update_student.php">
<table border="0" cellspacing="5" cellpadding="0">

<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>Name</strong></td>
<td align="center"><strong>IC</strong></td>
<td align="center"><strong>Matric</strong></td>
<td align="center">&nbsp;</td>
</tr>

<tr>
<td align="center"><input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>"></td>
<td align="center"><input name="name" type="text" id="name" size="30" value="<?php echo $rows['name']; ?>"></td>
<td align="center"><input name="ic" type="text" id="ic" size="15" value="<?php echo $rows['ic']; ?>"></td>
<td align="center"><input name="matric" type="text" id="matric"  size="15" value="<?php echo $rows['matric']; ?>"></td>
<td align="center"><input type="submit" name="Submit" value="Update"></td>
</tr>

</table>

</form>

</body>
</html>

<?php
			 
	     mysqli_close($conn);
	    
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	  
  echo "<p><a href='main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='logout.php'>LOGOUT</a></p>";
  }
  
?>
 
    	

