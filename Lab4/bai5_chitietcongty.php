<?php
echo "<form method='get' action='#'>";
echo "Tên công ty";
echo "<select name='tencongty'>";
include "connect.php";
$sql = "SELECT MaCongTy,TenCongTy FROM CONGTY";
$result = $connect->query($sql);
$macongty = [];
$tencongty = [];
$value = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        $macongty[] = $row[0];
        $tencongty[] = $row[1];
        echo "<option value='$value'>$tencongty[$value]</option>";
        $value = $value + 1;
    }

    echo "</select><br>";
    echo "<input type='Submit' value='Liệt kê' name='Submit'>";
    echo "</form>";
}
$connect->close();
if (isset($_GET['Submit']) && ($_GET['Submit'] == "Liệt kê")) {
    include "connect.php";
    $tencongty1 = $_REQUEST['tencongty'];
    $str = "SELECT TenChiNhanh FROM CHINHANH where MaCongTy='$macongty[$tencongty1]'";
    $result = $connect->query($str);
    echo "<table border='1' cellspacing='0'>";
    echo "<tr><th>STT</th><th>Tên chi nhánh</th></tr>";
    $stt = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td>$stt</td><td>$row[0]</td>";
            echo "</tr>";
            $stt++;
        }
    } else {
        echo "Không có dòng nào";
    }
    $connect->close();
}
