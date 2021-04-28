<?php
include('config.php');

$sql = "SELECT revid FROM revisions";

$result= mysqli_query($con, $sql) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
    foreach($row as $cname => $cvalue){
        echo "<link rel='stylesheet' href='style.css'/>Revision ID: $cvalue<br/>";
    }

}

$sql2 = "SELECT page_title FROM revisions";

$result2= mysqli_query($con, $sql2) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result2)){
    foreach($row as $cname => $cvalue){
        echo "<link rel='stylesheet' href='style.css'/> ID: $cvalue<br/>";
    }

}
?>
