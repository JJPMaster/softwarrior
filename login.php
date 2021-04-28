<?php
include "login-config.php";


if(isset($_POST['but_submit'])){

    $uname =  $_POST['txt_uname'];
    $password = hash('sha512', $_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='$uname' and hash='$password'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: index.php');
        } else {
            echo "Invalid username and password";
        }

    }

}
?>
<html>
<head>
    <title>Login</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Login</h1>
            <div>
                <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            </div>
            <div>
                <br/><input type="submit" value="Submit" name="but_submit" id="but_submit" />
            </div>
        </div>
        <br/><a href="/create-account.php">Click here to create an account</a>
    </form>
</div>
</body>
</html>

