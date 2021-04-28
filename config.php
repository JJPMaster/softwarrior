<?php
session_start();
$host = "localhost"; /* Host name */
$user = "DATABASE_USERNAME"; /* User */
$password = "DATABASE_PASSWORD"; /* Password */
$dbname = "DATABASE_NAME"; /* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
    echo("Connection failed: " . mysqli_connect_error());
    die();
}
