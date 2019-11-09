<?php

    $dwn = "\n";
    $db1name = "tmp_data";
    $db2name = "main_db";
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $conn1 = mysqli_connect($servername, $dbusername, $dbpassword, $db1name);   //  Kết nối vào server phụ
    $conn2 = mysqli_connect($servername, $dbusername, $dbpassword, $db2name);   //  Kết nối vào server chính
    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($conn1, 'UTF8');
    mysqli_set_charset($conn2, 'UTF8');
    if (!$conn1 || !$conn2) {
        header("location: ../error.html");
    }   //  Nếu không kết nối được server sẽ trả về trang lỗi

    $username = $_POST['username'];
    $password = $_POST['password'];
    $studentname = $_POST['studentname'];
    $class = $_POST['grade'];

    $sql1 = "SELECT * FROM `tmp_account` WHERE 1";
    $sql2 = "SELECT * FROM `student` WHERE 1";
    $table1 = mysqli_query($conn1, $sql1);
    $table2 = mysqli_query($conn2, $sql2);
    if (!$table1 || !$table2) {
        header("location: ../error.html");
    }

    $table1row = 0;
    $table2row = 0;
    $id = 0;
    while ($row = mysqli_fetch_row($table1)) {
        $table1row++;
    }
    if ($table1row == 0) {
        $id = 1;
    } else {
        $id = $table1row;
    }

    $sql1 = "INSERT INTO `tmp_account`(`ID`, `Username`, `Password`, `Studentname`, `Class`) 
            VALUES ('$id', '$username', '$password', N'$studentname', '$class')";
    $sql2 = "INSERT INTO `student`(`ID`, `Name`, `Class`, `Username`, `Password`) 
            VALUES ('$id', '$studentname', '$class', N'$username', '$password')";

    $check1 = mysqli_query($conn1, $sql1);
    $check2 = mysqli_query($conn2, $sql2);

    if (!$check1 || !$check2) {
        header("location: ../error.html");
    }

    header("location: ../login/");

?>