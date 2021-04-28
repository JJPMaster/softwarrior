<?php
include_once "isblocked.php";
include "config.php";

if(isset($_POST['but_submit'])){
    $un = $_SESSION['uname'];
    $content = mysqli_real_escape_string($con, $_POST['txt_pwd']);
    $title = mysqli_real_escape_string($con, $_GET['title']);
    $summary = mysqli_real_escape_string($con, $_POST['summary']);
    echo($_SESSION['blocked']);
    if ($content != ""){

        $stmt = mysqli_prepare($con, "UPDATE pages SET content=? WHERE title=?; ");
        mysqli_stmt_bind_param($stmt, "ss", $_POST['txt_pwd'], $_GET['title']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $query = mysqli_prepare($con, "INSERT INTO revisions(page_title, content, writer, summary) VALUES (?, ?, ?, ?);");
        mysqli_stmt_bind_param($query, "ssss", $_GET['title'], $_GET['txt_pwd'], $un, $summary);
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        } else{
            echo "ERROR: Could not execute $query. " . mysqli_error($con);
        }
    }

if(isset($_POST['preview'])){

    $content = mysqli_real_escape_string($con, $_POST['txt_pwd']);
    
    if ($content != ""){
        
        $var = "<span style=\"color:red\">Below is a <i>preview</i> of your changes. They will not be saved until you click the \"Save changes\" button.</span><br/><hr/> <div style=\"width: 300px; border: 1px solid grey; padding: 50px;\">". $_POST['txt_pwd']. "</div>";
        
        echo $var;
        
        
    }
}
?>

    
<html>
<head>
    <title>Edit page - SuperiorWiki</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Editing page: <?php echo($_GET['title']);?></h1>
            <div>
                
<textarea type="text" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Page content" cols="264.5" rows="30" style="font-family: Arial">'
<?php
if($_SERVER['QUERY_STRING'] !== "") {
    $sql_query = "SELECT content FROM pages WHERE title=\"". $_GET['title']. "\"";
    $result= mysqli_query($con, $sql_query) or die(mysqli_error($con));
    while($row = mysqli_fetch_assoc($result)){
        foreach($row as $cname => $cvalue){
            echo "$cvalue\t";
        }
        echo "\r\n";
}
}

?> </textarea>
            <input type="text" value="" name="summary" id="summary" placeholder="Enter a short summary of your changes in this field."/>
            </div>
            <div>

                <br/><input type="submit" value="Save changes" name="but_submit" id="but_submit" />
 
                <input type="submit" value="Preview changes" name="preview" id="preview" title="This option is temporarily disabled." disabled/>
                
<input type="button" onclick="location.href='http://superiorwiki.000webhostapp.com/index.php?title=<?php echo($_GET['title']);?>'" value="Cancel changes"></button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

