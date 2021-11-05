<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        width: 400px;
        height: fit-content;

        padding: 10px;
        box-sizing: border-box;
        margin: 100px auto;

        border: 2px solid black;
        background-color:#f5c2d3;
        text-align: center;
        
    }
    table{
        margin: 0 auto;
    }
    .text_left{
        text-align: left;
    }
</style>
<body>
    <form action="" method="post">
        <h2>Đăng nhập hệ thống xem điểm</h2>
        <table>
            <tr>
                <td class="text_left">
                    Tên đăng nhập
                </td>
                <td>
                    <input type="text" name="username" >
                </td>
            </tr>
            <tr>
                <td class="text_left">
                    Mật khẩu
                </td>
                <td>
                    <input type="text" name="password" >
                </td>
            </tr>
            <tr>
                <td colspan="2"><button name="submit" value="login">Đăng nhập</button></td>
            </tr>
        </table>
    </form>
    <?php

    if(isset($_POST['username']) && isset($_POST['password']) 
    && $_POST['username'] && $_POST['password'] 
    && (isset($_POST['submit'])&&($_POST['submit']=="login")))
    {   unset($_COOKIE["username"]);
        unset($_COOKIE["password"]);
        $username=$_POST['username'];
        $pass=$_POST['password'];
        setcookie("username", $username, time() + (86400 * 30), "bangdiem.php");
        setcookie("password", $pass, time() + (86400 * 30), "bangdiem.php");
        $newURL="bangdiem.php";
        header('Location: '.$newURL);
    }
 
    ?>
</body>

</html>