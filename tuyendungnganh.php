<?php
require 'header.php';
$_SESSION['daxem'] = 0;


?>

<script>
    $(document).ready(function (e) {

        $('#menutuyendung').addClass('menuactive');



        $(window).scroll(function () {

            var vitri = $('#vitriquangcao').offset().top;

            var top = $(this).scrollTop();

            if (top > vitri)
            {

                var i = top - vitri + 100;
                $('#anhthi').css({
                    'top': '100px',
                    'position': 'fixed'

                });

            }
            else
            {
                $('#anhthi').css({
                    'margin-top': 10,
                    'position': 'static'
                });
            }





        })
    });
</script>


<style>
    a{
        color: white;
    }
</style>


<div id="main" class="panel-body" style="margin-top:10px ;padding:0px;" > 

    <div id="hot" class="col-md-3">
        <ul class="nav nav-tabs teal" >
            <li class="active" style="color:rgba(255,255,255,1)"><a style="text-transform: none" data-toggle="tab" href="#home">Xem nhiều nhất</a></li>
            <li style="color:rgba(255,255,255,1)"><a style="text-transform: none"  data-toggle="tab" href="#menu1">Việc bán thời gian</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="list-group">
                    <?php
                    $sql = "SELECT tendonvi,vitri,matuyendung from tuyendung where now() <=ngayhethan ORDER  BY  luotxem DESC LIMIT 9";

                    $dieukien = 0;
                   $kq= select($sql,array(),$db);
                   foreach ($kq as $r) {
                        ?>
                        <a class="list-group-item " 

                           href="<?= URL ?><?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html">
                            <span > <?php echo "<span style='font-family: -webkit-body;font-size:14px'><b>" . $r['tendonvi'] . "</b></span><br>
<span class='keytd'> Vị trí:</span>" .$r['vitri']?></span> </a>


                            <?php } ?>
                </div>

            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="list-group">

<?php
$sql = "SELECT tendonvi,td.matuyendung,vitri,slug from tuyendung td,nganhtuyendung ntd where td.matuyendung=ntd.matuyendung and manganh='1' and  now()<=ngayhethan ORDER  BY ngaybatdau DESC LIMIT 9";

$kq= select($sql,array(),$db);
                   foreach ($kq as $r) {
    ?>


                        <a class="list-group-item "
                           href="<?= URL ?><?php echo $r['slug']; ?>-<?php echo $r['matuyendung']; ?>.html"> 
                            <span > <?php echo "<span style='font-family: -webkit-body;font-size:14px'><b>" . $r['tendonvi'] . "</b></span><br><span class='keytd'> Vị trí:</span>" . mb_convert_case($r['vitri'], MB_CASE_TITLE, "UTF-8") ?></span> </a>       
                    <?php } ?>


                </div>
            </div>



        </div>


        

     
    </div>

    <div id="trangchutuyendung" class="col-md-6">
        <form>
        <div class="panel panel-primary">
            <div class="panel-heading teal"><a href="http://vieclamcantho.com.vn/" style="color:rgba(255,255,255,1)">TRANG CHỦ </a><span class="glyphicon glyphicon-circle-arrow-right"></span><a href='http://vieclamcantho.com.vn/' style="color:rgba(255,255,255,1)">TUYỂN DỤNG</a></div>
            <div class="panel-body" style="background-color: rgb(233, 234, 237);"> 


                <div  class="row">	
                    <div class="col-md-6" id="nganhnghe"> 
                        <div class="form-group">
                            <label  class="label label-default" style="font-size:15px" for="select" > Ngành Nghề </label>
                         <select style="  font-size: 16px;
                                    font-family: -webkit-body;
                                    font-weight: bold;width: 100%"   id="nganh" class='form-control'>
                                <option class="linknganh" value="0">Tất Cả</option>
<?php
$sql = "select * from nganhnghe ORDER  BY tennganh  asc";


$stmt = $db->prepare($sql);
$stmt->execute();
$mangnganh=$stmt->fetchAll();
foreach ($mangnganh as $r) {
    ?>		

                                    <option class="linknganh"  <?php if (isset($_GET['manganh'])) {
                                    if ($_GET['manganh'] == $r['manganh']) echo 'selected';
                                } ?>  value="<?php echo $r['manganh']; ?>"><?php echo $r['tennganh'];
                                ?>

                                    </option>
                                    <?php } ?>
                            </select> 
                        </div>
                    </div>

                    <div class="col-md-6" id="tinhthanhpho"> 
                        <div class="form-group">
                            <label  class="label label-default" style="font-size:15px" for="select"> Tỉnh/Thành Phố</label>
                            <select  style="  font-size: 16px;
                                    font-family: -webkit-body;
                                    font-weight: bold;width: 100%"   id="vung" class='form-control'>
                                <option class="linkvung" value="0">Tất Cả</option>
<?php
$sql = "select * from vung ORDER  BY tenvung  asc";


$stmt = $db->prepare($sql);
$stmt->execute();
$mangvung=$stmt->fetchAll();
foreach ($mangvung as $r) {
    ?>		

                                    <option class="linkvung"  <?php if (isset($_GET['mavung'])) {
                                    if ($_GET['mavung'] == $r['mavung']) echo 'selected';
                                } ?>  value="<?php echo $r['mavung']; ?>"><?php echo $r['tenvung'];
                                ?>

                                    </option>
                                    <?php } ?>
                            </select>                

                        </div>
                    </div>
                    <br>


                </div>

                <div align="center" id="loadtuyensdung">

                    
                    
                    <a id="linktim" href="#"> <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>TÌM KIẾM</button></a>
                   

                </div>
    <div> Trang <span class="badge"  id="tranght"><?= $_GET['page'] ?></span></div>
                <div id="noidung1" class="row">

                    
                    
                    
                    
            <!-- in thong tin vip  !-->        

         <!-- in thong tin chinh !-->
         
<?php
$sql;

$manganh=input(($_GET['manganh']));
$page=input($_GET['page']);
?>
                    
                    


                    <?php 
                    
$sql = "SELECT count(*) as row FROM tuyendung,nganhtuyendung where tuyendung.matuyendung=nganhtuyendung.matuyendung and manganh=:manganh and now()<=ngayhethan";

$row=select($sql,array("manganh"=>$manganh),$db);
$row=$row[0];
// tong so dong co trong CSDL
$totalRow = $row['row'];

// so dong tren moi trang
$limit = 20;

// tinh tong so trang
$total_page = $totalRow==0?1:ceil($totalRow/$limit);

$start = $page==1?0:($page-1)*$limit;

$sql="select tuyendung.matuyendung,tendonvi,luotxem,ngayhethan,logo,vitri from tuyendung,nganhtuyendung  where tuyendung.matuyendung=nganhtuyendung.matuyendung and manganh=:manganh and now()<=ngayhethan ORDER  BY ngaybatdau desc";
$sql .= " LIMIT $start,$limit";
$stmt=select($sql,array("manganh"=>$manganh),$db);




 ?>

 <input class="hidden"  id="pagetemp" value="<?php echo $page.' / '.$total_page;  ?> ">
         <script>
          
        $('#tranght').text($('#pagetemp').val());
        
         </script> 
       <?php 
$j=1;
$sqlnganhtd="select * from nganhtuyendung where  matuyendung='1'";
$sqlvungtd="select * from vungtuyendung where  matuyendung='1'";
$temp="";	
$dk="";
   
		
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
                
                    
               
                        foreach ($mangnganh as $value)
                        {
                            $tennganh[$value['manganh']]=$value['tennganh'];
                        }
                       
                        foreach ($mangvung as $value)
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
 
  padding: 5px; "> <a style="padding: 0px;" href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($r['tendonvi']); ?>-<?php echo $r['matuyendung']; ?>.html">
 <img  src="<?php  echo LOGO.$r['logo'];  ?>" alt="<?= $r['tendonvi']  ?>" class="img-responsive" style=" margin: auto;" width="100px" height="100px" /></a></div> 
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
<div id="daxem" style="text-align:right" class=""><b><i class="fa fa-eye"></i> </b><span style="color:#F33;font-weight:bold"> <?php echo $r['luotxem']; ?></span></div>
</div>

  
  
  </div>

          </div>
           
  </div>
  
  

  
  
  
</blockquote>
    
<?php  ;}   } 
               if($j==1){
				echo "<div class=\"alert alert-info\">Không tìm thấy việc làm nào </div>";  
			   }
			  ?>
             <div align="center">
       
	<nav>
 <ul class="pagination"> 
 <?php 
$link="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$strpage="trang-".$page;
  for($i=1;$i<=$total_page;$i++){
      $linktemp=  str_replace($strpage,'trang-'.$i, $link);
 ?>
    <li class="<?= $page==$i?"active":""  ?>" ><a  href="<?= $page!=$i?$linktemp:""; ?>"><?= $i; ?></a></li>
  
  <?php } ?> 
      

  </ul>
</nav>
    
    
    
    
                 
         
                </div>

            </div>
        </div>
            
                
            </div>
       </div>

    <div class="col-md-3">
        
        <div class="panel panel-primary">

            <div class="panel-heading teal">Liên kết Facebook</div>
<div class="fb-page"    data-href="https://www.facebook.com/vieclamcantho.com.vn"
                 data-width="300" data-hide-cover="false" data-show-facepile="false" 
                 data-show-posts="false"></div>
<?php $u = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
            <div class="alert alert-info" style="  margin-bottom: 0px;">
                <span class="glyphicon glyphicon-thumbs-up"></span>Like trang chủ<div class="fb-like" data-href="http://vieclamcantho.com.vn/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>

            </div>
      </div>
        <hr>
<div class="panel panel-primary">
            <div class="panel-heading teal">Liên kết Google</div>


<div class="g-page" data-layout="portrait"  data-href="https://plus.google.com/+VieclamcanthoVn87"></div>
 <div class="alert alert-default" style="  margin-bottom: 0px;">     
<span class="glyphicon glyphicon-plus"></span>Cộng trang chủ <div class="g-plusone" data-size="standard"  ></div>
</div>
            
  



        </div>




        <div id='vitriquangcao'>  </div>
        <div id="anhthi"   style="position: absolute;z-index: -1">
            <div id="vietcore"> <a  href="http://thietkewebcantho.net"  target="_blank"><img  class="img-responsive"  src='public/quangcao/vietcore1.gif'></a></div>


        </div>

    </div>
 
    </div>

<div class="container">
            
            <div class="panel-body">
           <div class="panel panel-primary">
            <div class="panel-heading teal">Việc làm theo vùng/miền</div>

            <div class="col-md-12 list-group" style="background-color: white">
            <?php
            foreach ($mangvung as $r)
            {
                        $url=URL."/viec-lam-".tieudekhongdau($r['tenvung'])."-".$r['mavung']."-trang-1.html";

            ?>
                <div class="col-md-2" style="height:50px"> 
                   <a href="<?= $url ?>" class="list-group-item"><?= $r['tenvung'] ?></a>      
                    </div>
            <?php  } ?>
            </div>
        </div>
            </div>
            
            
   
                         
            
    </div>

  <script>
               $('.scrollbox').enscroll({
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
    });
            </script>


<?php require 'footer.php' ?>
       