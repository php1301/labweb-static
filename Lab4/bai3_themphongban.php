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
            <tr>
                <th colspan="2">Thêm phòng ban</th>
            </tr>
            <tr>
                <td>Mã phòng ban</td>
                <td><input type="text" name="MaPB"></td>
            </tr>
            <tr>
                <td>Tên phòng ban</td>
                <td><input type="text" name="TenPB"></td>
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
                <td class="center_text" colspan="2">
                    <input type="Submit" name='Submit' value='Thêm'> <button type="reset">reset</button>
                </td>

            </tr>
            <?php

            if (isset($_POST['Submit']) && ($_POST['Submit'] == 'Thêm')) {
                if (isset($_POST['MaPB']) && isset($_POST['TenPB']) && isset($_POST['chinhanh']) && $_POST['MaPB'] && $_POST['TenPB'] && $_POST['chinhanh']) {
                    $maphongban = $_POST['MaPB'];
                    $tenphongban = $_POST['TenPB'];
                    $machinhanh = $_POST['chinhanh'];
                    $sql = "INSERT INTO `phongban` values('$maphongban','$tenphongban','$machinhanh')";
                    $query = $connect->query($sql);
                    echo "ok";
                }
            }

            ?>
        </table>
    </form>

</body>

</html>