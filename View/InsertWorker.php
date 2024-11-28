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
    <h3>Insert Worker</h3>
    <a href="../index.php">Back to home</a><br>
    <a href="../Controller/C_Worker.php?act=list">List workers</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Worker.php?act=insert" method="post">
        IDNV : <input type="text" name="IDNV" required> <br>
        Hoten : <input type="text" name="Hoten" required> <br>
        IDPB : <select id="IDPB" name="IDPB">
            <?php echo $phongban_options; ?>
        </select><br>
        Diachi : <input type="text" name="Diachi" required> <br>

        <br><input type="submit" name="Insert" value="Insert">
    </form>
</body>

</html>