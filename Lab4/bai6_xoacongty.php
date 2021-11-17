<?php
echo"<form method='get' action='#'>";
 echo"Tên công ty";
 echo"<select name='tencongty'>";
include "connect.php";
 $sql = "SELECT MaCongTy,TenCongTy FROM CONGTY";
 $result = $connect->query($sql);
 $macongty=[];
 $tencongty=[];
 $value=0;
 if ($result->num_rows > 0)
 {
	 while($row = $result->fetch_row())
	 {
	 	$macongty[]=$row[0];
	 	$tencongty[]=$row[1];
	 	echo "<option value='$value'>$tencongty[$value]</option>";
	 	$value=$value+1;
	 }
 
 echo"</select><br>";
 echo"<input type='Submit' value='Xóa' name='Submit'>";
 echo"</form>";
}
 $connect->close();
if(isset($_GET['Submit'])&&($_GET['Submit']=="Xóa"))
 {
 include "connect.php";
 $tencongty1=$_REQUEST['tencongty'] ;
 $str = "DELETE FROM CONGTY where MaCongTy='$macongty[$tencongty1]'";
 if($connect->query($str)==true)
 {
    echo"Xóa thành công";
 }
 else
 {
    echo"Xóa không thành công";
 }
 
 $connect->close();
}
?>