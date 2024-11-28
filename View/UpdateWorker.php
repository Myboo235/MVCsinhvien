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
    <h3>Update Worker</h3>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Worker.php?act=update" method="post">
        IDNV : <input type="text" name="IDNV" readonly value="<?php echo $worker->IDNV; ?>"> <br>
        Hoten : <input type="text" name="Hoten" value="<?php echo $worker->Hoten; ?>"> <br>
        IDPB : <select id="IDPB" name="IDPB">
            <?php echo $phongban_options; ?>
        </select><br>
        Diachi : <input type="text" name="Diachi" value="<?php echo $worker->Diachi; ?>"> <br>

        <br><input type="submit" name="Update" value="Update">
    </form>
</body>

</html>