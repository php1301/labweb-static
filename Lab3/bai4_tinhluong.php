<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>

<body>
    <form action="" method="POST">
        <p>Mã NV:
            <input name="ma" type="text">
        </p>

        <p>Tên NV:
            <input name="ten" type="text">
        </p>

        <p>Số ngày làm việc:
            <input name="soNgay" type="number" min="0">
        </p>
        <p>Lương ngày:
            <input name="luongNgay" type="number" min="0">
        </p>
        <p>
            Nhân viên quản lý:
            <input name="nhanVienQuanLy" type="checkbox" />
        </p>
        <button name="tinhLuong" value="luongThang">Lương tháng</button>
        <?php
        include_once "bai4_nhanvien.php";
        include_once "bai4_nhanvienql.php";
        if (isset($_POST['tinhLuong']) && ($_POST['tinhLuong'] == 'luongThang')) {
            $ma = $_POST['ma'] ?? null;
            $ten = $_POST['ten'] ?? null;
            $soNgay = $_POST['soNgay'] ?? null;
            $luongNgay = $_POST['luongNgay'] ?? null;
            $nhanVienQuanLy = $_POST['nhanVienQuanLy'] ?? null;
            
            if(is_null($nhanVienQuanLy)){
                $nvNormal = new NhanVienNew();
                $nvNormal->Gan($ma, $ten, $soNgay, $luongNgay);
                $nvNormal->InNhanVien();
            }
            else{
                $nvQL = new NhanVienQL();
                $nvQL->Gan($ma, $ten, $soNgay, $luongNgay);
                $nvQL->InNhanVien();
            }
        }
        ?>
    </form>
</body>