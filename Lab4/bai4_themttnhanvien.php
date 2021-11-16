<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table tr:first-child {
        background-color: #cfffff;
    }

    .center_text {
        text-align: center;
    }

    form {
        border: 2px solid;
        width: fit-content;
        display: flex;
        justify-content: center;
        margin: 100px auto;
        background-color: #fdccff;

    }

    td+td {
        padding: 5px 20px;
    }
</style>

<body>

    <form method="POST">
        <table>
            <tr class="center_text">
                <th colspan="2">Thêm nhân viên</th>
            </tr>
            <tr>
                <td>Tên chi nhánh</td>
                <td>
                    <select name="chinhanh">
                        <?php
                        include "connect.php";
                        $sql = "SELECT * FROM `chinhanh`";
                        $query = $connect->query($sql);
                        if (mysqli_num_rows($query) > 0) {
                            while ($rows = $query->fetch_row()) {
                                echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                            }
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Tên phòng ban</td>
                <td>
                    <select name="phongban">
                        <?php
                        include "connect.php";
                        $sql = "SELECT * FROM `phongban`";
                        $query = $connect->query($sql);
                        if (mysqli_num_rows($query) > 0) {
                            while ($rows = $query->fetch_row()) {
                                echo "<option value='" . $rows[0] . "'>" . $rows[1] . "</option>";
                            }
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Mã nhân viên</td>
                <td><input type="text" name="MaNV"></td>
            </tr>
            <tr>
                <td>Tên nhanvien</td>
                <td><input type="text" name="TenNV"></td>
            </tr>
            <tr>
                <td>Lương</td>
                <td><input type="text" name="luong"></td>
            </tr>
            <tr>
                <td>Giới Tính</td>
                <td><input type="checkbox" name="GT"></td>
            </tr>
            <tr>
                <td colspan="2" class="center_text"><input type="Submit" name='Submit' value='Thêm'>
                    <button type="reset">reset</button>
                </td>

            </tr>
            <?php

            if (isset($_POST['Submit']) && ($_POST['Submit'] == 'Thêm')) {
                if (isset($_POST['MaNV']) && isset($_POST['TenNV']) && isset($_POST['luong']) && isset($_POST['phongban']) && isset($_POST['chinhanh']) && $_POST['MaNV'] && $_POST['TenNV'] && $_POST['chinhanh'] && $_POST['phongban'] && $_POST['luong']) {
                    $manhanvien = $_POST['MaNV'];
                    $tennhanvien = $_POST['TenNV'];
                    $machinhanh = $_POST['chinhanh'];
                    $luong = (float)$_POST['luong'];
                    $gioitinh = isset($_POST['GT']) ? 1 : 0;
                    $maphong = $_POST['phongban'];

                    $sql = "INSERT INTO `nhanvien` values('$manhanvien','$tennhanvien',$luong,$gioitinh,'$maphong')";
                    $query = $connect->query($sql);
                }
            }

            ?>
        </table>
    </form>

</body>

</html>