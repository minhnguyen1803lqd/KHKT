<?php

function GenerateQRCode ($inp_text, $class, $studentname) {
    include("../phpqrcode/qrlib.php");
    $text = $inp_text;
    $dir = "../QRCode/grade" . explode(" ", $class)[0] . "/" . explode(" ", $class)[0] . explode(" ", $class)[1] . "/" . $studentname . ".jpg";
    $recoverlevel = "L";
    $pixelsize = 1080;
    $size = 9;
    QRcode::png($text, $dir, $recoverlevel, $pixelsize, $size);
}

GenerateQRCode("Dang Minh Liem", "11 Ti", "Đặng Minh Liêm");

?>