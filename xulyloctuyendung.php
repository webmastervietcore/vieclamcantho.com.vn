<?php 

require 'db.php';
 function tieudekhongdau($str)
{
                $str = trim(mb_strtolower($str, 'UTF-8'));
                $strFind = array(
                                '- ', ' ', 'đ',
                                'á', 'à', 'ạ', 'ả', 'ã', 'ă', 'ắ', 'ằ', 'ặ', 'ẳ', 'ẵ', 'â', 'ấ', 'ầ', 'ậ', 'ẩ', 'ẫ',
                                'ó', 'ò', 'ọ', 'ỏ', 'õ', 'ô', 'ố', 'ồ', 'ộ', 'ổ', 'ỗ', 'ơ', 'ớ', 'ờ', 'ợ', 'ở', 'ỡ',
                                'é', 'è', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ế', 'ề', 'ệ', 'ể', 'ễ',
                                'ú', 'ù', 'ụ', 'ủ', 'ũ', 'ư', 'ứ', 'ừ', 'ự', 'ử', 'ữ',
                                'í', 'ì', 'ị', 'ỉ', 'ĩ',
                                'ý', 'ỳ', 'ỵ', 'ỷ', 'ỹ');
                $strReplace = array(
                                '', '-', 'd',
                                'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
                                'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
                                'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
                                'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
                                'i', 'i', 'i', 'i', 'i',
                                'y', 'y', 'y', 'y', 'y');
                return preg_replace('/[^a-z0-9\-]+/i', '', str_replace($strFind, $strReplace, $str));
}
?>


<?php
$sql;
$mavung=addslashes($_POST['mavung']);
$manganh=addslashes($_POST['manganh']);


switch($manganh)
{
case 	"all":
{
	switch ($mavung)
	{
	case "all":
	{
 ?>


<?php 
$loai="";
$sqlvip="select matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung where vip='0'";
$stmt = $db->prepare($sqlvip);
			$stmt->execute();
			while($r=$stmt->fetch()){
				$matuyendung=$r['matuyendung'];
$loai=$loai." matuyendung!='".$matuyendung."' and ";

 ?>
<blockquote class="default" style="margin-top:10px;border-radius:5px;">
       <div class="glyphicon glyphicon-bookmark" style="
    float: right;
  padding: 0px;
  margin: 0px;
  /* top: -10px; */
  color: red;
  position: absolute;
  font-size: 30px;
  left: 92%;
  top: 0px;
">
  </div>
        <div class="row">
        
       <div class=" col-md-2"  style="box-shadow: 1px 1px 9px -2px;
  border-radius: 15px;
 
  padding: 5px; " id="logo" > <a style="padding: 0px;" href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html"> <img class="img-responsive" style='margin:auto;' width="100px" height="100px" src="logo/<?php  echo $r['logo'];  ?>" /></a></div> 
         <div class=" col-md-10" id="kelogo">
          <div  style="margin-bottom:10px;text-align:center"> <a  class="tieude" href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html"> <?php echo mb_convert_case($r['tendonvi'],MB_CASE_UPPER, "UTF-8"); ?></a></div>

<div class="row tungdongnoidung">
<div class="vitritieude"> <span  class='glyphicon glyphicon-user'></span><label class="keytd">Vị trí </label>:</div> 
<p class="vitrinoidung" ><span id="vitri"><?php echo "  ".mb_convert_case($r['vitri'], MB_CASE_TITLE, "UTF-8"); ?></span></p>
    </div>
  
  
  
    <div   class="row tungdongnoidung">
    <div class="vitritieude">    	<span class="glyphicon glyphicon-briefcase"></span><label class="keytd">Lĩnh vực</label>:</div>
    <div class="vitrinoidung" >  <span class="innganh">
		   <?php 
		   
		   
		   $sqlvip="select * from nganhtuyendung ntd,nganhnghe n where ntd.manganh=n.manganh and 

matuyendung='$matuyendung' ";
		  
		   	$kwvung = $db->prepare($sqlvip);
			$kwvung->execute();
			$i=0;
			while($vung=$kwvung->fetch()){
		   ?> 
           
         <?php  if($i!=0){?> , <?php } $i=1; echo $vung['tennganh']; ?>
           <?php  }?></span>       
        </div>
          </div>
           
               <div   class="row tungdongnoidung">
        <div class="vitritieude"><span class="glyphicon glyphicon-map-marker"></span><label class="keytd">Nơi làm</label>:</div>

 <div class="vitrinoidung" > 
 <span  class="invung">
		   <?php 
		   
		   
		   $sqlvip="select * from vungtuyendung mtd,vung v where mtd.mavung=v.mavung and 

matuyendung='$matuyendung' ";
		  
		   	$kwvung = $db->prepare($sqlvip);
			$kwvung->execute();
			$i=0;
			while($vung=$kwvung->fetch()){
		   ?> 
           
        <?php  if($i!=0){?> -<?php } $i=1; echo $vung['tenvung']; ?>
           <?php   }?></span>
</div>

       </div>         
         
   
  <div  class="row tungdongnoidung">
  	<div class="vitritieude"><span class="glyphicon glyphicon-time"></span><label class="keytd">Hạn nộp</label>:</div>
<div class="vitrinoidung" >
 <div style="color:#F33;font-weight:bold;float:left"><?php $date = date_create($r['ngayhethan']);
 echo date_format($date, 'd-m-Y');?>
 </div>
<div id="daxem" style="text-align:right" class=""><b> &nbsp;Đã xem:</b><span style="color:#F33;font-weight:bold"> <?php echo $r['luotxem']; ?></span></div>
</div>

  
  
  </div>

          </div>
           
  </div>
  
  
  
  
  
</blockquote>
    

<?php  } ?>

<?php
$sql = "SELECT count(*) FROM tuyendung where".$loai." now()<=ngayhethan";


$stmt = $db->prepare($sql);



$stmt->execute();

$row = $stmt->fetch();

// tong so dong co trong CSDL
$totalRow = $row[0];

// so dong tren moi trang
$limit = 20;

// tinh tong so trang
$total_page = $totalRow==0?1:ceil($totalRow/$limit);


// lan dau goi trang nen trang hien tai = 1
$current_page = 1;

// neu gia tri trang moi duoc submit
if (isset($_POST["page"])){
	$current_page = $_POST["page"] ;
	$_SESSION['current_page']=$_POST["page"] ;
		$_SESSION['mavung']=$mavung;
	 $_SESSION['segment']= $_POST['segment'];
	 		$_SESSION['manganh']=$manganh;
}


// so trang hien thi cho chon; vi du << 1 | 2 | 3 | 4 | 5 | >>
$nr_page = 10;

// doan hien tai
$segment = 1;

if (isset($_POST['segment'])){
	$segment = $_POST['segment'];

}


// neu doan chon ke tiep 
if (isset($_POST['next'])){
	$segment += 1;
}

// neu chon doan truoc do
if (isset($_POST['previous'])){
	$segment -= 1;
}

 

$begin = $segment==1?1:($segment-1)*$nr_page+1;

$end = ($begin+$nr_page-1)<$total_page?$begin+$nr_page-1:$total_page;
$current_page = $current_page<$begin?$begin:$current_page;



// tinh vi tri bat dau select
$start = $current_page==1?0:($current_page-1)*$limit;



$sql="select matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung  where".$loai." now()<=ngayhethan ORDER  BY ngaybatdau desc ";
$sql .= " LIMIT $start,$limit";
break;
        }
		default:
	{

$sql = "SELECT count(*) FROM tuyendung,vungtuyendung where tuyendung.matuyendung=vungtuyendung.matuyendung and mavung='$mavung' and now()<=ngayhethan";


$stmt = $db->prepare($sql);


$stmt->execute();

$row = $stmt->fetch();

// tong so dong co trong CSDL
$totalRow = $row[0];

// so dong tren moi trang
$limit = 20;

// tinh tong so trang
$total_page = $totalRow==0?1:ceil($totalRow/$limit);


// lan dau goi trang nen trang hien tai = 1
$current_page = 1;

// neu gia tri trang moi duoc submit
if (isset($_POST["page"])){
	$current_page = $_POST["page"] ;
	
	$_SESSION['current_page']=$_POST["page"] ;
		$_SESSION['mavung']=$mavung;
	 $_SESSION['segment']= $_POST['segment'];
	 		$_SESSION['manganh']=$manganh;
}


// so trang hien thi cho chon; vi du << 1 | 2 | 3 | 4 | 5 | >>
$nr_page = 10;

// doan hien tai
$segment = 1;

if (isset($_POST['segment'])){
	$segment = $_POST['segment'];
	
}


// neu doan chon ke tiep 
if (isset($_POST['next'])){
	$segment += 1;
}

// neu chon doan truoc do
if (isset($_POST['previous'])){
	$segment -= 1;
}

 

$begin = $segment==1?1:($segment-1)*$nr_page+1;

$end = ($begin+$nr_page-1)<$total_page?$begin+$nr_page-1:$total_page;
$current_page = $current_page<$begin?$begin:$current_page;



// tinh vi tri bat dau select
$start = $current_page==1?0:($current_page-1)*$limit;


$sql="select tuyendung.matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung,vungtuyendung  where tuyendung.matuyendung=vungtuyendung.matuyendung and  mavung='$mavung' and now()<=ngayhethan  ORDER  BY ngaybatdau desc";

	$sql .= " LIMIT $start,$limit";

		break;
		
	}
		
		}
		break;
}

	
	default:
	{
		switch ($mavung)
	{
	case "all":
	{

$sql = "SELECT count(*) FROM tuyendung,nganhtuyendung where tuyendung.matuyendung=nganhtuyendung.matuyendung and manganh='$manganh' and now()<=ngayhethan";


$stmt = $db->prepare($sql);


$stmt->execute();

$row = $stmt->fetch();

// tong so dong co trong CSDL
$totalRow = $row[0];

// so dong tren moi trang
$limit = 20;

// tinh tong so trang
$total_page = $totalRow==0?1:ceil($totalRow/$limit);


// lan dau goi trang nen trang hien tai = 1
$current_page = 1;

// neu gia tri trang moi duoc submit
if (isset($_POST["page"])){
	$current_page = $_POST["page"] ;
	$_SESSION['current_page']=$_POST["page"] ;
		$_SESSION['mavung']=$mavung;
	 $_SESSION['segment']= $_POST['segment'];
	 		$_SESSION['manganh']=$manganh;
}


// so trang hien thi cho chon; vi du << 1 | 2 | 3 | 4 | 5 | >>
$nr_page = 10;

// doan hien tai
$segment = 1;

if (isset($_POST['segment'])){
	$segment = $_POST['segment'];
}


// neu doan chon ke tiep 
if (isset($_POST['next'])){
	$segment += 1;
}

// neu chon doan truoc do
if (isset($_POST['previous'])){
	$segment -= 1;
}

 

$begin = $segment==1?1:($segment-1)*$nr_page+1;

$end = ($begin+$nr_page-1)<$total_page?$begin+$nr_page-1:$total_page;
$current_page = $current_page<$begin?$begin:$current_page;



// tinh vi tri bat dau select
$start = $current_page==1?0:($current_page-1)*$limit;

$sql="select tuyendung.matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung,nganhtuyendung  where tuyendung.matuyendung=nganhtuyendung.matuyendung and manganh='$manganh' and now()<=ngayhethan ORDER  BY ngaybatdau desc";
$sql .= " LIMIT $start,$limit";
		break;
		}
		
		default:
	{


$sql = "SELECT count(*) FROM tuyendung,nganhtuyendung,vungtuyendung where tuyendung.matuyendung=nganhtuyendung.matuyendung and tuyendung.matuyendung=vungtuyendung.matuyendung  and manganh='$manganh' and  mavung='$mavung' and now()<=ngayhethan";


$stmt = $db->prepare($sql);


$stmt->execute();

$row = $stmt->fetch();

// tong so dong co trong CSDL
$totalRow = $row[0];

// so dong tren moi trang
$limit = 20;

// tinh tong so trang
$total_page = $totalRow==0?1:ceil($totalRow/$limit);


// lan dau goi trang nen trang hien tai = 1
$current_page = 1;

// neu gia tri trang moi duoc submit
if (isset($_POST["page"])){
	$current_page = $_POST["page"] ;
	$_SESSION['current_page']=$_POST["page"] ;
		$_SESSION['mavung']=$mavung;
	 $_SESSION['segment']= $_POST['segment'];
	 		$_SESSION['manganh']=$manganh;
}


// so trang hien thi cho chon; vi du << 1 | 2 | 3 | 4 | 5 | >>
$nr_page = 10;

// doan hien tai
$segment = 1;

if (isset($_POST['segment'])){
	$segment = $_POST['segment'];
}


// neu doan chon ke tiep 
if (isset($_POST['next'])){
	$segment += 1;
}

// neu chon doan truoc do
if (isset($_POST['previous'])){
	$segment -= 1;
}

 

$begin = $segment==1?1:($segment-1)*$nr_page+1;

$end = ($begin+$nr_page-1)<$total_page?$begin+$nr_page-1:$total_page;
$current_page = $current_page<$begin?$begin:$current_page;



// tinh vi tri bat dau select
$start = $current_page==1?0:($current_page-1)*$limit;

$sql="select tuyendung.matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung,nganhtuyendung,vungtuyendung  where tuyendung.matuyendung=nganhtuyendung.matuyendung and tuyendung.matuyendung=vungtuyendung.matuyendung and manganh='$manganh' and mavung='$mavung' and  now()<=ngayhethan ORDER  BY ngaybatdau desc";
$sql .= " LIMIT $start,$limit";
		break;
		
	}
		
		}
		break;
	}
}
$j=1;
?>



<?php 
$sqlnganhtd="select * from nganhtuyendung where  matuyendung='1'";
$sqlvungtd="select * from vungtuyendung where  matuyendung='1'";
$temp="";	
$dk="";
   $stmt = $db->prepare($sql);
			$stmt->execute();
                        foreach ($stmt as $key=>$values)
                        { $main[]=$values;

                            if($temp!=$values['matuyendung'])
                            {
                        $dk.=" or matuyendung='".$values['matuyendung']."'";    
                       $temp=$values['matuyendung'];
                            }
                        
                        }
           $sqlnganhtd.=$dk;
           
              $sqlvungtd.=$dk;       
                
                    
                  $sqlnganhnghe="select * from nganhnghe ";
           
                        $stmt1 = $db->prepare($sqlnganhnghe);
			$stmt1->execute();
                        foreach ($stmt1 as $value)
                        {
                            $tennganh[$value['manganh']]=$value['tennganh'];
                        }
                        $sqlvung="select * from vung ";
           
                        $stmt1 = $db->prepare($sqlvung);
			$stmt1->execute();
                        foreach ($stmt1 as $value)
                        {
                            $tenvung[$value['mavung']]=$value['tenvung'];
                        }
                        
                        
                          $stmt = $db->prepare($sqlnganhtd);
			  $stmt->execute();
                        
                         foreach ($stmt as $key=>$value)
                         {                             
                       $NganhData[$value['matuyendung']][]=$tennganh[$value['manganh']];
                                                   
                        }
                         
                          $stmt = $db->prepare($sqlvungtd);
			  $stmt->execute();
                              foreach ($stmt as $key=>$value)
                         {                             
                       $VungData[$value['matuyendung']][]=$tenvung[$value['mavung']];
                                                   
                        }
                    


?>

<?php $a=array("default","bittersweet","grapefruit","sunflower","grass","mint","aqua","bluejeans","lavander","pinkrose","light","gray");
if(isset($main)){
					  foreach ($main as $r){
				$j++;
			$k=rand(0,11);
			$matuyendung=$r['matuyendung'];
			
			?>

 <?php $i=1;?>

 


   
               
<blockquote class="default" style="margin-top:10px;border-radius:5px;">
       
        <div class="row">
        
       <div class=" col-md-2" id="logo" style="box-shadow: 1px 1px 9px -3px #333;
  border-radius: 15px;
 
  padding: 5px; "> <a style="padding: 0px;" href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html"><img class="img-responsive" style=" margin: auto;" width="100px" height="100px" src="logo/<?php  echo $r['logo'];  ?>" /></a></div> 
         <div class=" col-md-10" id="kelogo">
          <div  style="margin-bottom:8px;text-align:center;"> <a  class="tieude" href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html"> <?php echo $r['tendonvi']; ?></a></div>

<div class="row tungdongnoidung">
<div class="vitritieude"> <span  class='glyphicon glyphicon-user'></span><label class="keytd">Vị trí </label>:</div> 
<div class="vitrinoidung" ><span id="vitri"><?php echo "  ".mb_convert_case($r['vitri'], MB_CASE_TITLE, "UTF-8"); ?></span></div>
    </div>
  
  
  
    <div   class="row tungdongnoidung">
    <div class="vitritieude">    	<span class="glyphicon glyphicon-briefcase"></span><label class="keytd">Lĩnh vực</label>:</div>
    <div class="vitrinoidung" >  <span class="innganh">
		        
        <?php $i=0;
		  foreach($NganhData[$matuyendung] as $value)
                      {
                      
                        
                          
                      
                    
                      
		   ?> 
           
            
         <?php  if($i!=0){?>, <?php } $i=1; echo $value; ?>
           <?php  }?></span>       
        </div>
          </div>
           
               <div   class="row tungdongnoidung">
        <div class="vitritieude"><span class="glyphicon glyphicon-map-marker"></span><label class="keytd">Nơi làm</label>:</div>

 <div class="vitrinoidung" > 
 <span  class="invung">
		   <?php 
                        $i=0;
		  foreach($VungData[$matuyendung] as $value)
                      {
                    
                        
                          
                      
                    
                      
		   ?> 
           
            
         <?php  if($i!=0){?>- <?php } $i=1; echo $value; ?>
           <?php  }?></span>
</div>

       </div>         
         
   
  <div  class="row tungdongnoidung">
  	<div class="vitritieude"><span class="glyphicon glyphicon-time"></span><label class="keytd">Hạn nộp</label>:</div>
<div class="vitrinoidung" >
 <div style="color:#F33;font-weight:bold;float:left"><?php $date = date_create($r['ngayhethan']);
 echo date_format($date, 'd-m-Y');?>
 </div>
<div id="daxem" style="text-align:right" class=""><b> &nbsp;Đã xem:</b><span style="color:#F33;font-weight:bold"> <?php echo $r['luotxem']; ?></span></div>
</div>

  
  
  </div>

          </div>
           
  </div>
  
  

  
  
  
</blockquote>
    
<?php  ;}   } 
               if($j==1){
				echo "<div class=\"alert alert-info\">Không tìm thấy việc làm nào </div>";  
			   }
			  $db=null; ?>
               <div align="center">
			   <ul  class=" pagination">
		 				<li class="<?php echo $current_page==1?'disabled':'';?>" >
		 					<a href="#" id="previous" 
		 						data-segment="<?php echo $segment==1?1:($segment-1); ?>" 
		 						data-page="<?php echo $end-$nr_page;?>">&laquo;</a></li>
		 				 
		 				 <?php for($i=$begin;$i<=$end;$i++):?>
		 				 	<li class="
							<?php  if($i==$current_page){
						echo 'active tranghientai';

							}?>"
                            
                            ><a href="#" class="page_number" 
		 				 		data-segment="<?php echo $segment; ?>" 
		 				 		data-page="<?php echo $i;?>"><?php echo $i;?></a></li>
		 				 <?php endfor;?>
		 				 
		 				<li class="<?php echo $end==$total_page?'disabled':'';?> ">
		 					<a  href="#" id="next" 
		 						data-segment="<?php echo $segment+1; ?>" 
		 						data-page="<?php echo $end+1 ?>">&raquo;</a></li>
		 			</ul> 
			   </div>
               <button   class="hidden tongsotrang" value="<?php echo $total_page;  ?>"></button>