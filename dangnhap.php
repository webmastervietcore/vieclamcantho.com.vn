<?php

require 'db.php';

if (isset($_POST['email']) && isset($_POST['matkhau'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && strlen($_POST['matkhau']) > 4) {
        $email = input($_POST['email']);
        $matkhau = input($_POST['matkhau']);


        $sql = "select email,matkhau from  taikhoan where email=:email and matkhau=:matkhau";
        $kq = select($sql, array('email' => $email, 'matkhau' => $matkhau), $db);
        if (checklogin()) {
            deletecookie("authentic");
        }
        if ($kq) {
            $datacookie = array("email" => $email,
                "password" => $matkhau,
                "checksum" => createchecksum(array("0" => $email, "1" => $matkhau)),
                "type" => 1);
            createcookie("authentic", $datacookie);
            echo json_encode(array('tinhtrang' => 1));
        } else {

            echo json_encode(array('tinhtrang' => 0));
        }
    } // khong thoa mang 
    else
        echo json_encode(array('tinhtrang' => 0));
} // khong tin tai
else
    echo json_encode(array('tinhtrang' => 0));
?>