<?php

    $dbname = "tmp_data";
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";

    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if (!$conn) {
        header("location: ../index.html/");
    }

    $username = $_POST["inp_username"];
    $password = $_POST["inp_password"];

    if ($username == "" || $password == "") {
        header("location: index.html");
    }

    $checker = 0;
    $sql = "SELECT * FROM tmp_account";
    $table = mysqli_query($conn, $sql);
    if ($table) {
        while ($row = mysqli_fetch_row($table)) {
            $ID_th = $row[0];
            $username_th = $row[1];
            $password_th = $row[2];
            if ($ID_th == "0" && $username == $username_th && $password == $password_th) {
                header("location: ../admin/index.html");
                $checker = 1;
            }
            else if ($username == $username_th && $password == $password_th) {
                header("location: ../user/index.php?username=$username&password=$password");
                $checker = 1;
            }
        }
    }
    if ($checker == 0) header("location: ../index.html");

?>