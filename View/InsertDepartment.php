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
    <h3>Insert Department</h3>
    <a href="../index.php">Back to home</a><br>
    <a href="../Controller/C_Department.php?act=list">List departments</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Department.php?act=insert" method="post">
        IDPB : <input type="text" name="IDPB" required> <br>
        TenPB : <input type="text" name="TenPB" required> <br>
        Mota : <input type="text" name="Mota" required> <br>

        <br><input type="submit" name="Insert" value="Insert">
    </form>
</body>

</html>