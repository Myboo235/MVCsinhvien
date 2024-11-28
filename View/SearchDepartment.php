<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Search Department</h3>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Department.php?act=search" method="post">
        <p>Choose field</p>
        <select name="col" id="">
            <option value="IDPB">IDPB</option>
            <option value="TenPB">TenPB</option>
            <option value="Mota">Mota</option>
        </select><br><br>
        <input type="text" name="val"><br>
        <input type="submit" value="Search" name="Search">
    </form>

</body>

</html>