<?php

require 'header.php';
if(checklogin(2))
{


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
    "1"=>"Chưa có kinh nghiệm",
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
  $token= createhash("sha256",$datauser['email'],HASH_KEY);  
                  
          
?>
<link href="public/css/datepicker.css" rel="stylesheet" />
<link href="public/css/skins/all.css?v=1.0.2" rel="stylesheet">
<script src="public/js/icheck.min.js?ver=<?= VER ?>"></script>
<!--<script src="public/js/inputhtml5.js"></script>-->


<?php 
$sql="select * from hosoungvien where email=:email";
$kq=select($sql,array('email'=>$datauser['email']),$db);
if(!empty($kq))
{
$thongtin=$kq[0];

$sql="select * from hinhanhungvien where email=:email and loai=:loai";
$anhcanhan=select($sql,array('email'=>$datauser['email'],'loai'=>1),$db);

$sql="select * from hinhanhungvien where email=:email and loai=:loai";
$anhbangcap=select($sql,array('email'=>$datauser['email'],'loai'=>2),$db);

$sql="select * from nganhungvien where email=:email";
$nganhungvien=select($sql,array('email'=>$datauser['email']),$db);
$sql="select * from vungungvien where email=:email";
$vungungvien=select($sql,array('email'=>$datauser['email']),$db);
?>
<div class="container">
    <div class="row">
        
       
        <div class="col-md-12">
            <div class="breadcrumb1 clearfix">
              
                <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        
                <div class="itemtip">
            <a > Cập nhật thông tin hồ sơ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        <div class="itemtip"><a><?= $datauser['email'] ?> </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>

            </div>
         <div class="boxchitiet">
               <div class="tieudetuyendung">Yêu cầu khi cập nhật hồ sơ :</div> 
               
               <ul style="font-size: 16px">
                 
                   <li>Điền đầy đủ những thông tin cần thiết, để nhà tuyển dụng dễ dàng chọn bạn</li>
                   <li>Nhập tiếng việt có dấu, đảm báo những thông tin bên dưới là chính xác</li>
                   <li class="batbuoc">* là bất buộc nhập, không bỏ trống</li>
                 
        

               </ul>
         </div>
        </div>
        <form action="libs/updatethongtinungvien.php" method="post" class="form-horizontal" id="frmcapnhatthongtinungvien">
           <input class="hidden" name="token" value='<?= $token ?>'>
            <div class="col-md-6">

                <div class="boxchitiet">
                     <div class="boxline row">
                         <div class="line"></div> 
                    </div>
               <div class="tieudetuyendung tieudechinhsua">THÔNG TIN CÁ NHÂN</div>  
                <?php if($thongtin["xacthuc"]!=1){ ?>
               <div class="alert alert-danger">Tài khoản chưa xác thực. Vui lòng kiểm tra email để xác thực</div>
                <?php }?>
           <div class="form-group  has-feedback thongtin">
               <label class="col-sm-3 control-label" for="inputWarning">Ảnh đại diện:</label>
    <div class="col-sm-9">
        <div class="boxanhdaidien">
            <img class="img-responsive" id="imgavatar" src="
                 <?php 
                 if($thongtin['avatar']!='')
                     echo URL."upload/avatar/".$thongtin['avatar'];
                 else
                     echo URL."public/images/avatardefault.png";
                 ?>
                 ">
            <a class="changeavatar">
                <input type="file" class="form-control" id="doiavatar">
                <i class="glyphicon glyphicon-camera"></i> 
                Cập nhật ảnh đại diện  
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="boxphantram">
             <div class="progress ">
  <div class="progress-bar progress-bar-striped active phantramanhdaidien" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
    
  </div>
</div>
    </div>
    </div>
  
  </div>
           <div class="form-group  has-feedback thongtin">
                   <label class="col-sm-3 control-label" for="ten">Email đăng nhập:</label>
    <div class="col-sm-9">
        <input required="" disabled="" type="text" value='<?= output($thongtin['email']) ?>'   class="form-control" id="ten">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
              <div class="matkhau form-group  has-feedback">
   <label class="col-sm-3 control-label batbuoc">  Mật khẩu *:</label>
       <div class="col-sm-9">
           <input  name="matkhau" required="" id="nhapmatkhau" value='<?= $thongtin['matkhau'] ?>' placeholder="Chỉ nhận các ký tự từ a - Z hoặc 0-9" onkeypress='validate2(event)'  type="text" class="form-control" >
        <span class="form-control-feedback"></span>
        <i id="kiemtramk"><small>Tắt gõ dấu khi nhập mật khẩu</small></i>
      </div>
    </div> 
               <div class="form-group  has-feedback thongtin">
                   <label class="col-sm-3 control-label batbuoc"  for="ten">Họ và tên <i >*</i> :</label>
    <div class="col-sm-9">
        <input required=""  name="ten" type="text" value='<?= output($thongtin['ten']) ?>'   class="form-control" id="ten">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
               <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label batbuoc" >Giới tính *:</label>
    <div class="col-sm-9">
        <input id="nam" required="" name="gioitinh"  
               <?php
               if($thongtin['gioitinh']!='' && $thongtin['gioitinh']==1)
                   echo "checked";
               ?>
               type="radio" class="radio" value="1">
          <label for="nam">NAM</label>
        <I>-hoặc-</I>
        
        <input required="" id="nu"
               <?php
               if($thongtin['gioitinh']!='' && $thongtin['gioitinh']==0)
                   echo "checked";
               ?>
               name="gioitinh"   type="radio" class="radio" value="0">
        <label for="nu">NỮ</label>
    </div>
  </div>
               <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label batbuoc"  for="inputWarning">Ngày sinh *:</label>
    <div class="col-sm-9">
        <input  readonly=""  class="datepicker "     name="ngaysinh"  value="<?=
              
 kiemtranullcheck($thongtin['ngaysinh'])==true?date_format( date_create($thongtin['ngaysinh']),'d/m/Y'):"";  ?>"   size="16" type="text"  required>
    </div>
  </div>
                <script type="text/javascript">


   $(function () {
  $('.datepicker').datepicker({ format: "dd/mm/yyyy",language:"en"}).on('changeDate', function (ev) {

  });
});



</script>
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label batbuoc" for="sdt">SDT <i >*</i> :</label>
    <div class="col-sm-9">
        <input required="" name="sdt" type="text" value='<?= output($thongtin['sdt']) ?>'   class="form-control" id="sdt">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
               <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label batbuoc" for="diachi">Địa chỉ <i class="">*</i> :</label>
    <div class="col-sm-9">
        <input required="" name="diachi" type="text"  value='<?= output($thongtin['diachi']) ?>'  class="form-control" id="diachi">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
          <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label " for="diachi">Link Facebook: </label>
    <div class="col-sm-9">
        <input  name="linkfb" type="text"  value='<?= output($thongtin['linkfb']) ?>' placeholder="VD: https://www.facebook.com/vieclamcantho.com.vn"  class="form-control" id="linkfb">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>  
         <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="muctieunghenghiep">Bản thân và mục tiêu nghề nghiệp</label>
    <div class="col-sm-9">
        <textarea name="muctieunghenghiep" id="muctieunghenghiep" rows="5"   placeholder="Ưu điểm, khuyết điểm, tính cách, hôn nhân, gia đình. Mục tiêu nghề nghiệp của bạn, định hướng phát triển khả năng và đóng góp gì cho công ty?" class="form-control"><?= output($thongtin['muctieunghenghiep']) ?></textarea>
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
     
          
                    
                     
            </div>
                
                <div class="boxchitiet"> 
                    <div class="boxline row">
                         <div class="line"></div> 
                    </div>
                <div class="tieudetuyendung tieudechinhsua">TRÌNH ĐỘ VÀ BẰNG CẤP</div>
              
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="trinhdohocvan">Trình độ học vấn</label>
    <div class="col-sm-9">
        <select id="trinhdohocvan" name="trinhdohocvan" class="form-control">
            <option value="0">Chọn trình độ</option>   
           <?php
foreach ($trinhdohocvan as $key=>$value){
           ?>
            <option <?= $thongtin['trinhdohocvan']==$key?"selected":"" ?>  value="<?= $key ?>"><?= $value ?></option>     
<?php } ?>
    </select>
        <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="loaitotnghiep">Loại tốt nghiệp</label>
    <div class="col-sm-9">
        <select id="trinhdohocvan" name="loaitotnghiep" class="form-control">
            <option value="0">Chọn loại tốt nghiệp</option>   
           <?php
foreach ($loaitotnghiep as $key=>$value){
           ?>
            <option <?= $thongtin['loaitotnghiep']==$key?"selected":"" ?>  value="<?= $key ?>"><?= $value ?></option>     
<?php } ?>
    </select>
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>   
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="tenbangcap">Tên bằng cấp</label>
    <div class="col-sm-9">
        <input name="tenbangcap" type="text" value='<?= output($thongtin['tenbangcap']) ?>'   placeholder="" class="form-control" id="tenbangcap">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>        
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="donvidaotao">Đơn vị đào tạo</label>
    <div class="col-sm-9">
        <input name="donvidaotao" type="text"  value='<?= output($thongtin['donvidaotao']) ?>'  placeholder="Đại học cần thơ, dạy nghề cần thơ...." class="form-control" id="donvidaotao">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>    
           <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="sonamkinhnghiem">Số năm kinh nghiệm</label>
    <div class="col-sm-9">
       <select id="sonamkinhnghiem" name="sonamkinhnghiem" class="form-control">
            <option value="0">Chọn kinh nghiệm</option>   
           <?php
foreach ($sonamkinhnghiem as $key=>$value){
           ?>
        <option <?= $thongtin['sonamkinhnghiem']==$key?"selected":"" ?>  value="<?= $key ?>"><?= $value ?></option>     
<?php } ?>
    </select>
        <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>     
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="donvidaotao">Từng làm việc tại: </label>
    <div class="col-sm-9">
        <textarea name="tunglamviec" rows="4" class="form-control"><?= output($thongtin['tunglamviec']) ?></textarea>
        <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>    
                      
            </div>
                <div class="boxchitiet">
                    <div class="boxline row">
                         <div class="line"></div> 
                    </div>
               <div class="tieudetuyendung tieudechinhsua">MONG MUỐN TÌM VIỆC
              
               </div>  
              
           
               
    <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label batbuoc" for="vitrimongmuon">Vị trí mong muốn *:</label>
    <div class="col-sm-9">
        <input required="" name="vitrimongmuon" type="text" value='<?= output($thongtin['vitrimongmuon']) ?>'   placeholder="Nhân viên bán hàng, quản lý, kinh doanh...." class="form-control" id="vitrimongmuon">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
               
               <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="mucluongmongmuon">Mức lương mong muốn</label>
    <div class="col-sm-9">
        <input name="mucluongmongmuon" type="text"   value='<?= output($thongtin['mucluongmongmuon']) ?>'  placeholder="1-2 Triệu, 3 Triệu..." class="form-control" id="mucluongmongmuon">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
                      <div class="form-group">
            <label  class="col-sm-3  control-label batbuoc" style="font-size:15px" for="select" >Chọn *: </label>
            <div class="col-sm-8"  style="position: relative">
                <div class="dropdown-hienthi" id="hiennganh" >
                    <input value="1" class="hidden" >
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn ngành nghề (<10)  <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh ngành nghề" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
             <?php $sql="select * from nganhnghe ORDER  BY tennganh  asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
		$dachon=0;
			while($r=$stmt->fetch()){
                            $check=FALSE;
                            foreach ($nganhungvien as $value)
                            {
                                if($value['manganh']==$r['manganh']){
                                     $check=true;
                                     $dachon++;
                            ?>
         <div class="list-item txt-color-363636 ">

<input tabindex="1" type="checkbox"  checked   name="nganh[]" class="checknganh" id="" value="<?php  echo $r['manganh']; ?>" style="opacity:0">
<div class="icheckbox checked" style="position: relative;">
  </div>
<b for=" <?php  echo $r['manganh']; ?>" class="font14">  <?php  echo $r['tennganh']; ?></b>
   </div>                        
                            <?php }}
                            if(!$check){?>
     
      <div class="list-item txt-color-363636 ">

          <input tabindex="1" type="checkbox" name="nganh[]" class="checknganh" id="" value="<?php  echo $r['manganh']; ?>" style="opacity:0">
<div class="icheckbox " style="position: relative;">
  </div>
<b for=" <?php  echo $r['manganh']; ?>" class="font14">  <?php  echo $r['tennganh']; ?></b>
   </div>    
     <?php }}?>


             
                
                 
                  
              
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
      <div class="col-sm-1"><span  class=" " style="top:10px;color:rgb(0, 204, 102)"><?= $dachon ?></span> </div>

            </div>  
               
              <div class="form-group">
            <label  class="col-sm-3  control-label batbuoc" style="font-size:15px" for="select" >Chọn *: </label>
            <div class="col-sm-8"  style="position: relative">
                <div class="dropdown-hienthi">
                    <input value="1" class="hidden" >
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn khu vực (<10)  <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh khu vực" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
                                                                        
                                                                                                                  
                                                                
                                                           
           
             <?php $sql="select * from vung ORDER  BY tenvung  asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
		        $dachon=0;
			while($r=$stmt->fetch()){
                            $check=FALSE;
                            foreach ($vungungvien as $value)
                            {
                                if($value['mavung']==$r['mavung']){
                                     $check=true;
                                     $dachon++;
                            ?>
         <div class="list-item txt-color-363636 ">

<input tabindex="1" type="checkbox"  checked   name="vung[]" class="checkvung" id="" value="<?php  echo $r['mavung']; ?>" style="opacity:0">
<div class="icheckbox checked" style="position: relative;">
  </div>
<b for=" <?php  echo $r['mavung']; ?>" class="font14">  <?php  echo $r['tenvung']; ?></b>
   </div>                        
                            <?php }}
                            if(!$check){?>
     
      <div class="list-item txt-color-363636 ">

          <input tabindex="1" type="checkbox" name="vung[]" class="checkvung" id="" value="<?php  echo $r['mavung']; ?>" style="opacity:0">
<div class="icheckbox " style="position: relative;">
  </div>
<b for=" <?php  echo $r['mavung']; ?>" class="font14">  <?php  echo $r['tenvung']; ?></b>
   </div>    
     <?php }}?>


             
                
                 
                  
              
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
      <div class="col-sm-1"><span  class="" style="top:10px;color:rgb(0, 204, 102)"><?= $dachon ?></span> </div>

            </div>
               
               
               
               
             
              
               
            </div>  
            </div>
        <div class="col-md-6">

                        
            <div class="boxchitiet"> 
                <div class="boxline row">
                         <div class="line"></div> 
                    </div>
                <div class="tieudetuyendung tieudechinhsua">NGOẠI NGỮ</div>
               
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="ngoaingu">Ngoại ngữ:</label>
    <div class="col-sm-9">
        <input name="ngoaingu" type="text" value='<?= output($thongtin['ngoaingu']) ?>'   placeholder="Tiếng Anh, Nhật, Hàn...." class="form-control" id="ngoaingu">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>       
               
               <table class="table">
    <thead>
      <tr>
        <th>Trình độ</th>
        <th>Tốt</th>
        <th>Khá</th>
        <th>TB</th>
        <th>Kém</th>
      </tr>
    </thead>
    <tbody>
      <tr>
         <td><b>Nghe</b></td>
         <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['ngoaingunghe']?"checked":"" ?> name="ngoaingunghe" class="radio"></td>
    
                 <?php }?>
      </tr>
      <tr>
          <td><b>Nói</b></td>
           <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['ngoaingunoi']?"checked":"" ?> name="ngoaingunoi" class="radio"></td>
    
                 <?php }?>
      </tr>
     <tr>
          <td><b>Đọc</b></td>
          <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['ngoaingudoc']?"checked":"" ?> name="ngoaingudoc" class="radio"></td>
    
                 <?php }?>
      </tr>
       <tr>
         <td><b>Viết</b></td>
          <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['ngoainguviet']?"checked":"" ?> name="ngoainguviet" class="radio"></td>
    
                 <?php }?>
      </tr>
      
    </tbody>
  </table>
                 
            </div>
           
            
           <div class="boxchitiet"> 
               <div class="boxline row">
                         <div class="line"></div> 
                    </div>
                <div class="tieudetuyendung tieudechinhsua">TIN HỌC</div>             
               <table class="table">
    <thead>
      <tr>
        <th>Trình độ</th>
        <th>Tốt</th>
        <th>Khá</th>
        <th>TB</th>
        <th>Kém</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td><b>MS Word</b></td>
         <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['tinhocword']?"checked":"" ?> name="tinhocword" class="radio"></td>
    
                 <?php }?>
      </tr>
      <tr>
          <td><b>MS Excel</b></td>
         <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['tinhocexcel']?"checked":"" ?> name="tinhocexcel" class="radio"></td>
    
                 <?php }?>
      </tr>
     <tr>
          <td><b>MS Power Point</b></td>
          <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['tinhocpp']?"checked":"" ?> name="tinhocpp" class="radio"></td>
    
                 <?php }?>
      </tr>
       <tr>
         <td><b>Photoshop</b></td>
          <?php 
                 foreach ($ngoaingu as $key=>$value)
                 {
         ?>
         <td><input type="radio" value="<?= $key ?>" <?= $key==$thongtin['tinhocphotoshop']?"checked":"" ?> name="tinhocphotoshop" class="radio"></td>
    
                 <?php }?>
      </tr>
      <tr>
         <td><b>Phần mềm khác</b></td>
         <td colspan="4">
             <textarea name="tinhockhac" class="form-control"><?= $thongtin['tinhockhac'] ?></textarea>
         </td>
        
      </tr>
      
    </tbody>
  </table>
                 
            </div>
                  
           <div class="boxchitiet"> 
               <div class="boxline row">
                         <div class="line"></div> 
                    </div>
                <div class="tieudetuyendung tieudechinhsua">HÌNH ẢNH VÀ FILE CV</div>    
                <div class="form-group  has-feedback ">
    <label class="col-sm-3 control-label" for="inputWarning">Ảnh cá nhân và bằng cấp
    
    </label>
    <div class="col-sm-9 pre-scrollable">
        <div class="listimage row">
             <?php
                   foreach ($anhbangcap as $value)
                   {
            ?>
           <div class="image-item showimage" style="background-image: url('upload/fileungvien/<?= $value['tenanh'] ?>');">
            <a alt="<?= $value['tenanh'] ?>" class="glyphicon glyphicon-remove xoaanh "></a>
           </div>
                   <?php } ?>
          <div class="image-item dangcho">
            <div class="progress ">
     <div class="progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
  </div>
  </div>
            </div>
        <div class=" image-item boxchonhinh">
        <div class="showhinh">
        <input type="file"  id="anhbangcap"> 
        </div>
        </div>
            
       </div>
        
    
    </div>
  </div>  
                <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="inputWarning">File CV:</label>
    <div class="col-sm-9">
        
        <?php 
        if($thongtin['filecv']!='')
        {
        ?>
        <div class="boxfilecv">
            <i class="fa fa-file-text-o"></i> 
            <b id="namefilecv"><?= $thongtin['filecv'] ?> </b> 
            <a title="Xóa file" rel="<?= $thongtin['filecv'] ?>" class="xoacv glyphicon glyphicon-remove"></a>
        </div>
        <div class="uploadcv " style="display: none">
        <input  id="filecv" type="file"  class="form-control" >
        <i>File hồ sơ cá nhân của bạn. File word, excel hoặc pdf...</i>
         <div class="progress boxphantramcv">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
         </div>
        </div> 
        </div>
        <?php }else 
        {?>
        <div class="boxfilecv" style="display: none">
            <i class="fa fa-file-text-o"></i> 
            <b id="namefilecv"> </b> 
            <a title="Xóa file" id="xoacv" class="xoacv glyphicon glyphicon-remove"></a>
        </div>
        <div class="uploadcv">
            <input   id="filecv" type="file"  class="form-control" >
        <i>File hồ sơ cá nhân của bạn. File word, excel hoặc pdf...</i>
         <div class="progress boxphantramcv">
            <div class="progress-bar progress-bar-striped active" role="progressbar"
    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
         </div>
        </div> 
        </div>
        
        <?php }?>
        
    </div>
  </div>
           </div>
        </div> <!--            end col-main-->
        <div class="col-md-12">
           <div class="boxchitiet">
            <div class="tieudetuyendung">Cài đặt</div>
            <div class="form-group">
                <label for="hienthivoinhatuyendung" class="col-md-2">Hiển thị với mọi người:</label>
                <div class="col-md-2">  
                    <input id="hienthivoinhatuyendung" <?= $thongtin['hienthivoinhatuyendung']==1?"checked":""; ?> type="checkbox" name="hienthivoinhatuyendung" class="icheckbox"></div>
            </div>
            <div class="form-group">
                <label for="hienthivoinhatuyendung" class="col-md-2">Trạng thái xác thực:</label>
                <div class="col-md-10">  
                    <?php if($thongtin["xacthuc"]==1){ ?>
                    <b style="color: green">Đã xác thực</b>
                    <?php }else{?>
                    <b style="color: red">Chưa xác thực (Bạn sẽ không thể nộp hồ sơ cho nhà tuyển dụng)</b><span> Vui lòng kiểm tra email của bạn để xác thực tài khoản! </span>
                    <?php }?>
            </div>
        </div>  
        </div>
       
            <div class="col-md-12">
                 <div align="center" class="boxchitiet" > 
                <button  class="btn btn-warning btn-lg"s type="submit" id="btndangky" >CẬP NHẬT</button>
                <a href="<?= URL ?>ho-so-ung-vien.html">  <button type="button"  class="btn btn-default btn-lg"s  id="btndangky" >HỦY</button></a>
            </div>
            </div>
           

        </form>
    </div>
    
</div>

<!-- hiển thị quản lý-->
      <button title="<?= $datauser['ungvien'] ?>"  class=" btn btn-warning btn-md btn-showquanly btn-mobiquanly " ><i class="glyphicon glyphicon-user"></i></button>
   
    <script>
$(document).ready(function(){

  $('.btn-mobiquanly').click(function(){
      $('.boxdangnhap').toggleClass('quanlymobi');
  })
});
</script>
      
<div class="boxdangnhap" style="display: none">
           <div class="ribbon-wrapper h2 ribbon-red" style="    margin-bottom: 40px;">
				<div class="ribbon-front">
                                    <h2>Xin chào <br><small><b>ỨNG VIÊN</b></small></h2>
                                        
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
          
               
           <h3 class="blue xinchao" > <?= $datauser['email'] ?></h3>
                <a href="cap-nhat-thong-tin-ho-so.html" class="quanly"><i class="glyphicon glyphicon-pencil"></i> Cập nhật thông tin hồ sơ</a>
                               <a href="ho-so-da-nop.html" class="quanly"><i class="glyphicon glyphicon-list"></i> Danh sách công ty bạn đã ứng tuyển</a>

                    <a href="<?= URL."logout.php" ?>" class="quanly"><i class="glyphicon glyphicon-log-out"></i> <button name="thoat" class="btn btn-default">Thoát</button></a>
                
              
            </div>  
<script src="public/js/capnhatthongtinhoso.js?ver=1<?= VER ?>"></script>
<script src="public/js/bootstrap-datepicker.js?ver=<?= VER ?>"></script>
<script>
                $('.radio').iCheck({
                  
    radioClass: 'iradio_square-blue',
    increaseArea: '20%'
                });
                     $('.icheckbox').iCheck({
                  
    checkboxClass: 'iradio_square-blue',
    increaseArea: '20%'
                });
            </script>
<?php 

} else echo "<div class='alert alert-info text-center'>Ứng viên không tồn tại hoặc đã bị xóa</div>";

} else echo "<div class='alert alert-info text-center'>Bạn chưa đăng nhập | Hãy đăng nhập với tư cách người tìm việc trước nhé!</div>"
?>

<?php require 'footer.php'; ?>