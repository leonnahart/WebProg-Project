<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");

?>
	
	<html>
	<head><title>Viewing Subject Data</title><head>
	<body>
	
	<h1>View Subject Data</h1>
	
	 
		<?php
	     require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "SELECT * FROM subject";
		 $result = mysqli_query($conn, $sql);

	     if (!$result) die("SQL query error encountered :".mysqli_error() );
		 
		
		 if (mysqli_num_rows($result) > 0) { ?>
					
						 
		<!-- Start table tag -->
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
		 
		?>
		
	     <tr>
			<td><?php echo $rows['subject_code']; ?></td>
			<td><?php echo $rows['subject_name']; ?></td>
			<td><?php echo $rows['credit']; ?></td>
		</tr>


	<?php }
		
			}
		else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>
	    
	    </table>

<?php 			
	if ($_SESSION["LEVEL"] == 1) {?>
	<br/><br/>
	<a href="subject_form.php">Click here to insert more subject</a><?php } ?>  
		
	<br/><br/>
	<a href="search_form.php">Search subjects offered</a>

	<br/><br/>
	<a href="main.php">Go back to main page</a>

	<br/><br/>
	<a href="logout.php">LOGOUT</a>
	   
	
 
	
	

