<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     .bangdiem{
         width: fit-content;
         height: fit-content;
         padding: 5px;
         margin: 100px auto;
         
         font-size: 30px;
     }
    .color_blue{
        color: #005698;
    }
    .name{
        color: #007fff;
    }
    table {
        background-color: wheat;
        border-color:#ffa600 ;
    }
</style>
<body>
    <div class="bangdiem">

<h3 class="color_blue">BẢNG ĐIỂM</h3>
<?php

if (isset($_COOKIE["username"])) {
    echo "<p class='name'> Tên: " . $_COOKIE["username"] . "</p>";
}

?>
    <table border="1" cellspacing="0" >
        <tr>
            <th>STT</th>
            <th>Tên môn</th>
            <th>Điểm</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Cơ sở dữ liệu</td>
            <td>7</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Phát triển ứng dụng web</td>
            <td>8</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Lập trình java</td>
            <td>7.5</td>
        </tr>
    </table>
    <a href="thongtinsinhvien.php"><i>Xem thông tin sinh viên</i></a>
    <?php


    ?>
    </div>
</body>

</html>