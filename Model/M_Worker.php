<?php
include_once("../Model/E_Worker.php");

class Model_Worker
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

    public function getAllWorkers()
    {
        $sql = "select * from nhanvien";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }
            $wks = [];
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                $wks[$i] = new Entity_Worker($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
                $i++;
            }


            return $wks;
        } catch (mysqli_sql_exception) {
            echo "Error when get all worker";
        }
    }
    public function getWorkerByIDNV($IDNV)
    {
        $sql = "select * from nhanvien where IDNV = '$IDNV'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $wk = null;
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $wk = new Entity_Worker($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
                }
            }


            return $wk;
        } catch (mysqli_sql_exception) {
            echo "Error when get worker by IDNV";
        }
    }
    public function insertWorker($IDNV, $Hoten, $IDPB, $Diachi)
    {
        $sql = "INSERT INTO `nhanvien`(`IDNV`, `Hoten`, `IDPB`, `Diachi`) VALUES ('$IDNV','$Hoten','$IDPB','$Diachi')";
        try {
            if ($this->getWorkerByIDNV($IDNV)) {
                echo "ID has exist";
                return false;
            }
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                return true;
            }
            echo "Insert worker success<br>";
        } catch (mysqli_sql_exception) {
            echo "Error when insert worker";
            return false;
        }
    }
    public function updateWorker($IDNV, $Hoten, $IDPB, $Diachi)
    {
        $sql = "UPDATE `nhanvien` SET `Hoten`='$Hoten', `IDPB`='$IDPB', `Diachi`='$Diachi' WHERE IDNV = '$IDNV'";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
            }
            echo "Update worker success<br>";
        } catch (mysqli_sql_exception) {
            echo "Error when updating worker";
        }
    }

    public function deleteWorkerById($IDNV)
    {
        $sql = "DELETE FROM nhanvien WHERE IDNV = '$IDNV'";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
            }
            echo "Delete worker success<br>";
        } catch (mysqli_sql_exception) {
            echo "Error when deleting worker";
        }
    }
    public function deleteWorkerByIDPB($IDPB)
    {
        $sql = "DELETE FROM nhanvien WHERE IDPB = '$IDPB'";

        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
                echo "Delete worker by department ID success<br>";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error when deleting worker by department ID: " . $e->getMessage();
        }
    }

    public function deleteAllWorkers()
    {
        $sql = "DELETE FROM nhanvien";
        try {
            if (isset($this->conn)) {
                mysqli_query($this->conn, $sql);
            }
            echo "Delete all workers success<br>";
        } catch (mysqli_sql_exception $e) {
            echo "Error when deleting all workers";
        }
    }
    public function getWorkerByHoten($Hoten)
    {
        $sql = "SELECT * FROM nhanvien WHERE Hoten = '$Hoten'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $wks = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $wks[] = new Entity_Worker($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
            }

            return $wks;
        } catch (mysqli_sql_exception $e) {
            echo "Error when getting worker by Hoten";
        }
    }

    public function getWorkerByDiachi($Diachi)
    {
        $sql = "SELECT * FROM nhanvien WHERE Diachi = '$Diachi'";
        try {
            if (isset($this->conn)) {
                $result = mysqli_query($this->conn, $sql);
            }

            $wks = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $wks[] = new Entity_Worker($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
            }

            return $wks;
        } catch (mysqli_sql_exception $e) {
            echo "Error when getting worker by Diachi";
        }
    }

}
