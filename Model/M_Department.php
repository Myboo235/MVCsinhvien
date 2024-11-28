<?php
include_once("../Model/E_Department.php");

class Model_Department
{
    private $conn;
    public function __construct()
    {
        $db_server = "localhost";
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'dulieu';

        try {
            $this->conn = mysqli_connect(
                $db_server,
                $db_user,
                $db_pass,
                $db_name
            );
        } catch (mysqli_sql_exception $e) {
            echo "Error";
        }
    }

    public function getAllDepartment()
    {
        $sql = "select * from phongban";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }
            $dps = [];
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $dps[$i] = new Entity_Department($row['IDPB'], $row['TenPB'], $row['Mota']);
                $i++;
            }


            return $dps;
        } catch (mysqli_sql_exception) {
            echo "Error when get all department";
        }
    }
    public function getDepartmentByIDPB($IDPB)
    {
        $sql = "select * from phongban where IDPB = '$IDPB'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $department = null;
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $department = new Entity_Department($row['IDPB'], $row['TenPB'], $row['Mota']);
                }
            }

            return $department;
        } catch (mysqli_sql_exception) {
            echo "Error when get department by IDPB";
        }
    }
    public function insertDepartment($IDPB, $TenPB, $Mota)
    {
        $sql = "INSERT INTO `phongban`(`IDPB`, `TenPB`, `Mota`) VALUES ('$IDPB','$TenPB','$Mota')";
        try {
            if ($this->getDepartmentByIDPB($IDPB)) {
                echo "ID has exist";
                return false;
            }
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                echo "Insert department success<br>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error when insert department";
            return false;
        }
    }

    public function updateDepartment($IDPB, $TenPB, $Mota)
    {
        $sql = "UPDATE `phongban` SET `TenPB`='$TenPB', `Mota`='$Mota' WHERE IDPB = '$IDPB'";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                echo "Update department success<br>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error when updating department";
        }
    }

    public function deleteDepartmentByIDPB($IDPB)
    {
        $sql = "DELETE FROM phongban WHERE IDPB = '$IDPB'";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                echo "Delete department success<br>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error when deleting department";
        }
    }

    public function deleteAllDepartments()
    {
        $sql = "DELETE FROM phongban";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                echo "Delete all departments success<br>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error when deleting all departments";
        }
    }

    public function getDepartmentByTenPB($TenPB)
    {
        $sql = "SELECT * FROM phongban WHERE TenPB = '$TenPB'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $departments = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $departments[] = new Entity_Department($row['IDPB'], $row['TenPB'], $row['Mota']);
            }

            return $departments;
        } catch (mysqli_sql_exception $e) {
            echo "Error when getting department by TenPB";
        }
    }

    public function getDepartmentByMota($Mota)
    {
        $sql = "SELECT * FROM phongban WHERE Mota = '$Mota'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $departments = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $departments[] = new Entity_Department($row['IDPB'], $row['TenPB'], $row['Mota']);
            }

            return $departments;
        } catch (mysqli_sql_exception $e) {
            echo "Error when getting department by Mota";
        }
    }

}