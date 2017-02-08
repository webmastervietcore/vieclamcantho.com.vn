<?php
require 'db.php';

if(isset($_POST['ghichu']) && checklogin(2))
{
    $guifile=false;
    $emailungvien=$datauser['email'];
    $kq=select("select ten,sdt from hosoungvien where email=:email",array('email'=>$emailungvien),$db);
    $tenungvien=$kq[0]['ten'];
    $sdt=$kq[0]['sdt'];
    $linkungvien=URL."ho-so-chi-tiet-".$emailungvien.".html";
    $noidung= $_POST['ghichu'];
    $tencongty=$_POST['tencongty'];
    $diachi=$_POST['diachi'];
    $emailcongty=input($_POST['email']);
    $slugcongty=input($_POST['slug']);
    if(isset($_FILES['file']))
{
     $temp = '-'.time().rand(0,100);
     $file=$_FILES['file'];
     $image= kytuthuong(substr($file['name'],0,strlen($file['name'])-4));   
     $image_name= $image.'-'.tieudekhongdau($tenungvien).$temp.'.'.getExtension($file['name']);
     $newname="upload/mail/".$image_name;
     $copied = copy($_FILES['file']['tmp_name'],$newname);
}else $image_name='';
  
  $html=<<<ABC
          <div class="clearfix" style="    background-color: #6EBDF3;
    padding: 20px;">
          <div style="background-color: white;
    padding: 10px;
    border-radius: 5px;
   ">
   <span style="color:#006400;"><strong>Kính gửi</strong>:</span>
          <div style="text-align: center;">
              <span style="color:#FF0000;"><strong>{$tencongty}</strong> </span><br>
   <strong>Địa chỉ</strong>: <span style="color:#0000FF;">{$diachi}<br></span>            
   <strong>Email</strong>:&nbsp;<span style="color:#0000FF;">{$emailcongty}</span><br><br>
               </div>
      
   <div style="    padding: 5px;
    border: 1px solid #d4d4d3;
    border-radius: 5px;
    margin: 10px;
    line-height: 1.5;">
    <strong style="    border-left-style: solid;
    border-left-color: #D2D02F;
    color: #3149A4;
    padding-left: 5px;
    font-size: 16px;">Thông tin ứng viên</strong>:<br>   
  <p style="color: black;"><strong>Tên:</strong> {$tenungvien}</strong></p>
 <p style="color: black;"> <strong>SDT:</strong> {$sdt}</strong></p>
  <p style="color: black;"><strong>Email:</strong> {$emailungvien}</strong></p>
      <p style="color: black;">     <strong>Xem chi tiết hồ sơ của ứng viên tại </strong> :&nbsp; <a target="_blank" href="{$linkungvien}"> {$linkungvien}</a></p>
   </div>     
       <br>
   <div style="    padding: 5px;
    border: 1px solid #D4D4D3;
    border-radius: 5px;
    margin: 10px;
    text-align: justify;line-height: 1.5;">
          <strong style="    border-left-style: solid;
    border-left-color: #D2D02F;
    color: #3149A4;
    padding-left: 5px;
    font-size: 16px;">Nội dung ứng tuyển</strong>:<br>
              <p style="color: black;">  {$noidung}</p><br>
                  </div>
             <p style="color: black;"> <img height=50px; width=150px; src="http://vieclamcantho.com.vn/public/images/logo.gif"> Tin tuyển dụng được đăng tại: 
                 <a target="_blank" href="{$slugcongty}" >{$slugcongty}</a></p></div>
        <br><br>
   <div>
   <div>
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
$mail->AddReplyTo($emailungvien,$tenungvien);// Ấn định email sẽ nhận khi người dùng reply lại.

$mail->AddAddress($emailcongty,$tencongty);//Email của người nhận
$mail->Subject = "Thành Viên ".$tenungvien." xin ứng tuyển"; //Tiêu đề của thư
$mail->MsgHTML($html); //Nội dung của bức thư.
$mail->CharSet='UTF-8';
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gửi thư với tập tin html
$mail->AltBody = "This is a plain-text message body";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
    if(isset($_FILES['file']))
{
        if(!ktfilecv($_FILES['file']))
        {
        $guifile=true;
        $mail->AddAttachment($newname);//Tập tin cần attach
        }
}
//Tiến hành gửi email và kiểm tra lỗi
if(!$mail->Send()) {
  echo json_encode(array('tinhtrang'=>0));
} else {
   $data['email']=$emailungvien;
   $data['tencongty']=$tencongty;
   $data['ngaygui']=  ngayhientai();
   $data['slugcongty']=$slugcongty;
   $data['noidung']=  xulymieuta($html);
   $data['file']=$image_name;
   insert("emailungtuyen",$data, $db);
  echo json_encode(array('tinhtrang'=>1,'noidung'=>$html,'guifile'=>$guifile==true?"1":"0"));
}
}