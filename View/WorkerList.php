<?php
include_once("../Controller/C_Worker.php");
include_once("../Model/E_Worker.php")
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
    <form action="../Controller/C_Worker.php?act=delete" method="post">

        <?php
        if (isset($workers)) {
            echo "<table border='1' width='100%'>
                        <caption> Bang nhan vien </caption>
                        <TR>
                            <TH>IDNV</TH>
                            <TH>Ho ten</TH>
                            <TH>IDPB</TH>
                            <TH>Xem</TH>
                            <TH>Sua</TH>
                            <TH>Xoa</TH>
                        </TR>";
            foreach ($workers as $val) {
                echo '<tr>
                            <td>' . $val->IDNV . '</td>
                            <td>' . $val->Hoten . '</td>
                            <td>' . $val->IDPB . '</td>
                            <td><a href="../Controller/C_Worker.php?act=list&IDNV=' . $val->IDNV . '">Xem</a></td>
                            <td><a href="../Controller/C_Worker.php?act=update&IDNV=' . $val->IDNV . '">Sua</a></td>
                            <td><input type="checkbox" name="' . $val->IDNV  . '"></td>
                            
                        </tr>';
            }
            echo "</table><br>";
            echo '<input type="submit" name="" id="" value="Xoa nhung nhan vien dc chon"><br>';
            echo '<input type="submit" name="all" id="" value="Xoa tat ca nhan vien"><br>';
        }

        ?>


    </form>
</body>

</html>