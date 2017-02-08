<?php

require 'db.php';


if(isset($_POST['email']) && isset($_POST['type']) && filter_var(input($_POST['email']),FILTER_VALIDATE_EMAIL) )
{
$email=  input($_POST['email']);
$email=preg_replace('([^a-zA-Z0-9@.])', '',$email);
$kq[0]['row']=0;
if(input($_POST['type'])==1)
    $kq=select("select count(*) as row,matkhau,tencongty as ten from taikhoan where email=:email",array('email'=>$email),$db);
else
{
   if(input($_POST['type'])==2)
      $kq=select("select count(*) as row,matkhau,ten from hosoungvien where email=:email",array('email'=>$email),$db);
} 
    
    if($kq[0]['row']>0)
{

    $ten=$kq[0]['ten'];
    $token=  createhash("sha256",time().$email,HASH_KEY);
  $html=<<<ABC
       
     <div style="padding: 10px;
    background-color: #f0ffd1;
    border-radius: 5px;
    line-height: 2;">
   <b> Xin chào:</b> {$ten} <br>
     <b style="color: #F41973;"> Thông tin tài khoản đăng nhập của bạn là:</b> <br>
   <b>Email đăng nhập:</b> {$email} <br>
   <b>Mật khẩu:</b> {$kq[0]['matkhau']}<br><br>
   Chuỗi bảo mật gửi kèm(bạn không cần quan tâm chuỗi này): {$token}
   </div>
ABC;
require "PHPMailer/class.phpmailer.php";
require "PHPMailer/PHPMailerAutoload.php";
// Khai báo tạo PHPMailer
$mail = new PHPMailer();
//Khai báo gửi mail bằng SMTP
$mail->IsSMTP();
//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
// 1 = Thông báo lỗi ở client
// 2 = Thông báo lỗi cả client và lỗi ở server
//$mail->SMTPDebug  = 2;
 
$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
$mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
$mail->Port       = 587; // cổng để gửi mail
$mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
$mail->SMTPAuth   = true; //Xác thực SMTP
$mail->Username   = EMAIL; // Tên đăng nhập tài khoản Gmail
$mail->Password   = PASSEMAIL; //Mật khẩu của gmail
$mail->SetFrom(EMAIL,NAMEEMAIL); // Thông tin người gửi
$mail->AddReplyTo(EMAIL,NAMEEMAIL);// Ấn định email sẽ nhận khi người dùng reply lại.


$mail->AddAddress($email,$ten);//Email của người nhận
$mail->Subject = "THÔNG TIN TÀI KHOẢN"; //Tiêu đề của thư
$mail->MsgHTML($html); //Nội dung của bức thư.
$mail->CharSet='UTF-8';
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gửi thư với tập tin html
$mail->AltBody = "This is a plain-text message body";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
//Tiến hành gửi email và kiểm tra lỗi
if(!$mail->Send()) {
 // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
    echo json_encode(array('tinhtrang'=>0,'tinnhan'=>"Xin lỗi! Chưa gửi được mật khẩu đến Email của bạn"));
} else {
  echo json_encode(array('tinhtrang'=>1,'email'=>$email));
}
}
 else {
       echo json_encode(array('tinhtrang'=>0,'tinnhan'=>"Xin lỗi! Email không tồn tại"));
 }
}
else
{
     echo json_encode(array('tinhtrang'=>0,'tinnhan'=>"Xin lỗi! Email không tồn tại"));
}
