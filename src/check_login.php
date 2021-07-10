<?php 
session_start(); // Start up your PHP Session
 
require('config.php');//read up on php includes https://www.w3schools.com/php/php_includes.asp

// username and password sent from form
$myusername=$_POST["username"];
$mypassword=$_POST["password"];

$sql="SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($conn, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"];
$user_id=$rows["password"];
$user_level=$rows["level"];
	
// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

// Add user information to the session (global session variables)		
$_SESSION["Login"] = "YES";
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] =$user_level;

// Switch case to check for User Level
switch($_SESSION["LEVEL"])
{
    case 1 :
        echo "<h2>You log in as ADMIN</h2>";
        echo "<h3>Hello ".$_SESSION["USER"]." with access level ".$_SESSION["LEVEL"]."</h3>";
        echo "<a href='adminMain.php'>Enter Site</a><br/><br/>";
        echo "<a href='index.php'>Back to login page</a>"; 
        break;
    case 2 :
        header("Location: managerLanding.html"); 
        break;
    case 3 :
        header("Location: staffLanding.html");
        break;
}

//if wrong username and password
} 

else 
{
$_SESSION["Login"] = "NO";
header("Location: index.php");
}

mysqli_close($conn);

?>
