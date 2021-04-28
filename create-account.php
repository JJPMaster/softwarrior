<?php
include "login-config.php";


if(isset($_POST['but_submit'])){

    $uname = $_POST['txt_uname'];
    $password = hash('sha512', $_POST['txt_pwd']);
    $id = $_POST['txt_id'];
    
    if ($uname != "" && $password != ""){

        $sql_query = "INSERT INTO users(id, username, hash) VALUES($id, '$uname', '$password');";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        echo('Account created. Please log in to your account at <a href="./">the main page</a>.');
    }
    if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
}
?>
<html>
<head>
    <title>Create account on realwebsite.tk</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Create account</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_id" placeholder="Your favorite number" />
            </div>
            <div>
                <br/><input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
    </form>
</div>
</body>
</html>

