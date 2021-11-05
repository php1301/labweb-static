<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{

        width: fit-content;
        margin: 50px auto;
    }
    .heso{
        line-height:100px;
        margin: auto 0;
    }
   .text_center{
        text-align: center;
    }
</style>
<body>
    
    <form method="get" action="#">
        <table border="" cellspacing="0" >
        <tr>
            <td>Hệ số a</td>
            <td>
                <input type="input" classname="heso" required name="hesoa"></td>
        </tr>
        <tr>
            <td >Hệ số b</td>
            <td><input type="input"  classname="heso" required name="hesob"></td>
        </tr>
        <tr>
            <td>Hệ số c</td>
            <td><input type="input"  classname="heso" required name="hesoc"></td>
        </tr>
        <tr>
            <td colspan = "2" class="text_center" ><input type="Submit"  value="Giải" name="Submit"></td>
        </tr>
        </table>
    </form>
  
    
    <?php
        if(isset($_GET['Submit'])&&($_GET['Submit']=="Giải"))
        {
        $hsoa= (float)$_GET['hesoa'];
        $hsob= (float)$_GET['hesob'];
        $hsoc = (float)$_GET['hesoc'];
        if($hsoa == 0){
            if($hsob == 0){
                echo "Phương trình vô nghiệm";
            }else{
                echo (-$hsoc)/$hsob;
            }
        }else{
            $denta = $hsob*$hsob - 4*$hsoa*$hsoc;
        if($denta < 0){
            echo "Phương trình vô nghiệm";
        }else if($denta == 0){
            $x1 = (-$hsob)/(2*$hsoa);
            echo "Phương trình có 2 nghiệm kép";
            echo "x1 = x2".$x1."<br>";

        }else{
            $x1 = (-$hsob+sqrt($denta))/(2*$hsoa);
            $x2 = (-$hsob-sqrt($denta))/(2*$hsoa);
            echo "x1 =".$x1."<br>";
            echo "x2 =".$x2;
        }
        }
        }
    ?>
</body>
</html>