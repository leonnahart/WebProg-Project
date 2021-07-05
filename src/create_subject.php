<?php
 
require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE subject(
		subject_code varchar(8) NOT NULL PRIMARY KEY,
		subject_name varchar(100),
		credit int(2) )";
 

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table subject created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>