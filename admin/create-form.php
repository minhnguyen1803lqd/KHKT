<?php

    $dwn = "\n";
    $dir = "../forms/";

    $dbname = "tmp_data";
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    header("Content-type: text/html; charset=utf-8");
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    mysqli_set_charset($conn, 'UTF8');

    $FormHeading = $_POST["heading"];
    $FormDiscription = $_POST["discription"];
    $NumberOfQuestion = $_POST["cnt-ques"];
    $FormNameDir = $dir . $FormHeading . ".txt";
    $FormName = $FormHeading . ".txt";

    $check = fopen($FormNameDir, "w");

    $txt = "<?xml version='1.0' encoding='UTF-8'?>
<form>
    <heading>" . $FormHeading . "</heading>
    <discription>" . $FormDiscription . "</discription>
    <length>" . $NumberOfQuestion . "</length>" . "\n";
    for ($i = 1; $i <= $NumberOfQuestion; $i++) {
        $txt = $txt . "    <question" . $i . ">" . $_POST["question" . $i] . "</question" . $i . ">" . $dwn;
    }
    $txt = $txt . "</form>";

    $xml = simplexml_load_string($txt);
    fwrite($check, $txt);

    $sql = "SELECT * FROM tmp_form";
    $table = mysqli_query($conn, $sql);
    if ($table) {
        $cnt = 0;
        while ($row = mysqli_fetch_row($table)) {
            $cnt++;
        }
        if ($cnt == 0) $id = 1;
            else $id = $cnt + 1;
        $name = explode(".", $FormName)[0];
        $date = date("Y/m/d");
        $sql = "INSERT INTO `tmp_form`(`ID`, `Name`, `Date`) VALUES ('$id', N'$name', '$date')";
        mysqli_query($conn, $sql);
    }

    header("location: index.html");


?>