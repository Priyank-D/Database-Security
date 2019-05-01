<?php
include("config.php");
session_start();
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form


    $myusername = $_POST['username'];
    $mypassword = $_POST['user_password'];
    $sql = "SELECT u_rolecode FROM system_users WHERE u_username = '$myusername' and u_password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['active'];
    while ($row = $result->fetch_assoc()) {
        $_SESSION['active'] = $row['u_rolecode'];
    }
    $count = mysqli_num_rows($result);

    if($count == 1) {
        if(!isset($_SESSION['myusername']))
            $_SESSION['login_user'] = $myusername;

        header("location: welcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<head>
    <title>Login Page</title>

    <style type = "text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }
        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }
        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="username"><span class="required">*</span>Username:</label>
                    <div class="col-lg-6">
                        <input type="text" value="" placeholder="User Name" id="username" class="form-control" name="username" required="" >
                    </div>
                </div>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="user_password"><span class="required">*</span>Password:</label>
                    <div class="col-lg-6">
                        <input type="password" value="" placeholder="Password" id="user_password" class="form-control" name="user_password" required="" >
                    </div>
                </div>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

                <div class="form-group">
                    <div class="col-lg-6 col-lg-offset-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error ?></div>

        </div>

    </div>

</div>

</body>
</html>