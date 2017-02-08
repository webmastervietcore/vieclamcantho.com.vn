<?php require 'db.php' ;


$tendonvi =  input($_POST['tieude']);

$sql="select matuyendung,tendonvi,diachi,vitri,slug from tuyendung where  now()<=ngayhethan and ( tendonvi like '%$tendonvi%' or diachi like '%$tendonvi%' or vitri like '%$tendonvi%' and now()<=ngayhethan ) limit 10";


		   	$stmt = $db->prepare($sql);
			$stmt->execute();
			while($r=$stmt->fetch()){

?>
<li><a style="color:rgba(255,255,255,1)" href="<?php echo URL.$r['slug']; ?>-<?php echo $r['matuyendung']; ?>.html"><?php echo str_replace(mb_strtolower($tendonvi,'UTF-8'), '<b style=\'color:pink\'>'.$tendonvi.'</b>',  mb_strtolower( output($r['tendonvi']).' - Tuyển: '.output($r['vitri'])." -Đ/C: ".output($r['diachi']),'UTF-8')); ?></a></li>

<?php  }?>