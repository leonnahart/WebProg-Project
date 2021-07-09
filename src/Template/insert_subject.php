<?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

echo $_SESSION['Login'];
echo $_SESSION['LEVEL'];
 
if ($_SESSION["LEVEL"] == 1) { 
			
	     $subjectCode = $_POST["subjectCode"];
	     $subjectName = $_POST["subjectName"];
	     $credit = $_POST["credit"];

	     require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "INSERT INTO subject(subject_code, subject_name, credit) VALUES ('$subjectCode','$subjectName','$credit')" ;

	  	 if (mysqli_query($conn, $sql)) {
			echo "<h3>New subject inserted successfully</h3>";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}

	     mysqli_close($conn);
		 
		 echo "<p><a href='subject_form.php'>Click here to insert again</a></p>";
		 echo "<p><a href='view_subject.php'>Click here to view updated list</a></p>";
		 echo "<p><a href='search_form.php'>Search subjects offered</a></p>";
	  
// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
	
  echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	 
  echo "<p><a href='main.php'>Go back to main page</a></p>";
  
  echo "<p><a href='logout.php'>LOGOUT</a></p>";
 }
 
 
  
  