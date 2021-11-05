<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        background-color: #ffea5b;
    }
    form{
        border: 1px solid black;
        width: fit-content;
        margin: 50px auto;
    }
    .result{
        width: 300px;
        box-sizing: border-box;
        padding: 10px;
        margin: -10px auto;
        border: 1px solid black;
    }
</style>
<body>
    <?php
    include "nhanvien.php";
    ?>
    <form action="#" method="post">
        <table>
            <tr>
                <td>Mã nhân viên</td>
                <td><input type="text" name="ma"></td>
            </tr>
            <tr>
                <td>Tên nhân viên</td>
                <td><input type="text" name="ten"></td>
            </tr>
            <tr>
                <td>Số ngày làm việc</td>
                <td><input type="text" name="songay"></td>
            </tr>
            <tr>
                <td>Lương ngày</td>
                <td><input type="text" name="luongngay"></td>
            </tr>
            <tr>
                <td>Nhân viên quản lý</td>
                <td><input type="checkbox" name="quanly"></td>
            </tr>
            <tr>
                <td><button name="submit" value="Tinh">Lương tháng</button></td>

            </tr>
        </table>
    </form>
    <?php
    if (
        isset($_POST['submit']) && $_POST['submit'] == "Tinh" && isset($_POST['ma'])
        && isset($_POST['ten']) && isset($_POST['songay']) && isset($_POST['luongngay'])
    ) {
        $ma = $_POST['ma'];
        $ten = $_POST['ten'];
        $songay = (int)$_POST['songay'];
        $luongngay = (float)$_POST['luongngay'];
        if ($ma && $ten && $songay && $luongngay) {
            if (isset($_POST['quanly'])) {
                $quanly = new nhanvienQL();
                $quanly->Gan($ma, $ten, $songay, $luongngay);
                echo"<div class='result'> <h2>Kết quả</h2>";
                echo "<b>Tổng Số Lương:</b> ".$quanly->TinhLuong()."<br>";
                $quanly->InNhanVien();
                echo "</div>";

            } else {
                $nhanvien = new nhanvien();
                $nhanvien->Gan($ma, $ten, $songay, $luongngay);
                echo"<div class='result'> <h2>Kết quả</h2>";
                echo "<b>Tổng Số Lương:</b> ".$nhanvien->TinhLuong()."<br>";
                $nhanvien->InNhanVien();
                echo "</div>";
            }
        }
        else{
            echo "<b>Dữ liệu nhập SAI!!!</b>";
        }   
    }
   
    ?>
</body>

</html>