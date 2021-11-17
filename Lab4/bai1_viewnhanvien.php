<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $manhanvien = $_GET['manhanvien'];
    include "connect.php";
    $sql = "SELECT * FROM `nhanvien` WHERE MaNhanVien='$manhanvien'";
    $query = $connect->query($sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = $query->fetch_row()) {
            echo "<form method='post' >";
            echo "<table border='1' cellspacing = '0' >";
            echo "<tr><td>Mã nhân viên</td><td> <input type='hidden' name='MaNV' value='" . $row[0] . "' > </td></tr>";
            echo "<tr><td>Tên nhân viên</td><td><input type='text' name='TenNV' value='" . $row[1] . "'></td></tr>";
            echo "<tr><td>Lương tháng</td><td><input type='text' name='Luong' value='" . $row[2] . "'></td></tr>";
            echo "<tr><td>Giới tính</td> <td><input type='checkbox' name='Check'";
            if ($row[3]) echo 'checked>';
            echo "</td></tr>";
            echo "<tr><td>Mã phòng ban</td><td><select name='chonphong'>";
            $sql = "SELECT * FROM `phongban`";
            $query = $connect->query($sql);
            if (mysqli_num_rows($query) > 0) {
                while ($rows = $query->fetch_row()) {
                    echo "<option value='" . $rows[0] . "'>" . $rows[0] . "</option>";
                }
            }
            echo "</select></td></tr>";
            echo "<tr><td align='center' colspan='2'><input type='Submit' name='Submit' value= 'Update' ></td></tr></table></form>";
        }
    }

    if (isset($_POST['Submit']) && $_POST['Submit'] == "Update") {
        if (isset($_POST['MaNV']) && isset($_POST['TenNV']) && isset($_POST['Luong']) && isset($_POST['Check']) && isset($_POST['chonphong']) && $_POST['MaNV'] && $_POST['TenNV'] && $_POST['Luong'] && $_POST['Check'] && $_POST['chonphong']) {
            $manhanvien = $_POST['MaNV'];
            $tennhanvien = $_POST['TenNV'];
            $luong = $_POST['Luong'];
            $check = $_POST['Check'];
            $maphongban = $_POST['chonphong'];
            echo $manhanvien.$tennhanvien;
            $str = "UPDATE `nhanvien` SET  TenNhanVien='$tennhanvien',Luongthang='$luong',GioiTinh='$check',MaPhongBan='$maphongban' WHERE MaNhanVien = '$manhanvien'";
            if ($connect->query($str) == 1) {
                echo "Thêm thành công";
            } else {
                echo "Thêm không thành công";
            }
            $connect->close();
        }
    }
    ?>
</body>

</html>