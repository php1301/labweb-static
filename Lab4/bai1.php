<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<style>
    table td {
        height: 30px;
    }

    form {
        width: fit-content;
        margin: 100px auto;
        background-color: pink;
    }
        .textcenter {
          text-align: center;
        }
      </style>
<body>
<?php
            include "connect.php";
                $sql = "select * from NHANVIEN";
                $result = $connect->query($sql);
                echo "<table border='1' cellspacing='0'>";
                echo "<tr><th>Mã nhân viên</th><th>Tên nhân viên</th><th>Chức năng</th></tr>";
            if ($result->num_rows > 0)
            {
            while($row = $result->fetch_row())
            {
                echo "<tr>";
                echo"<td>$row[0]</td><td>$row[1]</td><td><a href='xoanhanvien.php?manhanvien=$row[0]' class='Xoa'>Xóa</a>  
                <a href='viewnhanvien.php?manhanvien=$row[0]' class='view'>View</a></td>";
                echo "</tr>";
            }
            }
            else
            {
                echo "Không có dòng nào";
            } $connect->close();
    ?>
</body>

</html>


