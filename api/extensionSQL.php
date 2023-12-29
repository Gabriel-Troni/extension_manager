<?php
    require_once("connection.php");
    $conn = connect();

    function selectExtensions($conn){
        $sql = "SELECT * FROM extension";
        return mysqli_query($conn, $sql);
    }
    
    $button = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(!isset($_POST["btn"])) {
            $_POST["btn"] = "";
        } else {
            $button = $_POST["btn"];
        }

        if($button == "insert"){
            $employeeName = checkForm($conn, $_POST["employeeName"]);
            $employeeDepartment = checkForm($conn, $_POST["employeeDepartment"]);
            $employeeExtension = checkForm($conn, $_POST["employeeExtension"]);

            $sql = "INSERT INTO extension VALUES ('".$employeeName."', '".$employeeDepartment."', '".$employeeExtension."')";
            mysqli_query($conn, $sql);
        }
        else if ($button == "update") {
            $oldName = checkForm($conn, $_POST["oldName"]);
            $employeeName = checkForm($conn, $_POST["employeeName"]);
            $employeeDepartment = checkForm($conn, $_POST["employeeDepartment"]);
            $employeeExtension = checkForm($conn, $_POST["employeeExtension"]);
            $sql = "UPDATE extension SET name = '".$employeeName."', department = '".$employeeDepartment."', extension = '".$employeeExtension."' WHERE name = '".$oldName."'";
            mysqli_query($conn, $sql);
        }
        else if ($button == "delete") {
            $employeeName = checkForm($conn, $_POST["name"]);
            $sql = "DELETE FROM extension WHERE name = '".$employeeName."'";
            mysqli_query($conn, $sql);
        }
    }
?>