<?php
require 'db.php';


$makiemtra=$_POST['makiemtra'];
$makiemtra3=trim($makiemtra);
$makiemtra2=preg_replace('([^a-zA-Z0-9@.])', '', $makiemtra);

if($makiemtra==$makiemtra2 && $makiemtra==$makiemtra3 && strlen($makiemtra)<100 && $makiemtra!='' && filter_var($makiemtra,FILTER_VALIDATE_EMAIL))
{
    
	$sql="select email from taikhoan where email=:email";
       $kq=select($sql,array('email'=>$makiemtra),$db);
       
	 if(!empty($kq))
	 {
		 $data=array('tinhtrang'=>1);
	          echo json_encode($data);
	         $_SESSION['kiemtrataikhoan']=false;
	 }
	 else
	 {
		 $data=array('tinhtrang'=>0);
	          echo json_encode($data);
		 $_SESSION['kiemtrataikhoan']=true;
	 }
}
else{
         $data=array('tinhtrang'=>2);
	 echo json_encode($data);
         $_SESSION['kiemtrataikhoan']=false;
}


?>