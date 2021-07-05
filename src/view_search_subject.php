<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");

?>

<html>
	<head><title>Subject List</title><HEAD>
	<body>
 
	  <?php
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
		 
		 $find=$_POST['subjectCode'];
		 
	     $sql = "SELECT * FROM subject WHERE subject_code LIKE '%$find%'"; //using LIKE operator https://www.w3schools.com/sql/sql_like.asp
	     
		 $result = mysqli_query($conn, $sql);
		 
		 if (mysqli_num_rows($result) > 0) {
			
			?>
			
		<!-- Start table -->
		<h3>Your search result:</h3>
		<table width="600" border="1" cellspacing="0" cellpadding="3">
		 
		<!-- Print table heading -->
		<tr>
		<td align="center"><strong>Subject Code</strong></td>
		<td align="center"><strong>Subject Name</strong></td>
		<td align="center"><strong>Credit</strong></td>
	 	</tr>
		
		
		<?php
		// output data of each row
		 while($rows = mysqli_fetch_assoc($result)) {
	  
	       echo "<TR align=center>\n";
	       echo "<TD align=left>", $rows["subject_code"], "</TD>",
				"<TD>",    $rows["subject_name"],"</TD>",
	            "<TD>", $rows["credit"], "</TD>\n";
	       echo "</TR>\n";
	     } ?>
	 

		</table>  
		
		<?php
	   		}
			else {
				echo "<h3>No records found</h3>"; }
	     
	     mysqli_close($conn);
	   ?>
	 
<?php 			
	if ($_SESSION["LEVEL"] == 1) {?>
	
	<br/><br/><a href="subject_form.php">Click here to insert more subject</a><?php } ?>  
		
	<br/><br/><a href="search_form.php">Search subjects offered</a>

	<br/><br/><a href="main.php">Go back to main page</a>	 

	<br/><br/><a href="logout.php">LOGOUT</a>	
	   
	
 
