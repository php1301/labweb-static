<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     .info{
         width: fit-content;
         height: fit-content;
         padding: 5px;
         margin: 100px auto;
         
         font-size: 30px;
     }
     .color_blue{
        color: #005698;
        font-weight: bold;
    }
    .title{
        color: #007fff;
    }
</style>
<body>
    <div class="info">

    <h3 class="title">Thông Tin Sinh Viên</h3>
    <?php
if (isset($_COOKIE["username"])&&isset($_COOKIE["password"])) {
    echo "<p class='color_blue'> Tên: " . $_COOKIE["username"] . "</p>";
    echo "<p class='color_blue'> Mật khẩu: " . $_COOKIE["password"] . "</p>";
}
?>
    </div>
</body>
</html>