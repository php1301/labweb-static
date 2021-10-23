<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>

<body>
    <form action="" method="POST" style="display: flex;">
        <table style="padding: 30px;">
            <tr>
                <td>
                    Tử phân số 1:
                    <input name="tu1" type="number">
                </td>
            </tr>
            <tr>
                <td>
                    Mẫu phân số 1:
                    <input name="mau1" type="number">
                </td>
            </tr>
            <tr>
                <td>
                    Tử phân số 2:
                    <input name="tu2" type="number">
                </td>
            </tr>
            <tr>
                <td>
                    Mẫu phân số 2:
                    <input name="mau2" type="number">
                </td>
            </tr>
            <tr>
                <td>
                    <button name="tinh" value="tinhValue">=</button>
                </td>
            </tr>
        </table>
        <div style="padding: 30px;">
            <input type="radio" id="cong" name="phepTinh" value="+" checked>
            <label for="cong">+</label><br>
            <input type="radio" id="tru" name="phepTinh" value="-">
            <label for="tru">-</label><br>
            <input type="radio" id="nhan" name="phepTinh" value="*">
            <label for="nhan">*</label><br>
            <input type="radio" id="chia" name="phepTinh" value="/">
            <label for="chia">/</label><br><br>
        </div>

        <?php
        include_once "bai5_phanso.php";
        if (isset($_POST['tinh']) && ($_POST['tinh'] == 'tinhValue')) {
            $tu1 = $_POST['tu1'] ?? null;
            $mau1 = $_POST['mau1'] ?? null;
            $tu2 = $_POST['tu2'] ?? null;
            $mau2 = $_POST['mau2'] ?? null;
            $phepTinh = $_POST['phepTinh'] ?? "+";
            $ps1 = new PhanSo();
            $ps1->Gan($tu1, $mau1);

            $ps2 = new PhanSo();
            $ps2->Gan($tu2, $mau2);
            switch ($phepTinh) {
                case "+":
                    $psKq = $ps1->TinhTong($ps2)->XuatPhanSo();
                    echo "Tổng $tu1/$mau1+$tu2/$mau2=$psKq";
                    break;
                case "-":
                    $psKq = $ps1->TinhHieu($ps2)->XuatPhanSo();
                    echo "Hiệu $tu1/$mau1-$tu2/$mau2=$psKq";
                    break;
                case "*":
                    $psKq = $ps1->TinhTich($ps2)->XuatPhanSo();
                    echo "Tích $tu1/$mau1*$tu2/$mau2=$psKq";
                    break;
                case "/":
                    $psKq = $ps1->TinhThuong($ps2)->XuatPhanSo();
                    echo "Thương $tu1/$mau1 chia $tu2/$mau2=$psKq";
                    break;
            }
        }
        ?>
    </form>
</body>