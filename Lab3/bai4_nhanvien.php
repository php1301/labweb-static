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
    class NhanVienNew
    {
        private $ma;
        private $ten;
        private $soNgay;
        private $luongNgay;

        public function Gan($ma, $ten, $soNgay, $luongNgay)
        {
            $this->ma = $ma;
            $this->ten = $ten;
            $this->soNgay = $soNgay;
            $this->luongNgay = $luongNgay;
        }

        public function TinhLuong()
        {
            return $this->soNgay * $this->luongNgay;
        }

        public function InNhanVien()
        {
            $luong = $this->TinhLuong();
            echo "Mã $this->ma - Họ tên $this->ten - Số ngày $this->soNgay - Lương ngày $this->luongNgay - Lương: $luong";
        }
    }
    ?>
</body>

</html>