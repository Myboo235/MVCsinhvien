<?php
include_once("../Model/M_Worker.php");
include_once("../Model/M_Department.php");


//call model > run func model > view
class Controller_Worker
{
    public function List()
    {
        if (isset($_GET['IDNV'])) {
            $modelWorker = new Model_Worker();
            $worker = $modelWorker->getWorkerByIDNV($_GET['IDNV']);
            include_once("../View/WorkerDetail.php");
        } else {
            $modelWorker = new Model_Worker();
            $workers = $modelWorker->getAllWorkers();
            include_once("../View/WorkerList.php");
        }
    }
    public function Insert()
    {
        $modelDepartmant = new Model_Department();
        $departments = $modelDepartmant->getAllDepartment();
        $phongban_options = '';
        foreach ($departments as $val) {
            $phongban_options .= '<option value="' . $val->IDPB . '" >' . $val->IDPB . '</option>';
        }
        if (isset($_POST["Insert"])) {
            $IDNV = $_POST["IDNV"];
            $Hoten =  $_POST["Hoten"];
            $IDPB = $_POST["IDPB"];
            $Diachi = $_POST["Diachi"];

            $modelWorker = new Model_Worker();
            $re = $modelWorker->insertWorker($IDNV, $Hoten, $IDPB, $Diachi);
            if (!$re) {
                include_once("../View/InsertWorker.php");
            } else {

                include_once("../View/WorkerList.php");
            }
        } else {
            include_once("../View/InsertWorker.php");
        }
    }

    public function Update()
    {

        if (isset($_GET['IDNV'])) {
            $modelWorker = new Model_Worker();
            $worker = $modelWorker->getWorkerByIDNV($_GET['IDNV']);

            $modelDepartmant = new Model_Department();
            $departments = $modelDepartmant->getAllDepartment();
            $phongban_options = '';
            foreach ($departments as $val) {
                $selected = ($val->IDPB == $worker->IDPB) ? 'selected' : '';
                $phongban_options .= '<option value="' . $val->IDPB . '" ' . $selected . '>' . $val->IDPB . '</option>';
            }
            include_once("../View/UpdateWorker.php");
        } else if (isset($_POST["Update"])) {
            $IDNV = $_POST["IDNV"];
            $Hoten = $_POST["Hoten"];
            $IDPB = $_POST["IDPB"];
            $Diachi = $_POST["Diachi"];

            $modelWorker = new Model_Worker();
            $modelWorker->updateWorker($IDNV, $Hoten, $IDPB, $Diachi);
            $workers = $modelWorker->getAllWorkers();
            include_once("../View/WorkerList.php");
        } else {
            $modelWorker = new Model_Worker();
            $workers = $modelWorker->getAllWorkers();
            include_once("../View/WorkerList.php");
        }
    }
    public function Delete()
    {
        if (isset($_POST["delete_all"])) {
            $modelWorker = new Model_Worker();
            $modelWorker->deleteAllWorkers();
            include_once("../View/WorkerList.php");
            return;
        }
        $list = array_keys($_POST);
        if (count($list) > 0) {
            $modelWorker = new Model_Worker();
            foreach ($list as $IDNV)
                $modelWorker->deleteWorkerById($IDNV);
            include_once("../View/WorkerList.php");
        } else {
            $modelWorker = new Model_Worker();
            $workers = $modelWorker->getAllWorkers();
            include_once("../View/WorkerList.php");
        }
    }

    public function Search()
    {
        if (isset($_POST['Search'])) {
            $modelWorker = new Model_Worker();
            if (isset($_POST["col"])) {
                $col = $_POST["col"];
                if (isset($_POST["val"])) {
                    $val = $_POST["val"];
                }
                switch ($col) {
                    case "IDNV": {
                            $worker = $modelWorker->getWorkerByIDNV($val);
                            break;
                        }
                    case "Hoten": {
                            $worker = $modelWorker->getWorkerByHoten($val);
                            break;
                        }
                    case "Diachi": {
                            $worker = $modelWorker->getWorkerByDiachi($val);
                            break;
                        }
                }
            }
            if (isset($worker)) {
                include_once("../View/WorkerDetail.php");
            } else {
                echo "Not Found";
                include_once("../View/SearchWorker.php");
            }
        } else {
            include_once("../View/SearchWorker.php");
        }
    }
}
$ctrlWoker = new Controller_Worker();

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case "list": {
                $ctrlWoker->List();
                break;
            }
        case "insert": {
                $ctrlWoker->Insert();
                break;
            }
        case "update": {
                $ctrlWoker->Update();
                break;
            }
        case "delete": {
                $ctrlWoker->Delete();
                break;
            }
        case "search": {
                $ctrlWoker->Search();
                break;
            }
    }
}
