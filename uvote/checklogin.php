<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Faculty Voting System Access Denied</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="tan">
    
<center><b><font color = "brown" size="6">Faculty Polling</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
<h1>Invalid Info Provided </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();
require('connection.php');



$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); //MD5 Hash for security

$myusername = stripslashes($myusername);
echo $mypassword = stripslashes($mypassword);


$sql=mysqli_query($con, "SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'");


$count=mysqli_num_rows($sql);
// If username and password is a match, the count will be 1

if($count==1){
// forwarded to student.php
$user = mysqli_fetch_assoc($sql);
$_SESSION['member_id'] = $user['member_id'];
header("location:student.php");
}

else {
echo "Wrong Username or Password<br><br>Return to <a href=\"index.php\">login</a>";
}

ob_end_flush();

?> 
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; Designed by group 7</div>
</div>
</div>
</body>
</html>