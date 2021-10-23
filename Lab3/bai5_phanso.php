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
    class PhanSo
    {
        private $tu;
        private $mau;

        public function Gan($tu, $mau)
        {
            $this->tu = $tu;
            $this->mau = $mau;
        }

        public function TinhTong(PhanSo $ps)
        {
            $ts = $this->tu * $ps->mau + $this->mau * $ps->tu;
            $ms = $this->mau * $ps->mau;
            $psNew = new PhanSo;
            $psNew->Gan($ts, $ms);
            $psNew->RutGon();
            return $psNew;
        }
        public function TinhHieu(PhanSo $ps)
        {
            $ts = $this->tu * $ps->mau + $this->mau * $ps->tu;
            $ms = $this->mau * $ps->mau;
            $psNew = new PhanSo;
            $psNew->Gan($ts, $ms);
            $psNew->RutGon();

            return $psNew;
        }
        public function TinhTich(PhanSo $ps)
        {
            $ts = $this->tu * $ps->tu;
            $ms = $this->mau * $ps->mau;
            $psNew = new PhanSo;
            $psNew->Gan($ts, $ms);
            $psNew->RutGon();

            return $psNew;
        }
        public function TinhThuong(PhanSo $ps)
        {
            $ts = $this->tu * $ps->mau;
            $ms = $this->mau * $ps->tu;
            $psNew = new PhanSo;
            $psNew->Gan($ts, $ms);
            $psNew->RutGon();

            return $psNew;
        }

        public function UCLN($a, $b)
        {
            if ($a % $b == 0)
                return $b;
            else
                return $this->UCLN($b, $a % $b);
        }

        public function RutGon()
        {
            $uc = $this->UCLN($this->tu, $this->mau);
            $this->tu = $this->tu / $uc;
            $this->mau = $this->mau / $uc;
        }

        public function XuatPhanSo()
        {
            if ($this->tu != $this->mau)
                return "$this->tu/$this->mau";
            else {
                return "$this->tu";
            }
        }
    }
    ?>
</body>

</html>