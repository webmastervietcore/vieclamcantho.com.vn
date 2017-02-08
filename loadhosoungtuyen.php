<?php


require 'db.php';
if(checklogin(2))
{

$id=$_POST['id'];
$email=$datauser['email'];

$kq=select("select noidung from emailungtuyen where id=:id and email=:email",array('id'=>$id,'email'=>$email),$db);
if(!empty($kq))
echo json_encode(array('tinhtrang'=>1,'noidung'=>$kq[0]['noidung']));
else
  echo json_encode(array('tinhtrang'=>1,'noidung'=>"Không lấy được nội dung"));  
}