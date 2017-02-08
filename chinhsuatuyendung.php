<?php 
require 'header.php'; 
if(checklogin(1))
{ 
    $datauser = getvaluecookie("authentic");
 ?>

 <link href="public/css/datepicker.css?ver=<?= VER ?>" rel="stylesheet" />
 <link rel="stylesheet" href="public/css/bootstrap-tagsinput.css"/>
<script src="public/js/bootstrap-tagsinput.js"></script>
<div class="container">
    <div class="row">

     
            <?php

if(isset($_POST['token']) && isset($_POST['product']) && isset($_SESSION['tokenchinhsuatuyendung']))
{
    unset($_SESSION['tokenchinhsuatuyendung']);
   $token=  createhash("sha256",$datauser['email'],HASH_KEY);
   $product=createhash("sha256",$_POST['matuyendung'],HASH_KEY);
   if($_POST['product']==$product && $_POST['token']==$token)
    {
 if(isset($_POST['vitri']) ){
 if(isset($_POST['nganh'][0]) && isset($_POST['vung']) && $_POST['ngayhethan']!="" && $_POST['tendonvi']!="" && $_POST['sdt']!="")
{
  
  
  $matuyendung=input($_POST['matuyendung']);
  

        $data['vitri'] = viethoakytudau(input( str_replace(","," , ",$_POST["vitri"])));
        $data['tendonvi']= tieude(input($_POST['tendonvi']));
        $data['sdt']= input($_POST['sdt']);;
        $data['diachi']= input($_POST['diachi']);;
        $data['email']=input($_POST['email']);;
        
	     if(trinhduyet()=="Firefox"){
         list($ngay,$thang,$nam) = explode("/",input($_POST['ngayhethan']));
       $ngayhethan=date_create($nam.'-'.$thang.'-'.$ngay);  
       $ngayhethan=date_format( $ngayhethan, 'Y/m/d');
    
       $data['ngayhethan']=$ngayhethan;
        }
        else
        {
             $ngayhethan= date_create($_POST['ngayhethan']);	
             $data['ngayhethan']=date_format($ngayhethan, 'Y/m/d');
        }
        
        
        $data['ghichu']= xulymieuta($_POST['ghichu']);
        $data['toado']=  input($_POST['toado']);
        $data['bk']=  input($_POST['bk']);
        $data['ngaybatdau']=  ngayhientai();
        update('tuyendung',$data,"matuyendung=:matuyendung and taikhoan=:taikhoan",array('matuyendung'=>$matuyendung,"taikhoan"=>$datauser['email']),$db);
  
        delete('nganhtuyendung','matuyendung=:matuyendung', array('matuyendung'=>$matuyendung),$db,20);
        
 
    
      delete('vungtuyendung','matuyendung=:matuyendung', array('matuyendung'=>$matuyendung),$db,20);
        
         $datanganh['matuyendung']=$matuyendung;
  foreach($_POST['nganh'] as $key => $value){
  
     $datanganh['manganh']=kiemtramanganh($value);  
     insert("nganhtuyendung",$datanganh,$db);
 
}
    $datavung['matuyendung']=$matuyendung;
    foreach($_POST['vung'] as $key => $value){
  
     $datavung['mavung']= kiemtramanganh($value);  
     insert("vungtuyendung",$datavung,$db); 
 
	}
  
?>
<div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
        
          <h4 class="modal-title">THÔNG BÁO</h4>
        </div>
        <div class="modal-body">
            <p> <b><i class="glyphicon glyphicon-ok thanhcong"></i>Tin tuyển dụng <?= $data['tendonvi'] ?></b> đã được cập nhật thành công </p>
          <p> <a href="<?= URL."quan-ly-bai-viet.html?token=".$_POST['token'] ?>" >Trở về trang quản lý bài viết <i class="fa fa-reply-all"></i></a></p>
        </div>
        
      </div>
      
    </div>
  </div>
        
          <?php }// dieu kien dung

 else
 {
   
 
?>
      <div class="alert alert-danger">Cập nhật thất bại(Bạn chắc rằng mình nhận được thông báo 'ok'
      từ tất cả các mục) </div>
      <?php if($_POST['ghichi']="") echo "Bạn chưa điền thông tin tuyển dụng";?>
      <?php  
}

 }// ton tai vi tri
    }// token bang nhau
} 
   ?>


<?php    
if(isset($_GET['matuyendung']) && isset($_GET['product']) && isset($_GET['token']))
    {
    $token=  createhash("sha256",$datauser['email'],HASH_KEY);
    $product=createhash("sha256",$_GET['matuyendung'],HASH_KEY);
    if($_GET['product']==$product && $_GET['token']==$token)
    {
                  $_SESSION['tokenchinhsuatuyendung']=$token;
		  $matuyendung=input($_GET['matuyendung']);
		  $taikhoan=$datauser['email'];
	 $sql="select *,now() as now from tuyendung where matuyendung=:matuyendung and taikhoan=:taikhoan";
      $kq=select($sql,array('taikhoan'=>$taikhoan,'matuyendung'=>$matuyendung),$db);
                        
			if($thongtinchitiet=$kq[0])
			{
		
    $sql="SELECT manganh from nganhtuyendung  where matuyendung='$matuyendung'";
  $i=0;
      $stmt = $db->prepare($sql);
      $stmt->execute();
      while($r=$stmt->fetch() )
      {

$songanh[$i]=$r['manganh'];
$i++;
	  }
	   $sql="SELECT mavung from vungtuyendung  where matuyendung='$matuyendung'";
  $i=0;
      $stmt = $db->prepare($sql);
      $stmt->execute();
      while($r=$stmt->fetch() )
      {

$sovung[$i]=$r['mavung'];
$i++;
	  }
          
          
                        }

?>
           <div class="col-md-9">
               
               <div class="breadcrumb1 clearfix">
              
      <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
       
        <div class="itemtip">
            <a href="<?= URL."quan-ly-bai-viet.html?token=".$token ?>">Quản lý bài viết </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
                   <div class="itemtip">
            <a>Chỉnh sửa </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
                   <div class="itemtip"><a><?= output($thongtinchitiet['tendonvi']) ?> </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>

            </div>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal" id="frmtuyendung"  enctype="multipart/form-data">
    <input class="hidden" name="token" value='<?= $token ?>'>
     <input class="hidden" name="product" value="<?= $product ?>">
          <input class="hidden"  value="<?php echo $matuyendung; ?>" name="matuyendung">
         <input name='stt' value="<?php echo $thongtinchitiet['stt']; ?>" class="hidden" >
          <div class="row boxchitiet">
              <div class="tieudetuyendung">THÔNG TIN TUYỂN DỤNG</div>  
               <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Tên đơn vị: </label> </label><input name="ktdv" class="hidden" value="true"  id="ktdv" >
               <div class="col-sm-8">       <input id="ten" value='<?php echo output($thongtinchitiet['tendonvi']) ?>' name="tendonvi" type="text"   class="form-control" required>
           </div>
                       <div class="col-sm-2"><span id="ktten" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
           </div>
              
               <div class="form-group">
             <label  class=" col-sm-2 control-label" for="vitri" >Vị trí tuyển dụng:  </label><input name="kttd" class="hidden" value="true"  id="kttd" >
            <div class="col-sm-8">
                <input required id="tieude" name="vitri" type="text" value='<?php echo output($thongtinchitiet['vitri']); ?>'  class="form-control vitrituyendung" placeholder="Nhấn Enter để hoàn tất" >
            </div>
           <div class="col-sm-2"><span style="color:rgba(0,204,102,1);top:10px;" id="kttieude" class="glyphicon glyphicon-ok  " > </span> </div> 
           </div>
                  <script>
                $('.vitrituyendung').tagsinput({
 confirmKeys: [13, 44],

});
                </script>
        
         
           
           
          <div class="form-group">
            <label  class="col-sm-2  control-label" style="font-size:15px" for="select" >Chọn: </label>
            <div class="col-sm-8"  style="position: relative">
                <div class="dropdown-hienthi " id="hiennganh" >
                    <input value="1" class="hidden" >
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn ngành nghề  <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh khu vực" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
                                                                        
                                                                                                                  
                                                                
                                                           
           
             <?php $sql="select * from nganhnghe ORDER  BY tennganh  asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
		
			while($r=$stmt->fetch()){
                            $check=FALSE;
                            foreach ($songanh as $value)
                            {
                                if($value==$r['manganh']){
                                     $check=true;
                            ?>
         <div class="list-item txt-color-363636 ">

<input tabindex="1" type="checkbox"  checked   name="nganh[]" class="checknganh" id="" value="<?php  echo $r['manganh']; ?>" style="opacity:0">
<div class="icheckbox checked" style="position: relative;">
  </div>
<b  class="font14">  <?php  echo $r['tennganh']; ?></b>
   </div>                        
                            <?php }}
                            if(!$check){?>
     
      <div class="list-item txt-color-363636 ">

          <input tabindex="1" type="checkbox" name="nganh[]" class="checknganh" id="" value="<?php  echo $r['manganh']; ?>" style="opacity:0">
<div class="icheckbox " style="position: relative;">
  </div>
<b class="font14">  <?php  echo $r['tennganh']; ?></b>
   </div>    
     <?php }}?>


             
                
                 
                  
              
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
      <div class="col-sm-2"><span  class="ktnganh glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>

            </div>
            
           
           
            
                <div class="form-group">
            <label  class="col-sm-2  control-label" style="font-size:15px" for="select" >Chọn: </label>
            <div class="col-sm-8"  style="position: relative">
                <div class="dropdown-hienthi " id="hiennganh" >
                    <input value="1" class="hidden" >
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn khu vực <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh khu vực" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
                                                                        
                                                                                                                  
                                                                
                                                           
           
             <?php $sql="select * from vung ORDER  BY tenvung  asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
		
			while($r=$stmt->fetch()){
                             $check=false;
                            foreach ($sovung as $value)
                            {
                                if($value==$r['mavung']){
                                    $check=true;
                            ?>
         <div class="list-item txt-color-363636 ">

             <input tabindex="1" type="checkbox"  checked  class="checkvung"  name="vung[]"  id="" value="<?php  echo $r['mavung']; ?>" style="opacity:0">
<div class="icheckbox checked" style="position: relative;">
  </div>
<b for=" <?php  echo $r['id_vung']; ?>" class="font14">  <?php  echo $r['tenvung']; ?></b>
   </div>                        
                            <?php }}
                            if(!$check){
                                ?>
     
      <div class="list-item txt-color-363636 ">

          <input tabindex="1" type="checkbox"  class="checkvung" name="vung[]"  id="" value="<?php  echo $r['mavung']; ?>" style="opacity:0">
<div class="icheckbox " style="position: relative;">
  </div>
<b for=" <?php  echo $r['id_vung']; ?>" class="font14">  <?php  echo $r['tenvung']; ?></b>
   </div>    
     <?php  }}?>


             
                
                 
                  
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
      <div class="col-sm-2"><span  class="ktvung glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>

            </div>
           
           
         
         
         
         
         
           
            
            <div class="form-group">
             <label  class=" col-sm-2 control-label" for="tieude" > Ngày hết hạn: </label>
      
            <div class="col-sm-8">
            
                   <?php if(trinhduyet()=="Firefox"){  ?>
     
                <input style="width: 100%" class=" datepicker" value="<?php echo date_format(date_create($thongtinchitiet['ngayhethan']),'d/m/Y');?>" name="ngayhethan"  id="ngayhethan"  size="16" type="text"  readonly="" required>
            <?php } else {  ?>
                        <input required id="ngayhethan" value="<?php echo date_format(date_create($thongtinchitiet['ngayhethan']),'Y-m-d');?>" name="ngayhethan" type="date" placeholder="ngày-tháng-năm"  class="form-control">

            <?php  }?>
          
            
            
            </div>
       <?php
		    if($thongtinchitiet['ngayhethan'] >= $thongtinchitiet['now'])
	  {
	
	?>
    </label><input name="kttg" class="hidden" class="hidden" value="true"  id="kttg" >
         <div class="col-sm-2"><span id="ktngay" class="glyphicon glyphicon-ok  " style="top:10px;top: 10px; color: rgb(0, 204, 102);"></span> </div>
    <?php }
	  else
	  {
	 ?>
     </label><input name="kttg" class="hidden"  value="false"  id="kttg" >
          <div class="col-sm-2"><span id="ktngay" class="glyphicon glyphicon-remove  " style="top:10px;">Đã hết hạn(Hãy cập nhật lại ngày)</span> </div>
	  <?php 
	  }
		   
		    ?>
           </div>
           
         <div class="form-group">
            <label  class="col-sm-2 control-label" style="font-size:15px" for="ghichu" >Yêu cầu tuyển dụng: </label><input 
 name="ktgc" id="ktgc" class="hidden" value="true">         <div class="col-sm-8"> 
         <textarea id="ghichu"   name="ghichu"  rows="10"  class="form-control"><?php 

    $content = output($thongtinchitiet['ghichu']);

 echo   $content; ?></textarea>
           </div>
            <div class="col-sm-2"><span id="ktghichu" class="glyphicon   " style="top:10px;"></span> </div> 
           </div>
           
     
      
        </div>
          <div class="row boxchitiet">
              <div class="tieudetuyendung">THÔNG TIN TUYỂN DỤNG</div> 
            <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Số điện thoại: </label> </label><input name="ktsdt" class="hidden" value="true"  id="ktsdt" >
             <div class="col-sm-8">
                 <input required id="sdt" name="sdt" type="text"  value='<?php echo output($thongtinchitiet['sdt']); ?>'  class="form-control">
         </div>
                     <div class="col-sm-2"><span id="ktsodienthoai" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
         </div>
              <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Địa chỉ: </label> </label><input name="ktdc" class="hidden" value="true"  id="ktdc" >
            <div class="col-sm-8"> 
                <input required id="diachi" name="diachi" type="text"  value='<?php echo output($thongtinchitiet['diachi']); ?>'  class="form-control">
</div>
 <div class="col-sm-2"><span id="ktdiachi" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
      </div>
             
          
       
           
         <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="email" > Email: </label>
            <div class="col-sm-8">   <input name="email" type="email" value='<?php echo output($thongtinchitiet['email']); ?>'   class="form-control">
             </div>
          <div class="col-sm-2"><span  class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
         </div>
            <div class="form-group">
            <label  class=" col-sm-2 control-label" for="tieude" >Logo của bạn: </label>
            <div class="col-sm-8" >
                <img style="max-height: 100px" class="img-responsive"  src="<?php echo LOGO.$thongtinchitiet['logo']; ?>">
             <small>Để thay đổi logo, vui lòng vào quản lý tài khoản</small>
            </div>
           
            <div class="col-sm-2"><span id="ktimg" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
      
          </div>
          </div>
         <div class="row boxchitiet">
                <?php 
              $toado=$thongtinchitiet['toado'];
              if(!empty($toado))
              {
              $toado=str_replace('(','',$toado);
              $toado=str_replace(')','',$toado);
              $array=  explode(',',  $toado);
              $tenmap= xulyxh(output($thongtinchitiet['tendonvi']));
              }
 else {
     $array[0]="10.03120174178347";
     $array[1]="105.76884283068853";
     $tenmap="Kéo để xác định vị trí";
   }
              ?>
                          <input id="toadox" value="<?= $array[0] ?>" class="hidden">
                           <input id="toadoy" value="<?= $array[1] ?>" class="hidden">
                            <input id="tieudemap" value='<?= $tenmap ?>' class="hidden">
   <div class="tieudetuyendung">VỊ TRÍ CÔNG TY VÀ GIAO DIỆN</div>  
        <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="email" > Vị trí: </label>
            <div class="col-sm-8">
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                     <div id="map"></div>
                     <div class="col-md-9">
                         <input value="<?= $thongtinchitiet['toado'] ?>"   name="toado" type="text" readonly="" class="form-control valvitri " />
                     </div> 
                     <div class="col-md-3">
                       <button type="button" class="btn btn-default huyvitri">Bỏ vị trí</button>  
                     </div>
                       
            </div>
                        <div class="col-sm-2" style="color:rgba(51,204,51,1)"><span id="ktsodienthoai" class="glyphicon glyphicon-ok  " style="top:10px;"></span> </div>

              
          </div>
       
          
          <div class="form-group">
          <div class="col-md-2">
              <b> Chọn giao diện</b>
              <select name="bk" class="form-control chongiaodien">
                 <?php
                 for($i=0;$i<16;$i++)
                 {
                     if($i!=13){
                     if($i==$thongtinchitiet['bk'])
                     {
                 ?>
                   <option selected value="<?= $i ?>"><?= $i ?></option>
                     <?php
                     
                     }
                     else{
                     ?>
                   <option  value="<?= $i ?>"><?= $i ?></option>   
                 <?php }}} ?>
                 
              </select>
   
                  </div>
          <div class="col-md-8" style="max-height: 100px">
              <div class="row boxchitiet demobox"
                    <?php if($thongtinchitiet['bk']!=0) {?>
                    style="background-image: url('public/css/bk<?= $thongtinchitiet['bk'] ?>.png');"
                   <?php } ?>>
                                <div class="demoboxlogo" >
                                    <img style="max-height: 80px" class="img-responsive img-thumbnail demologo"  src="<?= LOGO.$thongtinchitiet['logo'] ?>" />
                                </div> 
                                <div  class="demopaneltieude">
                                    <p style="font-size: 14px !important"  align="center" class="demotieudechitiet" ><?= $thongtinchitiet['tendonvi'] ?></p>                                
                                </div>
            </div>

              </div>
                                        <div class="col-sm-2" style="color:rgba(51,204,51,1)"><span id="ktsodienthoai" class="glyphicon glyphicon-ok  " style="top:10px;"></span> </div>


          
        </div>
       
    </div>
         <div class="boxchitiet">
                    <div  align="center">
                        <button class="btn btn-warning btn-lg" type="submit">CẬP NHẬT</button>
                       <a href="quan-ly-bai-viet.html?token=<?=$token?>">  <button class="btn btn-default btn-lg" type="button">HỦY</button></a>
                    </div>

         </div>
      </form>
        </div>
        <div class="col-md-3">
            <button title="<?= $datauser['email'] ?>"  class=" btn btn-warning btn-md btn-showquanly btn-mobiquanly" ><i class="glyphicon glyphicon-user"></i></button>
   
     <script>
$(document).ready(function(){

  $('.btn-mobiquanly').click(function(){
      $('.boxdangnhap').toggleClass('quanlymobi');
  })
});
</script>
            <?php     $token=createhash("sha256",$datauser['email'],HASH_KEY); ?>
      <div class="boxdangnhap">
           <div class="ribbon-wrapper h2 ribbon-red" style="    margin-bottom: 40px;">
				<div class="ribbon-front">
                                    <h2>Xin chào <br><small><b>Nhà tuyển dụng</b></small></h2>
                                   
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
          
               
           <h3 class="blue xinchao" > <?= $datauser['email'] ?></h3>
                <a href="quan-ly-bai-viet.html?token=<?=$token?>" class="quanly"><i class="glyphicon glyphicon-list-alt"></i> Quản lý bài viết</a>
                   <a href="quan-ly-thong-tin.html?token=<?=$token?>" class="quanly"><i class="fa fa-info"></i> Quản lý thông tin</a>

                 
                   <a href="<?= URL.'logout.php' ?>" class="quanly"><i class="glyphicon glyphicon-log-out"></i> <button name="thoat" class="btn btn-default">Thoát</button></a>              
            </div>  
        </div>
   
<script src="public/js/bootstrap-datepicker.js?ver=<?= VER ?>"></script>
<script src="public/js/googlemap.js?ver=<?= VER ?>"></script>
<script language="javascript" src="public/tienich/ckeditor.js?ver=<?= VER ?>" type="text/javascript"></script>
<script type="text/javascript">CKEDITOR.replace('ghichu');</script>
<script language="javascript" src="public/js/quanlytuyendung.js?ver=<?= VER ?>" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
         async defer>
     
    </script>
<script type="text/javascript">


   $(function () {
  $('.datepicker').datepicker({ format: "dd/mm/yyyy",language:"vi"}).on('changeDate', function (ev) {
    $(this).datepicker('hide');
      
 
		
                    
			 
                           
                   $('#ktngay').text(" ");       	
		$('#ktngay').removeClass('glyphicon-remove');
		$('#ktngay').addClass('glyphicon glyphicon-ok ');
		$('#ktngay').css('color','rgba(0,204,102,1)');		
                $('#kttg').prop('value','true'); 
			    
			
			
        
  });
});



</script>
    <?php 
    
                    } // ton tai Get
    
    
                    }// so sanh bang
         
                    ?>
     </div>
    
</div>
 
<?php } require 'footer.php'; ?>