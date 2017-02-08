<?php
require 'header.php';

$trinhdohocvan=array(
    "1"=>"Trên đại học",
    "2"=>"Đại học",
    "3"=>"Cao đẳng",
    "4"=>"Trung cấp",
    "5"=>"Chứng chỉ nghề",
    "6"=>"Không qua đào tạo" 
);
        $loaitotnghiep=array(
    "1"=>"Xuất sắc",
    "2"=>"Giỏi",
    "3"=>"Khá",
    "4"=>"Trung bình khá",
    "5"=>"Trung bình",
    
);
   $sonamkinhnghiem=array(
    "1"=>"Chưa có",
    "2"=>"1 năm",
    "3"=>"2 năm",
    "4"=>"3 năm",
    "5"=>"4 năm",
    "6"=>"5 năm",
    "7"=>"Trên 5 năm",
    
);
          $ngoaingu=array(
    "1"=>"Tốt",
    "2"=>"Khá",
    "3"=>"Trung bình",
    "4"=>"Kém",
    
);
$_SESSION['daxemungvien']=false;
$sql = "select * from nganhnghe ORDER  BY tennganh  asc";

// mang dieu kien
$arraywhere=array('ten','diachi','ngaysinh','sdt','diachi','vitrimongmuon');

$sqlwhere=implode("!='' and " ,$arraywhere)."!=''";

// lay table nganh và tên ngành
$mangnganh=  select($sql,array(),$db);
  foreach ($mangnganh as $value)
                        {
                            $tennganh[$value['manganh']]=$value['tennganh'];
                        }
$sql = "select * from vung ORDER  BY tenvung  asc";
// lay table vung và tên vung
$mangvung= select($sql,array(),$db);
  foreach ($mangvung as $value)
                        {
                            $tenvung[$value['mavung']]=$value['tenvung'];
                        }
// tao sql loc
function taosqlloc($select,$table,$tablechinh,$aloc)
{
 $table["nganhungvien"]['manganh']=$aloc[0];
 $table["vungungvien"]['mavung']=$aloc[1];
  $from=" hosoungvien ";
 foreach ($table as $key=>$value)
 {
     foreach ($value as $key2=>$value2)
     {
         if($value2!=0)
             $from.=", ".$key;
         else
             unset ($table[$key]);
     }
 }
 $jon=" ";
$temp=0;
foreach ( $table as $key=>$value)
{ $temp++;
   
    $jon.=" hosoungvien.email = ". $key.".email ".($temp==count($table)?"":"and ");
   
}

$where=" ";
$temp=0;
foreach ( $table as $key=>$value)
{
     $temp++;
     foreach ($value as $key2=>$value2)
     {
        
    $where.= $key2."=:".$key2.($temp==count($table)?"":" and ");
    $datawhere[$key2]=$value2;
    }
   
    
}

 $sql=$select." from ".$from." where ".$jon." and ".$where;
  return array("sql"=>$sql,"datawhere"=>$datawhere);
 
}
// end tao sql loc

// Nieu cok bien trang
 if(isset($_GET['page']))
$page=  input ($_GET['page']);
 else
$page=1;
 
 // Nieu cok bien loc
 $loc=false;
 if(isset($_GET['loc']))
 {  
     $loc=input($_GET['loc']);
     $table=array("nganhungvien"=>"","vungungvien"=>"");
     $aloc= explode(".",$loc);
     $manganh=$aloc[0];
     $mavung=$aloc[1];
     
     
     $kq=taosqlloc(" select count(*) as row  ",$table,"hosoungvien",$aloc);
     $row=select($kq['sql']." and hienthivoinhatuyendung=1 and hienthi=1 and $sqlwhere ",$kq['datawhere'],$db);
// tong so dong co trong CSDL
$totalRow = $row[0]['row'];
$limit = 20;
$nowpage=3;
$total_page = $totalRow==0?1:ceil($totalRow/$limit);
$start = $page==1?0:($page-1)*$limit;
$kq=taosqlloc(" select *  ",$table,"hosoungvien",$aloc);
$sql=$kq['sql']." and hienthivoinhatuyendung=1 and hienthi=1 and $sqlwhere order by ngaytao desc limit $start,$limit";
$kq= select($sql,$kq['datawhere'],$db);

}
// nguoc lai khong cok bien loc
else
{
     $sql="select count(*) as row from hosoungvien where hienthivoinhatuyendung=1 and hienthi=1 and $sqlwhere";
     $row=select($sql,array(),$db);
     // tong so dong co trong CSDL
$totalRow = $row[0]['row'];
$limit = 20;
$nowpage=3;
$total_page = $totalRow==0?1:ceil($totalRow/$limit);
$start = $page==1?0:($page-1)*$limit;
$sql=  "select * from hosoungvien where hienthivoinhatuyendung=1 and hienthi=1  and $sqlwhere order by ngaytao desc limit $start,$limit";
$kq= select($sql,array(),$db);
}



// lay du lieu nganh va vung cua ung vien
$dk= " ";
$temp=0;
foreach ($kq as $value)
{
    $temp++;
    $dk.= " email = '".$value['email']."'".($temp==count($kq)?"":" or "); 
    
}
$sql="select * from nganhungvien where ".$dk;
$temp=select($sql,array(),$db);

foreach ($temp as $key=>$value)
{
    $nganhungvien[$value['email']][]=$tennganh[$value['manganh']];
}
$sql="select * from vungungvien where ".$dk;
$temp=select($sql,array(),$db);
foreach ($temp as $key=>$value)
{
    $vungungvien[$value['email']][]=$tenvung[$value['mavung']];
}
// end qua trinh lay du lieu
?>
<?php 
// xac thuc
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['nowpage']="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<script>

  $('#menuhosoungvien').addClass('active');

</script>

<div class="container">
  <div class="row">
    
    
<div class="col-md-9">
    
    <div class="breadcrumb1 clearfix">
              
        <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        <div class="itemtip">
            <a href="<?= URL ?>ho-so-ung-vien.html" > Hồ sơ ứng viên </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        <div class="itemtip"><a> Trang <?= $page ?> </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
            

            </div>
    <div class="boxchitiet" style=" background-color: rgba(233, 234, 237, 0.43);">
        <div  class="row">	
                    <div class="col-md-6" id="nganhnghe"> 
                        <div class="form-group">
                            <label  class="label label-default" style="font-size:15px" for="select" > Ngành Nghề </label>
                         <select  style="  font-size: 16px;
                                    font-family: -webkit-body;
                                    font-weight: bold;width: 100%"   id="nganhungvien" class='nganhnghe form-control'>
                                <option class="linknganh" value="0">Tất Cả</option>
<?php

foreach ($mangnganh as $r) {
    ?>		

                                    <option class="linknganh"  <?php if (isset($manganh)) {
                                    if ($manganh == $r['manganh']) echo 'selected';
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
                                    font-weight: bold;width: 100%"   id="vungungvien" class='vung form-control'>
                                <option class="linkvung" value="0">Tất Cả</option>
<?php
foreach ($mangvung as $r) {
    ?>		

                                    <option class="linkvung"  <?php if (isset($mavung)) {
                                    if ($mavung == $r['mavung']) echo 'selected';
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

                    
                    
                    <a id="linktimungvien" href="#"> <button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>TÌM KIẾM</button></a>
                   

                </div>
    </div>
   <?php if(checklogin(2)) { 
       $email=$datauser['email'];
       $sql="select count(*) as row from hosoungvien where email='$email' and $sqlwhere";
       $r=select($sql,array(),$db);
if($r[0]['row']==0){
       ?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="glyphicon glyphicon-alert"></i> Hồ sơ của bạn sẽ không hiển thị nếu chưa <b class="batbuoc">cập nhật đủ thông tin cần thiết</b></div>
   <?php }}?>
    <?php  

    foreach ($kq as $value){?>
    <div class="boxchitiet boxhosoungvien clearfix">
       
        <div class="hinhungvien " style="width: 10%;">
            <a title="<?= $value['ten']?>" href="<?= URL ?>ho-so-chi-tiet-<?= $value['email']?>.html"> 
        <?php if($value['avatar']==''){ ?>
            <img class="img-responsive img-thumbnail" src="<?= URL ?>public/images/avatardefault.png">
    <?php }else{?>
              <img class="img-responsive img-thumbnail" src="<?= URL."upload/avatar/".$value['avatar'] ?>">
    <?php }?>
            </a>
        </div>
        
        <div class="thongtinungvien borderleftungvien" style="border-left-width: 3px;   width: 90%;">
            <div>
                <a title="<?= $value['ten']?>" href="<?= URL ?>ho-so-chi-tiet-<?= $value['email']?>.html"> 
                    <h3 class="tenungvien" style="color:<?php
                 if(kiemtranullcheck($value['gioitinh']))
                 {
                echo $value['gioitinh']==1?"#1BA9D6":"#E135C3";
                 }else echo "#8A8686";
                         ?>">
            <?= output($value['ten']) ?></h3></a>
                 <i class="fa fa-transgender"></i><?php
                 if(kiemtranullcheck($value['gioitinh']))
                 {
                echo $value['gioitinh']==1?"Nam":"Nữ";
                 }else echo "Đang cập nhật";
                 ?> | <i class="fa fa-child"></i><?=
                         kiemtranullcheck($value['ngaysinh'])==TRUE?date_format( date_create($value['ngaysinh']),'d/m/Y'):"Đang cập nhật";
                         ?>
            </div>  
           
            <div class="boxthongtinungvien">
                <i></i>
                <div>
                    <b class=""><span class="glyphicon glyphicon-user"></span>Vị trí mong muốn: </b>
                    <span id="vitri"> <?= kiemtranull($value['vitrimongmuon']) ?> </span>
                </div>
            <div>
                <b class=""><span class="glyphicon glyphicon-briefcase"></span>Chuyên môn: </b> 
                <span class="linhvuc"  style="color: #575753;"><?php if(isset($nganhungvien[$value['email']]))
                {  $i=0;
                    foreach($nganhungvien[$value['email']] as $key=>$temp)
                                           {
                    $i++;
                    if($i>4)
                    {
                        echo " v.v...";
                          break;
                    }
        echo $temp.(isset($nganhungvien[$value['email']][$key+1])?" , ":"");
                                                }
                }
                                                else
                                                    echo "Đang cập nhật";
            ?></span>
            </div>
             <div>
                <b ><span class="glyphicon glyphicon-map-marker"></span>Khu vực: </b> 
                                                
                                         <span class="noilam" style="color: #037bcf">
                                             <?php if(isset($vungungvien[$value['email']]))
                                             {
                                                 $i=0;
                                                foreach($vungungvien[$value['email']] as $key=>$temp)
                                           {
                                                    $i++;
                    if($i>4)
                    {
                        echo " v.v...";
                          break;
                    }
        echo $temp.(isset($vungungvien[$value['email']][$key+1])?" - ":"");;
                                             }}
                                                else
                                                    echo "Đang cập nhật";
            ?></span>
            </div>
                <ul class="themthongtin">
    <?php  if($value['trinhdohocvan']!=0) {?>  <li><span class="fa fa-graduation-cap"></span><?= $trinhdohocvan[$value['trinhdohocvan']] ?></li><?php } ?>
    <?php  if($value['loaitotnghiep']!=0) {?>  <li><span class="fa fa-trophy"></span><?= $loaitotnghiep[$value['loaitotnghiep']] ?></li><?php } ?>
     <?php if($value['sonamkinhnghiem']!=0) {?>                <li><span class="fa fa-calendar-check-o"></span><small>Kinh nghiệm:</small> <?= $sonamkinhnghiem[$value['sonamkinhnghiem']] ?></li><?php } ?>
     <?php if(kiemtranullcheck($value['mucluongmongmuon'])) {?>                <li><span class="glyphicon glyphicon-usd"></span><small>Mong muốn: </small><?= $value['mucluongmongmuon'] ?></li><?php } ?>
                </ul>
                
                <div style="    background-color: #EAEAEA;
    color: #7E1F72;" class="badge pull-right">
                    <span class="glyphicon glyphicon-calendar"></span>Cập nhật: <?= date_format(date_create($value['ngaytao']),'d/m/Y') ?> | 
                    <span class="fa fa-eye"></span> <?= $value['daxem']; ?></div>
            </div>
            
        </div>
       
    </div>
  
    <?php } ?>
    
    <style>
                    .themthongtin 
                    {
                        padding: 0px;
                    }
                    .themthongtin li
                    {
                      float: left;
    margin: 2px;
    padding: 5px;
    list-style: none;
    background-color: white;
    box-shadow: 2px 1px 2px -1px;
    color: #CA0B99;
    border-radius: 20px 20px 20px 0px;
                    }
                     .boxhosoungvien
                     {
                         padding-left: 15px;
                     }
                    @media screen and (max-width: 800px){
                        .themthongtin 
                        {
                            display: none;
                        }
                        .boxhosoungvien
                        {
                            padding-left: 2px;
                        }
                    }
                </style>
    <div class="text-center clearfix boxphantrang" >
        <?php 
        if($total_page==1)
    echo null;
else
      if($total_page==$page && $page>1)
      {
           $truoc=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($page-1).".html";
           echo "<a class='phantrangitem phantrang' href=\"$truoc\">Trang trước</a>";
      }
        else
            if($page==1)
            {
                 $sau=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($page+1).".html";
                echo "<a class='phantrangitem phantrang' href=\"$sau\">Tiếp theo</a>";
            }
            else
                if($page>$total_page)
                   echo "error";
                else
        {
                   
            $truoc=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($page-1).".html";
            $sau=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($page+1).".html";
            echo "<a class='phantrangitem' href=\"$truoc\">Trước </a>";
            
            for($i=$nowpage;$i>=1;$i--)
            {
              
                $temp=$page-$i;
                  $link=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($temp).".html";
                if($temp>=1)
                    echo "<a class='phantrangitem phantrangitemstyle' href=\"$link\">$temp</a>";
            }
            echo "<a class='phantrangitem phantrangactive phantrangitemstyle'>$page</a>";
             for($i=1;$i<=$nowpage;$i++)
            {
                $temp=$page+$i;
                 $link=URL."ho-so-ung-vien-".($loc!=false?$loc."-":"")."trang-".($temp).".html";
                if($temp<=$total_page)
                  echo "<a class='phantrangitem ' href=\"$link\"><span>$temp</span></a>";
            }
           
            echo "<a class='phantrangitem' href=\"$sau\">Tiếp</a>";
            
            
        }
        
        
        ?>
      <?php
          if(empty($kq))
        {
      ?>  
        Không có hồ sơ phù hợp!
        <?php } ?>
    </div>
</div>
    <div class="col-md-3">
        
     <?php if(checklogin(2)){ 
        ?>
      <button title="<?= $datauser['email'] ?>"  class=" btn btn-warning btn-md btn-showquanly btn-mobiquanly " ><i class="glyphicon glyphicon-user"></i></button>
   
    <script>
$(document).ready(function(){

  $('.btn-mobiquanly').click(function(){
      $('.boxdangnhap').toggleClass('quanlymobi');
  })
});
</script>
      
      
      
      
 <?php }else{?>
      <button title="Đăng nhập" class="btn btn-warning btn-md btn-quanly btn-mobiquanly"><i class="glyphicon glyphicon-log-in"></i></button>
      <script>
      $('.btn-quanly').click(function()
{
    scrollTo('quanlyungvien',0);
    });
      </script>  
   <?php } ?>
   
        <?php if(checklogin(2))
  { 
            if($datauser['type']==2)
            {
            ?>
       <div class="boxdangnhap">
           <div class="ribbon-wrapper h2 ribbon-red" style="    margin-bottom: 40px;">
				<div class="ribbon-front">
                                    <h2>Xin chào <br><small><b>ỨNG VIÊN</b></small></h2>
                                        
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
          
               
           <h3 class="blue xinchao" > <?= $datauser['email'] ?></h3>
                <a href="cap-nhat-thong-tin-ho-so.html" class="quanly"><i class="fa fa-info"></i> Cập nhật thông tin hồ sơ</a>
                               <a href="ho-so-da-nop.html" class="quanly"><i class="glyphicon glyphicon-list"></i> Danh sách công ty bạn đã ứng tuyển</a>

                    <a href="<?= URL."logout.php" ?>" class="quanly"><i class="glyphicon glyphicon-log-out"></i> <button name="thoat" class="btn btn-default">Thoát</button></a>
                
              
            </div>  
        </div>
            <?php }}else{?>
         
      <div id="quanlyungvien" style="margin-top: 10px" class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Ứng viên tạo hồ sơ</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
            <form id="frmdangnhapungvien" class="formlogin">
				<ul>
					<li>
                                            <a href="#" class=" icon user"></a>  <input required="" tabindex="1" id="taikhoanungvien" type="email" class="text " value="Email đăng nhập" 
                                                                                        onfocus="if(this.value=='Email đăng nhập'){this.value = ''};" onblur="if (this.value == '') {this.value = 'Email đăng nhập';}" >
					</li>
					 <li>
                                             <a href="#"  class=" icon lock"></a><input required="" tabindex="2" id="matkhauungvien" type="password" value="Password"
                                                                                        onfocus="if(this.value=='Password'){this.value = ''};" onblur="if (this.value == '') {this.value = 'Password';}">
					</li>
				</ul>

			
			<div class="submit">
                            <input class="btnlogin" type="submit"  id="btndangnhapungvien" value="Đăng nhập" >
                              <a  href="ung-vien-dang-ky-ho-so.html">
                                    <button type="button" class="btnlogin" style="background-color: #39bb21"  id="btndangnhap">Đăng ký</button>
                              </a>
                            
			</div>
                <hr>
                <div class="btn-group">
                         <a class="btn btn-danger disabled" style="height: 40px;opacity: 0.8;"><i class="fa fa-google-plus" style="width:16px; height:20px"></i></a>
                         <a class="btn btn-danger logingoogle" onclick="_loginempoyeegoogle()"  style="width:14em;height: 40px;"> Đăng nhập với Google</a>
                </div>
                   <img id="loaddangnhap" src="public/images/ajax_loading.gif">

 <div align="center" id='ketqua'>

        </div>
                </form>
            </div>
      <div id="quenmatkhau" class="boxdangky">
            <h3 class="squenmatkhau">Bạn quên mật khẩu</h3>
          Nhấn vào đây  <a href="#"  id="quenmatkhau"><i class="fa fa-exclamation-circle"></i><b>Quên mật khẩu</b></a>
<div class="alert alert-danger boxtimlaimatkhau">
              <label class="control-label">Tìm lại mật khẩu</label>
              <input onkeypress='validate(event)' class="form-control"  id="timlaimatkhauemail" type="text" placeholder="Nhập email đăng nhập">
              <small>Nhớ tắt gõ dấu tiếng việt!</small>
              <i class="loadtimlaimatkhau fa fa-circle-o-notch fa-spin thanhcong"></i>
              <button class="btn btn-warning btntimlaimatkhauungvien">Gửi</button>
          </div>
		
        </div>
            

        <?php  } ?>
				

	
  			
      
    </div>
  </div>
</div>
<script src="public/js/timlaimatkhau.js?ver=<?= VER ?>"></script>
<script src="public/js/locungvien.js?ver=<?= VER ?>"></script>
<script src="public/js/dangnhapungvien.js?ver=<?= VER ?>"></script>
<?php
if(isset($_GET['quenmatkhau']))
{  
?>
    <script>   
   
            scrollTo('quenmatkhau',0);
  
      </script>
<?php } ?>
    <?php require 'footer.php';?>