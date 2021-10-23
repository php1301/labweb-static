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
    require_once "bai4_nhanvien.php";
    class NhanVienQL extends NhanVienNew
    {
        private $phuCap = 2000;

        public function TinhLuong()
        {
            return parent::TinhLuong() * $this->phuCap;
        }
        public function InNhanVien()
        {
            $luong = (integer)$this->TinhLuong() + $this->phuCap;

            parent::InNhanVien();
            echo "Đây là nhân viên quản lý và có phụ cấp là 2000";
            echo "Lương sau khi có phụ cấp là $luong";

        }
    }
    ?>
</body>

</html>