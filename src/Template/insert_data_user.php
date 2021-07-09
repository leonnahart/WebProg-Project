<?php
 
require ("config.php");

$sql = "INSERT INTO user (username, password, level)
VALUES ('user_1', 'password_1', 1);";
$sql .= "INSERT INTO user (username, password, level)
VALUES ('user_2', 'password_2', 2);";
$sql .= "INSERT INTO user (username, password, level)
VALUES ('user_3', 'password_3', 3)";

if (mysqli_multi_query($conn, $sql)) {
  echo "<h3>New records created successfully</h3>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
 
?> 



 