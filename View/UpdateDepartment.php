<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Update Department</h3>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Department.php?act=update" method="post">
        IDPB : <input type="text" name="IDPB" readonly value="<?php echo $department->IDPB; ?>"> <br>
        TenPB : <input type="text" name="TenPB" value="<?php echo $department->TenPB; ?>"> <br>
        Mota : <input type="text" name="Mota" value="<?php echo $department->Mota; ?>"> <br>

        <br><input type="submit" name="Update" value="Update">
    </form>
</body>

</html>