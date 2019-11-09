<?php

    /*
        kiểm tra người dùng đã cập nhật thông tin chưa?
        nếu chưa thì yêu cầu người dùng cập nhật
        nếu rồi thì chỉnh sửa thông tin theo yêu cầu
    */

    $dwn = "<br>";
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

    $studentname = $_POST['student-name'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studentID = $_POST['studentID'];
    $vehicle = $_POST['vehicle'];
    $id = -1;

    $sql = "SELECT * FROM `student` WHERE 1";
    $table = mysqli_query($conn2, $sql);
    if (!$table) {
        header("location: ../error.html");
    }
    while ($row = mysqli_fetch_row($table)) {
        if ($row[0] != 0 && $row[1] == $studentname) {
            $id = $row[0];
            break;
        }
    }
    $sql = "
    UPDATE `student` SET `ID`= '$id',`Name`= '$studentname',`Age`= '$age',`Class`= '$class', `Username`= '$username',`Password`= '$password',`StudentID`= '$studentID',`Vehicle`= '$vehicle' WHERE id = '$id';
    ";
    $query =mysqli_query($conn2, $sql);
    if (!$query) {
        echo "cập nhật lỗi" . $dwn;
    }
    echo "cập nhật thành công" . $dwn;
    

?>