<?php
session_start();
$host = "localhost"; /* Host name */
$user = "USER_DATABASE_USERNAME"; /* User */
$password = "USER_DATABASE_PASSWORD"; /* Password */
$dbname = "USER_DATABASE_NAME"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    echo("Connection failed: " . mysqli_connect_error());
    die();
}
