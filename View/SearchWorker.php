<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Search Worker</h3>
    <a href="../index.php">Back to home</a>
    <br>
    <br>
    <br>
    <br>
    <form action="../Controller/C_Worker.php?act=search" method="post">
        <p>Choose field</p>
        <select name="col" id="">
            <option value="IDNV">IDNV</option>
            <option value="Hoten">Hoten</option>
            <option value="IDPB">IDPB</option>
            <option value="Diachi">Diachi</option>
        </select><br><br>
        <input type="text" name="val"><br>
        <input type="submit" value="Search" name="Search">
    </form>

</body>

</html>