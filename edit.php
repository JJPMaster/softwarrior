<?php
include_once "isblocked.php";
include "config.php";

if(isset($_POST['but_submit'])){

    $title = mysqli_real_escape_string($con, $_POST['txt_uname']);
    $content = mysqli_real_escape_string($con, $_POST['txt_pwd']);
    $id = mysqli_real_escape_string($con, $_POST['txt_id']);
    $dfsum = 'Created page';
    if ($title != "" && $content != ""){
        $stmt = mysqli_prepare($con, "INSERT INTO pages(id, title, content) VALUES(?, ?, ?);");
        mysqli_stmt_bind_param($stmt, "iss", $_POST['id'], $_POST['txt_pwd'], $_POST['txt_uname']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $query = mysqli_prepare($con, "INSERT INTO revisions(page_title, content, writer, summary) VALUES (?, ?, ?, ?);");
        mysqli_stmt_bind_param($query, "ssss", $_GET['title'], $_GET['txt_pwd'], $_SESSION['uname'], $dfsum);
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        } else{
            echo "ERROR: Could not execute $query. " . mysqli_error($con);
        }
}
?>
<html>
<head>
    <title>Create/edit page - SuperiorWiki</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Create page</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Page title" value="<?php echo($_GET['title']);?>"></input>
                <input type="text" class="textbox" id="txt_uname" name="txt_id" placeholder="Your favorite number" />
            </div>
            <div>
                <textarea type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Page content" cols="264.5" rows="30" style="font-family: Arial"><?php
if($_SERVER['QUERY_STRING'] !== "") {
    $sql_query = "SELECT content FROM pages WHERE title=\"". $_GET['title']. "\"";
    $result= mysqli_query($con, $sql_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $cname => $cvalue){
            echo "\n$cvalue\t";
        }
        echo "\r\n";
}
}
?> </textarea>
            </div>
            <div>
                <br/><input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>
</body>
</html>

