<?php
include("login-config.php");
$sql = "UPDATE users SET blocked=0 WHERE username=\"". $_GET['title']. "\"";

$result= mysqli_query($con, $sql) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
    foreach($row as $cname => $cvalue){
        echo "User unblocked.";
    }
    echo "\r\n";
}



$con->close();

?>
