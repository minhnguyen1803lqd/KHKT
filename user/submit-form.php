<?php
    $dwn = "\n";
    $db1name = "tmp_data";
    $db2name = "main_db";
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $conn1 = mysqli_connect($servername, $dbusername, $dbpassword, $db1name);
    $conn2 = mysqli_connect($servername, $dbusername, $dbpassword, $db2name);
    header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($conn1, 'UTF8');
    mysqli_set_charset($conn2, 'UTF8');
    if (!$conn1 || !$conn2) {
        header("location: ../error.html");
    }
    $sql = "SELECT * FROM `student` WHERE true";
    $table = mysqli_query($conn2, $sql);
    if (!$table) {
        header("location: ../error.html");
    }

    $curent_username = $_POST['username'];
    $curent_password = $_POST['password'];
    $dir = "../db/";

    while ($row = mysqli_fetch_row($table)) {
        $ID = $row[0];
        $studentname = $row[1];
        $age = $row[2];
        $class = $row[3];
        $grade = explode(" ", $class)[0];
        $class = explode(" ", $class)[1];
        $username = $row[4];
        $password = $row[5];
        $studentID = $row[6];
        $vehicle = $row[7];

        if ($curent_username == $username && $curent_password == $password) {
            $dir = $dir . "grade" . $grade . "/" . $grade . $class . "/" . $studentname . " - " . $_POST['inp-heading'] . ".txt";
            $check = fopen($dir, "w");
            fwrite($check, $_POST['inp-heading'] . $dwn);
            fwrite($check, "--------------" . $dwn);
            fwrite($check, "Tên học sinh: " . $studentname . $dwn);
            fwrite($check, "Mã số học sinh: " . $studentID . $dwn);
            fwrite($check, "--------------" . $dwn);

            $id = 1;
            while (true) {
                $tmp = "inp-answer" . $id;
                $txt = "inp-question" . $id;
                if (isset($_POST[$txt])) {
                    fwrite($check, $_POST[$txt] . ": ");
                    fwrite($check, $_POST[$tmp] . $dwn);
                } else {
                    break;
                }
                $id++;
            }
            header("location: ../user/index.php");
        }
    }
?>