<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>QUẢN LÍ NHÂN VIÊN - PHÒNG BAN(mvc)</h1>
    <ul>
        <form action="./Controller/C_Worker.php" method="post">
            <li><a href="./Controller/C_Worker.php?act=list">Xem nhân viên</a></li>
            <li><a href="./Controller/C_Worker.php?act=insert">Chèn nhân viên</a></li>
            <li><a href="./Controller/C_Worker.php?act=update">Cập nhật nhân viên</a></li>
            <li><a href="./Controller/C_Worker.php?act=search">Tìm kiếm nhân viên</a></li>
            <li><a href="./Controller/C_Worker.php?act=delete">Xóa nhân viên</a></li>
            <br><br><br>
            <li><a href="./Controller/C_Department.php?act=list">Xem phòng ban</a></li>
            <li><a href="./Controller/C_Department.php?act=insert">Chèn phòng ban</a></li>
            <li><a href="./Controller/C_Department.php?act=update">Cập nhật phòng ban</a></li>
            <li><a href="./Controller/C_Worker.php?act=search">Tìm kiếm phòng ban</a></li>
            <li><a href="./Controller/C_Department.php?act=delete">Xóa phòng ban</a></li>
        </form>
    </ul>
</body>

</html>