<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<style>
    table tr:first-child {
        background-color: #cfffff;
    }

    table td {
        height: 30px;
    }

    form {
        width: fit-content;
        margin: 100px auto;
        background-color: pink;
    }
</style>

<body>
    <form method="post" >
        <table border="1" cellspacing="0">

            <tr>
                <td style="text-align: center;" colspan="2">Thêm chi nhánh</td>
            </tr>
            <tr>
                <td>Mã chi nhánh</td>
                <td><input type="text" name="MaCN" required></td>
            </tr>
            <tr>
                <td>Tên chi nhánh</td>
                <td><input type="text" name="TenCN" required></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><input type="text" name="DiaChi" required></td>
            </tr>
            <tr>
                <td>Tên công ty</td>
                <td><select name="choncty" id="" required>
                        <?php
                        include "connect.php";
                        $str = "select * from congty";
                        $que = $connect->query($str);
                        if (mysqli_num_rows($que) > 0) {
                            while ($row = $que->fetch_row()) {
                                echo "<option value ='" . $row[0] . "'>" . $row[1] . "</option>";
                            }
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td align="center" colspan="2"> <input style="border-radius: 10px;" type="Submit" name="Submit" value="Add"> <input style="border-radius: 10px;" type="reset" value="Reset"> </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['Submit']) && $_POST['Submit']== "Add") {
        if (isset($_POST['MaCN']) && isset($_POST['TenCN']) && isset($_POST['DiaChi']) && isset($_POST['choncty']) && $_POST['MaCN'] && $_POST['TenCN'] && ($_POST['DiaChi']) && $_POST['choncty']) {
            $machinhanh = $_POST['MaCN'];
            $tenchinhanh = $_POST['TenCN'];
            $diachi = $_POST['DiaChi'];
            $macongty = $_POST['choncty'];
            $sql = "INSERT INTO `chinhanh` values ('$machinhanh','$tenchinhanh','$diachi','$macongty')";
            if ( $connect->query($sql) == 1) {
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