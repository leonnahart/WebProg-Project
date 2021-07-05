<?php
 
require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp


$sql = "CREATE TABLE student(
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 		name VARCHAR(100),
 		ic VARCHAR(12),
		matric VARCHAR(8) NOT NULL)";

if (mysqli_query($conn, $sql)) {
  echo "<h3>Table student created successfully</h3>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>