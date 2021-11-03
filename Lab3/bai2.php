<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="get" acction="#">
        Nhập tên cần tìm <input type="text" name="tencantim"><br><br>
        <input type="Submit" name="Tim" value="Tìm">
    </form>
    <?php

    $ban = array("Tuấn" => 21, "Tú" => 19, "Tâm" => 22, "Tùng" => 20);
    if (isset($_GET['Tim']) && ($_GET['Tim'] == "Tìm")) {
        $ten = $_GET['tencantim'];
        if (TimTen($ban, $ten) == true) {
            echo "Tìm thấy " . $ten . " trong mảng<br>";
        } else {
            echo "Tìm không thấy <br>";
        }
        echo "<h3>Xuất mảng</h3>";
        InMang($ban);
    }
    function InMang($array)
    {
        foreach ($array as $ten => $tuoi) {
            echo $ten . "\t" . $tuoi . "<br>";
        }
    }
    function TimTen($array, $str)
    {
        foreach ($array as $ten => $tuoi) {
            if ($ten == $str) {
                return true;
            }
        }
        return false;
    }
    function XuatTenLonHon20($array)
    {
        foreach ($array as $ten => $tuoi) {
            if ($tuoi > 20) {
                echo $ten . "\t" . $tuoi . "<br>";
            }
        }
    }
    function SapXepTangDan($array)
    {
        asort($array);
    }
    function Themcuoimang($array, $ten, $tuoi)
    {
        $array[$ten] = $tuoi;
        foreach ($array as $ten => $tuoi) {
            echo $ten . "\t" . $tuoi . "<br>";
        }
    }
    function TimTheoTuoi($array, $tuoi1)
    {
        foreach ($array as $ten => $tuoi) {
            if ($tuoi1 == $tuoi) {
                echo $ten . "\t" . $tuoi . "<br>";
            }
        }
    }
    function XoaTheoten($array, $ten)
    {
        unset($array[$ten]);
    }
    ?>

</body>

</html>