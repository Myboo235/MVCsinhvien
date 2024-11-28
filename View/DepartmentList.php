<?php
include_once("../Controller/C_Department.php");
include_once("../Model/E_Department.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">Back to home</a>
    <form action="../Controller/C_Department.php?act=delete" method="post">

        <?php
        if (isset($departments)) {
            echo "<table border='1' width='100%'>
                        <caption> Bang phong ban </caption>
                        <TR>
                            <TH>IDPB</TH>
                            <TH>Ten phong ban</TH>
                            <TH>Mota</TH>
                            <TH>Xem</TH>
                            <TH>Sua</TH>
                            <TH>Xoa</TH>
                        </TR>";
            foreach ($departments as $val) {
                echo '<tr>
                            <td>' . $val->IDPB . '</td>
                            <td>' . $val->TenPB . '</td>
                            <td>' . $val->Mota . '</td>
                            <td><a href="../Controller/C_Department.php?act=list&IDPB=' . $val->IDPB . '">Xem</a></td>
                            <td><a href="../Controller/C_Department.php?act=update&IDPB=' . $val->IDPB . '">Sua</a></td>
                            <td><input type="checkbox" name="' . $val->IDPB . '"></td>
                        </tr>';
            }
            echo "</table><br>";
            echo "<p style='color:red;'>Xóa phòng ban sẽ xóa tất cả nhân viên của phòng ban đó</p><br>";
            echo '<input type="submit" name="" id="" value="Xoa nhung phong ban duoc chon"><br>';
            echo '<input type="submit" name="all" id="" value="Xoa tat ca phong ban"><br>';
        }
        ?>
    </form>
</body>

</html>