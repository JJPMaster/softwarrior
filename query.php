<?php

if($_GET['action'] == "allpages"){
        include_once "config.php";
        echo "<h1>All pages</h1>";
        $sql_query = "select title from pages";
        $result= mysqli_query($con, $sql_query) or die(mysqli_error($con));
        while($row = mysqli_fetch_assoc($result)){
            foreach($row as $cname => $cvalue){
                echo "<a href='index.php?title=$cvalue'>$cvalue</a><br/><br/>";
            }
            echo "\r\n";
    }   
}
if($_GET['action'] == "userlist"){
        include_once "login-config.php";
        echo "<h1>User list</h1>";
        $sql_query2 = "select username from users";
        $result2= mysqli_query($con, $sql_query2) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_assoc($result2)){
        foreach($row2 as $cname => $cvalue){
            echo "<a href='index.php?title=$cvalue'>$cvalue</a> (<a href='block.php?title=$cvalue'>block</a>)<br/><br/>";
        }
        echo "\r\n";
    }    
}
if($_GET['action'] == "blocklist"){
        include_once "login-config.php";
        echo "<h1>Block list</h1>";
        $sql_query3 = "select username from users where blocked=true";
        $result3= mysqli_query($con, $sql_query3) or die(mysqli_error($con));
    while($row3 = mysqli_fetch_assoc($result3)){
        foreach($row3 as $cname => $cvalue){
            echo "<a href='index.php?title=$cvalue'>$cvalue</a> (<a href='unblock.php?title=$cvalue'>unblock</a>)<br/><br/> ";
        }
        echo "\r\n";
        break;
    }    
}
?>
<link rel="stylesheet" href="style.css"/>
