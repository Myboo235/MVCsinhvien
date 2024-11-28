<?php
include_once("../Model/M_Department.php");
include_once("../Model/M_Worker.php");


class Controller_Department
{
    public function List()
    {
        if (isset($_GET['IDPB'])) {
            $modelDepartment = new Model_Department();
            $department = $modelDepartment->getDepartmentByIDPB($_GET['IDPB']);
            include_once("../View/DepartmentDetail.php");
        } else {
            $modelDepartment = new Model_Department();
            $departments = $modelDepartment->getAllDepartment();
            include_once("../View/DepartmentList.php");
        }
    }

    public function Insert()
    {
        if (isset($_POST["Insert"])) {
            $IDPB = $_POST["IDPB"];
            $TenPB = $_POST["TenPB"];
            $Mota = $_POST["Mota"];

            $modelDepartment = new Model_Department();
            $re = $modelDepartment->insertDepartment($IDPB, $TenPB, $Mota);
            if (!$re) {
                include_once("../View/InsertDepartment.php");
            }
            include_once("../View/DepartmentList.php");
        } else {
            include_once("../View/InsertDepartment.php");
        }
    }

    public function Update()
    {
        if (isset($_GET['IDPB'])) {
            $modelDepartment = new Model_Department();
            $department = $modelDepartment->getDepartmentByIDPB($_GET['IDPB']);
            include_once("../View/UpdateDepartment.php");
        } else if (isset($_POST["Update"])) {
            $IDPB = $_POST["IDPB"];
            $TenPB = $_POST["TenPB"];
            $Mota = $_POST["Mota"];

            $modelDepartment = new Model_Department();
            $modelDepartment->updateDepartment($IDPB, $TenPB, $Mota);
            $departments = $modelDepartment->getAllDepartment();
            include_once("../View/DepartmentList.php");
        } else {
            $modelDepartment = new Model_Department();
            $departments = $modelDepartment->getAllDepartment();
            include_once("../View/DepartmentList.php");
        }
    }

    public function Delete()
    {
        if (isset($_POST["delete_all"])) {
            $modelDepartment = new Model_Department();
            $modelDepartment->deleteAllDepartments();
            include_once("../View/DepartmentList.php");
            return;
        }

        $list = array_keys($_POST);
        if (count($list) > 0) {
            $modelDepartment = new Model_Department();
            $modelWorker = new Model_Worker();

            foreach ($list as $IDPB){
                $modelWorker->deleteWorkerByIDPB($IDPB);
                $modelDepartment->deleteDepartmentByIDPB($IDPB);
            }
                
            include_once("../View/DepartmentList.php");
        } else {
            $modelDepartment = new Model_Department();
            $departments = $modelDepartment->getAllDepartment();
            include_once("../View/DepartmentList.php");
        }
        
    }

    public function Search()
    {
        if (isset($_POST['Search'])) {
            $modelDepartment = new Model_Department();
            if (isset($_POST["col"])) {
                $col = $_POST["col"];
                if (isset($_POST["val"])) {
                    $val = $_POST["val"];
                }
                switch ($col) {
                    case "IDPB": {
                            $department = $modelDepartment->getDepartmentByIDPB($val);
                            break;
                        }
                    case "TenPB": {
                            $department = $modelDepartment->getDepartmentByTenPB($val);
                            break;
                        }
                    case "Mota": {
                            $department = $modelDepartment->getDepartmentByMota($val);
                            break;
                        }
                }
            }
            if (isset($department)) {
                include_once("../View/DepartmentDetail.php");
            } else {
                echo "Not Found";
                include_once("../View/SearchDepartment.php");
            }
        } else {
            include_once("../View/SearchDepartment.php");
        }
    }
}

$ctrlDepartment = new Controller_Department();

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case "list": {
                $ctrlDepartment->List();
                break;
            }
        case "insert": {
                $ctrlDepartment->Insert();
                break;
            }
        case "update": {
                $ctrlDepartment->Update();
                break;
            }
        case "delete": {
                $ctrlDepartment->Delete();
                break;
            }
        case "search": {
                $ctrlDepartment->Search();
                break;
            }
    }
}
