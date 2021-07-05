<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page
 
if ($_SESSION["LEVEL"] == 1) { 	//only user level 1 can access

     
	     $studentName = $_POST["name"];
	     $studentIC = $_POST["ic"];
	     $studentMatric = $_POST["matric"];
		 $ID = $_POST["id"];
 		 
	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "UPDATE student SET name = '$studentName', ic = '$studentIC', matric = '$studentMatric' WHERE id = '$ID'" ;

	     if (mysqli_query($conn, $sql)) {
			echo "<h3>Record updated successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
          mysqli_close($conn);
		  
		 echo "<p><a href='view_student.php'>Click here to view updated list of students</a></p>";
		 echo "<p><a href='view_subject.php'>Click here to view all subjects</a></p>";
		 echo "<p><a href='search_form.php'>Search subjects offered</a></p>";
	  
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
  echo "<p><a href='main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='logout.php'>LOGOUT</a></p>";
 
   }
 
  ?>
	