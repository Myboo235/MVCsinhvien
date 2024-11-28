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
    <h2>Department Detail</h2>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <?php
    if (isset($department)) {
        echo "<b>IDPB</b>       : $department->IDPB" . "<br>";
        echo "<b>TenPB</b>      : $department->TenPB" . "<br>";
        echo "<b>Mota</b>       : $department->Mota" . "<br>";
        echo "<a href='../Controller/C_Department.php?act=list'>BACK</a>";
    } else {
        echo "<b>Not found</b>";
    }
    ?>
</body>

</html>