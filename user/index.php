<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#9AECDB">
    <script src="https://kit.fontawesome.com/3bcf7d20d3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
    <title>Trường THPT Lê Quý Đôn</title>
</head>
<body>  
    <div class="header" id="header">
        <h1>Trường THPT chuyên Lê Quý Đôn</h1>
    </div>

    <div class="tabs" id="tabs">
            
        <div class="tabs__sidebar">
            <button class="tabs__button" data-for-tab="1">Biểu mẫu</button>
            <button class="tabs__button" data-for-tab="2">Cá nhân</button>
            <button class="tabs__button" data-for-tab="3">Chỉnh sửa thông tin</button>
        </div>

        <div class="tabs__content " data-tab="1">
            <div class="wrapper" id="wrapper">
                <div class="recent-form" id="recent-form">
                    <?php
                        $dbname = "tmp_data";
                        $servername = "localhost";
                        $dbusername = "root";
                        $dbpassword = "";
                        header("Content-type: text/html; charset=utf-8");
                        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
                        mysqli_set_charset($conn, 'UTF8');

                        $sql = "SELECT * FROM `tmp_form` WHERE 1";
                        $table = mysqli_query($conn, $sql);
                        if ($table) {
                            while ($row = mysqli_fetch_row($table)) {
                                $id = $row[0];
                                $name = $row[1];
                                $date = $row[2];
                                ?>
                                <div class="form__card" id="form__card" name="form__card">
                                    <button name="btn-heading" id="btn-heading"><?php echo $name; ?></button>
                                    <p name="date-time" id="date-time"> <?php echo $date; ?> </p>
                                    <p name="uploader" id="uploader">Tải lên từ: Văn phòng</p>
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <div class="display-form" id="display-form">
                    <div id="return-txt">
                        <p id="preload">Biểu mẫu</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs__content " data-tab="2">
            <div class="personal-info-wrapper" id="personal-info-wrapper">
                <div class="left-card" id="left-card">
                    <div class="info-wrapper" id="info-wrapper">
                        <p><img id="avatar" src="../img/cute.jpg" alt="avatar"></p>
                        <?php
                            $dwn = "<br>";
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
                            $username = $_GET['username'];
                            $password = $_GET['password'];
                            $table = mysqli_query($conn2, "SELECT * FROM `student` WHERE 1");
                            if (!$table) {
                                header("location: ../error.html");
                            }
                            $id = 0;
                            $studentname = "";
                            $class = "";
                            $age = 0;
                            $studentID = "";
                            $vehicle = "";
                            while ($row = mysqli_fetch_row($table)) {
                                if ($username == $row[4] && $password == $row[5]) {
                                    $id = $row[0];
                                    $studentname = $row[1];
                                    $age = $row[2];
                                    $class = $row[3];
                                    $studentID = $row[6];
                                    $vehicle = $row[7];
                                    break;
                                }
                            }
                            ?>
                            <p id="student-name">Học sinh: <?php echo $studentname; ?></p>
                            <p id="class">Lớp: <?php echo $class; ?></p>
                            <p id="studentID">MSHS: <?php echo $studentID; ?></p>
                            <?php
                        ?>
                    </div>
                </div>
                <div class="right-card" id="right-card">
                    <div class="QRcode-wrapper" id="QRcode-wrapper">
                        <?php
                            $dwn = "<br>";
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
                            $username = $_GET['username'];
                            $password = $_GET['password'];
                            $table = mysqli_query($conn2, "SELECT * FROM `student` WHERE 1");
                            if (!$table) {
                                header("location: ../error.html");
                            }
                            $id = 0;
                            $studentname = "";
                            $class = "";
                            $age = 0;
                            $studentID = "";
                            $vehicle = "";
                            while ($row = mysqli_fetch_row($table)) {
                                if ($username == $row[4] && $password == $row[5]) {
                                    $id = $row[0];
                                    $studentname = $row[1];
                                    $age = $row[2];
                                    $class = $row[3];
                                    $studentID = $row[6];
                                    $vehicle = $row[7];
                                    break;
                                }
                            }
                            $dir = "../QRCode/grade" . explode(" ", $class)[0] . "/" . explode(" ", $class)[0] . explode(" ", $class)[1] . "/"; 
                            ?>
                            <img id="QRCode" src="../QRCode/grade11/11Ti/Nguyen Nhat Minh.jpg" alt="Đây là mã QR" >
                            <?php
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs__content " data-tab="3">
            <div class="content3-wrapper" id="content3-wrapper">
                <form name="update-info" id="update-info" action="update-info.php" method="POST">
                    <h2>Chỉnh sửa thông tin học sinh</h2>
                    <input type="text" name="student-name" id="student-name" value="" placeholder="Họ và tên học sinh">
                    <input type="text" name="class" id="class" value="" placeholder="Lớp">
                    <input type="text" name="age" id="age" value="" placeholder="Tuổi">
                    <input type="text" name="username" id="username" value="" placeholder="Tên người dùng">
                    <input type="password" name="password" id="password" value="" placeholder="Mật khẩu">
                    <input type="text" name="studentID" id="studentID" value="" placeholder="Mã số học sinh">
                    <input type="text" name="vehicle" id="vehicle" value="" placeholder="Phương tiện đi lại">
                    <div class="tmp" id="update-info-submit-btn-wrapper">
                        <button type="submit" id="update-info-submit-btn">Cập nhật thông tin <i class="fas fa-location-arrow"></i></button>
                    </div>
                </form>
            </div>
        </div> 

    </div>

    <script type="text/javascript">
        function setupTabs () {
            document.querySelectorAll(".tabs__button").forEach(button => {
                button.addEventListener("click", () => {
                    const sideBar = button.parentElement;
                    const tabsContainer = sideBar.parentElement;
                    const tabNumber = button.dataset.forTab;
                    const tabToActivate = tabsContainer.querySelector('.tabs__content[data-tab="' + tabNumber + '"]');

                    var cnt = 1;
                    sideBar.querySelectorAll(".tabs__button").forEach(button => {
                        button.classList.remove("tabs__button" + cnt + "--active");
                        cnt++;
                    });
                    cnt = 1;
                    tabsContainer.querySelectorAll(".tabs__content").forEach(tab => {
                        tab.classList.remove("tabs__content" + cnt + "--active");
                        cnt++;
                    });
                    button.classList.add("tabs__button" + tabNumber + "--active");
                    tabToActivate.classList.add("tabs__content" + tabNumber + "--active");
                    sessionStorage.setItem("current tab", tabNumber);
                });
            });
        }
        function loadDoc(name) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var parser, xmlDoc;
                    var text = this.responseText;
                    parser = new DOMParser();
                    xmlDoc = parser.parseFromString(text,"text/xml");
                    var headingtxt = xmlDoc.getElementsByTagName("heading")[0].childNodes[0].nodeValue;
                    var discriptiontxt = xmlDoc.getElementsByTagName("discription")[0].childNodes[0].nodeValue;
                    var lengthtxt = xmlDoc.getElementsByTagName("length")[0].childNodes[0].nodeValue;
                    
                    var returntxt = '<form action="submit-form.php" method="post" class="form-wrapper" id="form-wrapper">';
                        returntxt +=     '<input type="text" name="username" value="' + sessionStorage.getItem("username") + '" hidden="hidden">';
                        returntxt +=     '<input type="text" name="password" value="' + sessionStorage.getItem("password") + '" hidden="hidden">';
                        returntxt +=     '<div class="heading-wrapper" id="heading-wrapper">';
                        returntxt +=         '<div class="form-heading" id="form-heading">';
                        returntxt +=             '<input type="text" name="inp-heading" value="" id="inp-heading" readonly>';
                        returntxt +=         '</div>';
                        returntxt +=         '<div class="form-discription" id="form-discription">';
                        returntxt +=             '<input type="text" name="inp-discription" value="" id="inp-discription" readonly>';
                        returntxt +=         '</div>';
                        returntxt +=     '</div>';
                        returntxt +=     '<div class="body-wrapper" id="body-wrapper">';

                    for (var i = 1; i <= lengthtxt; i++) {
                        returntxt += '<div class="question" id="question' + i + '">';
                        returntxt += '<input type="text" class="ques" name="inp-question' + i + '" id="question' + i + '-value" value="" readonly>';
                        returntxt += '<input type="text" class="answ" name="inp-answer' + i + '" id="answer' + i + '-value" value="" placeholder="Điền thông tin ở đây">';
                        returntxt += '</div>';
                    }
                    
                        returntxt +=    '</div>';
                        returntxt +=    '<div class="form-submit-btn" id="form-submit-btn">';
                        returntxt +=        '<div class="submit-btn-wrapper" id="submit-btn-wrapper">';
                        returntxt +=            '<button type="submit">Gửi thông tin <i class="fas fa-arrow-circle-up"></i></button>';
                        returntxt +=        '</div>';
                        returntxt +=    '</div>';
                        returntxt += '</form>';

                    document.getElementById("return-txt").innerHTML = returntxt;
                    document.getElementById("inp-heading").setAttribute("value", headingtxt);
                    document.getElementById("inp-discription").setAttribute("value", "Mô tả: " + discriptiontxt);
                    for (var i = 1; i <= lengthtxt; i++) {
                        var tmp = "question" + i + "-value";
                        var tmp2 = "question" + i;
                        var res = xmlDoc.getElementsByTagName(tmp2)[0].childNodes[0].nodeValue;
                        document.getElementById(tmp).setAttribute("value", res);
                    }
                }
            };
            xhttp.open("post", "../forms/" + name + ".txt", true);
            xhttp.send();
        
        }
        function setUp() {
            document.querySelectorAll("#btn-heading").forEach(button => {
                button.addEventListener("click", () => {
                    document.querySelectorAll("#btn-heading").forEach(card => {
                        card.classList.remove("btn-heading--active");
                    });
                    button.classList.add("btn-heading--active");
                    loadDoc(button.innerHTML);
                });
            });
        }
        document.addEventListener("DOMContentLoaded", () => {
            setupTabs();
            setUp();

            document.querySelectorAll(".tabs").forEach(tabsContainer => {
                tabsContainer.querySelector(".tabs__sidebar .tabs__button").click();
            });
        });
    </script>

    <div class="footer" id="footer">
        <h2>Trường THPT chuyên Lê Quý Đôn - tỉnh Khánh Hòa</h2>
    </div>
</body>
</html>