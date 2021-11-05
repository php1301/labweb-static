<?php
class nhanvien{
    private $ma;
    private $ten;
    private $songay;
    private $luongngay;
    public function Gan($ma,$ten,$songay,$luongngay)
    {
        $this->ma = $ma;
        $this->ten = $ten;
        $this->songay = $songay;
        $this->luongngay = $luongngay;
    }
    public function TinhLuong()
    {
        return $this->luongngay*$this->songay;
    }
    public function InNhanVien()
    {
        echo "<b> Mã nhân viên:</b> ".$this->ma."<br>";
        echo "<b> Tên nhân viên:</b> ".$this->ten."<br>";
        echo "<b> Số ngày làm:</b> ".$this->songay."<br>";
        echo "<b> Lương ngày:</b> ".$this->luongngay."<br>";
    }
     
}
class nhanvienQL extends nhanvien{
    private $PhuCap=2000;
    public function TinhLuong()
    {
        return parent::TinhLuong()+$this->PhuCap;
    }
    public function InNhanVien()
    {
        parent::InNhanVien();
        echo "<b> Phụ Cấp:</b> ".$this->PhuCap."<br>";
    }
   
}
