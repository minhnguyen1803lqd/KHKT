<?php

    require_once("../php/config.php");
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    if (!$conn) {
        header("location: ../");
    }

    $sql = "SELECT * FROM lqdstudentaccount";
    $table = mysqli_query($conn, $sql);
    if ($table) {   
        $username = $_POST["username"];
        $password = $_POST["password"];
        $studentname = $_POST["studentname"];
        $grade = $_POST["grade"];

        if ($username != "" && $password != "" && $studentname != "" && $grade != "") {
            $count = 0;
            while ($row = mysqli_fetch_row($table)) {
                $count++;
            }
            $id = $count;
            $sql1 = "INSERT INTO `lqdstudentaccount`(`ID`, `Username`, `Password`) VALUES ('$id', '$username', '$password')";
            if (mysqli_query($conn, $sql1)) {
                header("location: ../");
            } else {
                header("location: index.html");
            }
        } else {
            header("location: index.html");
        }
    } else {
        header("location: ../");
    }

?>