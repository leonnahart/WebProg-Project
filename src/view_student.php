<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
header("Location: index.php");

if ($_SESSION["LEVEL"] != 3) {   //only user with access level 1 and 2 can view

?>
	 	
	<html>
	<head><title>Viewing Student Data</title><head>
	<body>
		
	<h1>View Student Details</h1>
	
		<?php
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
	     
	     $sql = "SELECT * FROM student";
		 $result = mysqli_query($conn, $sql);
	
		 if (mysqli_num_rows($result) > 0) { 	?>
			 
		<!-- Start table tag -->
		<table width="600" border="1" cellspacing="0" cellpadding="3">
		 
		<!-- Print table heading -->
		<tr>
		<td align="center"><strong>Name</strong></td>
		<td align="center"><strong>IC</strong></td>
		<td align="center"><strong>Matric</strong></td>
		
		<?php if ($_SESSION["LEVEL"] == 1) {?>
		<td align="center"><strong>Update</strong></td>
		<td align="center"><strong>Delete</strong></td>
		<?php } ?>
		
		</tr> 
		
		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($result)) {
		?>
		
	     <tr>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['ic']; ?></td>
			<td><?php echo $rows['matric']; ?></td>
			
		<?php if ($_SESSION["LEVEL"] == 1) {?> 
			<!--only user with access level 1 can view update and delete button-->
			<td align="center"> <a href="update_form.php?id=<?php echo $rows['id']; ?>">update</a> </td>
			<td align="center"> <a href="delete_student.php?id=<?php echo $rows['id']; ?>">delete</a> </td>
		</tr> 

		<?php }
		
			}
		} else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($conn);
	   ?>
	    
	    </table>
		
		
		<?php if ($_SESSION["LEVEL"] == 1) {?>
		<br><br>
		<a href="student_form.php">Click here to insert student</a><?php } ?>  
		
		<br><br>
		<a href="view_subject.php">Click here to view all subjects</a> <br/><br/>   
		<a href="search_form.php">Search subjects offered</a>          <br/><br/> 
	    <a href="logout.php">LOGOUT</a>
 
 	<?php } // If the user is not correct level
	else if ($_SESSION["LEVEL"] == 3) {
	
	echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
	echo "<p><a href='main.php'>Back to main page</a></p>";
	
	echo "<p><a href='logout.php'>LOGOUT</a></p>";
 
   }
 
  ?>
	</body>
	</html>
	

