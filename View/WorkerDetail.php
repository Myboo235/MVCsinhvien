<?php
include_once("../Controller/C_Worker.php");
include_once("../Model/E_Worker.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Worker Detail</h2>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <?php
    if (isset($worker)) {
        echo "<b>IDNV</b>       : $worker->IDNV" . "<br>";
        echo "<b>Hoten</b>      : $worker->Hoten" . "<br>";
        echo "<b>IDPB</b>       : $worker->IDPB" . "<br>";
        echo "<b>Diachi</b>     : $worker->Diachi" . "<br>";
        echo "<a href='../Controller/C_Worker.php?act=list'>BACK</a>";
    } else {
        echo "<b>Not found</b>";
    }
    ?>
</body>

</html>