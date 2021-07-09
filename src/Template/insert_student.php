<?php
session_start(); // Start up your PHP Session

echo $_SESSION["Login"]; //for session tracking purpose, can delete
echo $_SESSION["LEVEL"]; //for session tracking purpose, can delete

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) { 

	  
	     $studentName = $_POST["studentName"];
	     $studentIC = $_POST["studentIC"];
	     $studentMatric = $_POST["studentMatric"];

	     $studentMatric = strtoupper($studentMatric);  // convert matric to uppercase

		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
		 
	     $sql = "INSERT INTO student(name, ic, matric) VALUES ('$studentName','$studentIC','$studentMatric')" ;

		 if (mysqli_query($conn, $sql)) {
			echo "<h3>New record created successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
        
		
	     mysqli_close($conn);
		 echo "<p><a href='student_form.php'>Click here to insert again</a></p>";
		 echo "<p><a href='view_student.php'>Click here to view updated list</a></p>";
		 echo "<p><a href='view_subject.php'>Click here to view all subjects</a></p>";
		 echo "<p><a href='search_form.php'>Search subjects offered</a></p>";
	   
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
  echo "<p><a href='main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='logout.php'>LOGOUT</a></p>";
 
   }
 
  ?>
	 
