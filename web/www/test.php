<?php
$con = mysql_connect("localhost","root","admin");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("my_blog", $con);

$sql="INSERT INTO users (user_name, psw)
VALUES
('$_POST[user_name]','$_POST[psw]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>
