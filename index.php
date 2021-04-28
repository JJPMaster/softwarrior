<?php
include("config.php");
if($_SERVER['QUERY_STRING'] !== "") {
    echo("<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\" /><h1>". $_GET['title']. "</h1>");
    $sql_query = "SELECT content FROM pages WHERE title=\"". $_GET['title']. "\"";
    $result= mysqli_query($con, $sql_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $cname => $cvalue){           
            echo "$cvalue\t";
        }
        echo "\r\n";
    }
}
else {
    header("Location: index.php?title=Main Page");
}
?> 
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8" />
        <meta name="robots" content="index, nofollow" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div style="position: absolute; top: 16px;  right: 16px;  font-size: 18px;"><?php
$sql_query = "SELECT * FROM pages WHERE title=\"". $_GET['title']. "\"";
$result = mysqli_query($con, $sql_query);
$rowcount=mysqli_num_rows($result); 
if(!($rowcount > 0)){
    echo "<a href=\"edit.php?title=". $_GET['title']. "\">Create this page</a>";
} else{
    echo "<a href=\"new_edit.php?title=". $_GET['title']. "\">Edit this page</a>";
}

?></div>
    </body>
</html>
