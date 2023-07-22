<?php
define('DB_SERVER','127.0.0.1');
define('DB_USER','u983196490_sageer');
define('DB_PASS' ,'Sageer@1234');
define('DB_NAME','u983196490_sourch');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>