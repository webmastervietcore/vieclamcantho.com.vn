<?php
   require 'header.php'; 
?>
	
<?php 
// xac thuc
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<!--<script type="text/javascript">
// convert all text areas to rich text editor on that page
 
        bkLib.onDomLoaded(function() {
             new nicEditor().panelInstance('ghichu');
        }); // convert text area with id area1 to rich text editor.
</script> 
-->
<script>
$(document).ready(function(e) {
  $('#menudangtintuyendung').addClass('active');
  
});
</script>
 <link href="public/css/datepicker.css?ver=<?= VER ?>" rel="stylesheet" />
<div id="hienthituyedung" class="container" >
    <div class="row">
       
<link rel="stylesheet" href="public/css/bootstrap-tagsinput.css"/>
<script src="public/js/bootstrap-tagsinput.js"></script>
<script language="javascript" src="public/tienich/ckeditor.js?ver=<?= VER ?>" type="text/javascript"></script>
  <div class="col-md-9">
         <div class="breadcrumb1 clearfix">
              
             <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        <div class="itemtip ">
            <a>Đăng tin tuyển dụng</a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
            </div>
      <?php
      if(checklogin(1))
{
      ?>
      <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="glyphicon glyphicon-alert"></i>Chú ý: Chúng tôi <b>không thu</b> bất kỳ một loại phí nào khi bạn đăng tin tuyển dụng trên website!</div>

 <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <i class="glyphicon glyphicon-fire"></i> Tin tuyển dụng <b>Lừa Đảo và Spam Tin </b> sẽ bị xóa không cần báo trước! </div>
   <?php 
   // kiểm tra đăng nhập và xác thực
   ?>
<?php 
// xac thuc
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['nowpage']="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['tokentuyendung']=$token;

?>

   <form action="libs/inserttuyendung.php" method="post" class="form-horizontal" id="frmtuyendung"  enctype="multipart/form-data">
<div class="row boxchitiet">
    <div class="tieudetuyendung">THÔNG TIN TUYỂN DỤNG</div>  
          <?php if(checklogin(1)){ 
              $datauser = getvaluecookie("authentic");
		   $matk=$datauser["email"];
			   $sql="select tencongty,email,diachi,sdt,logo from taikhoan where email='$matk'";
			   $stmt = $db->prepare($sql);
			$stmt->execute();
			$taikhoan=$stmt->fetch();
		  
		  ?>
    <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Tên đơn vị : </label>
            <input name="ktdv" class="hidden" value="true"  id="ktdv" >
            <div class="col-sm-8">
                <input id="ten" maxlength="100" value='<?= $taikhoan['tencongty']; ?>' name="tendonvi" type="text"   class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktten" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
          
          
          <?php } 
		   else{
			    
		   ?>
          <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Tên đơn vị: </label>
            <input name="ktdv" class="hidden" value="false"  id="ktdv" >
            <div class="col-sm-8">
                <input id="ten" maxlength="100" name="tendonvi" type="text" value=""   placeholder="Đây cũng là tiêu đề chính của bạn(Tên công ty,nhà hàng,quán ăn...)"   class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktten" class="" style="top:10px;"> </span> </div>
          </div>
          
          <?php  }?>
          <div class="form-group">
            <label  class=" col-sm-2 control-label" for="vitri" > Vị trí cần tuyển: </label>
            <div class="col-sm-8">
                
                <input placeholder="Nhấn enter để hoàn tất" id="tieude" class="vitrituyendung" name="vitri" >
                     <input name="kttd" class="hidden" value=""  id="kttd" >
            </div>
            <div class="col-sm-2"><span id="kttieude" class="" style="top:10px;" ></span> </div>
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
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn ngành nghề (<10) <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh ngành nghề" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
                                                                        
                                                                                                                  
                                                                
                                                           
           
             <?php $sql="select * from nganhnghe ORDER  BY tennganh  asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
		
			while($r=$stmt->fetch()){
 ?>
         <div class="list-item txt-color-363636 ">
             <input tabindex="1" type="checkbox"  name="nganh[]" class="checknganh" id="" value="<?php  echo $r['manganh']; ?>" style="opacity:0">
<div class="icheckbox" style="position: relative;">
  </div>
<b class="font14">  <?php  echo $r['tennganh']; ?></b>
</div>
             
                
                 
                  
                <?php  }?>
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
                        <div class="col-sm-2"><span  class="ktnganh" style="top:10px;color:rgb(0, 204, 102)"></span> </div>

            </div>
          <div class="form-group">
            <label  class="col-sm-2  control-label" style="font-size:15px" for="select" >Chọn: </label>
            <div class="col-sm-8"  style="position: relative">
                <div class="dropdown-hienthi " id="hienvung" >
                    <input value="1" class="hidden" >
                    <span><i class="glyphicon glyphicon-map-marker"></i>Chọn khu vực (<10)  <i class="now glyphicon glyphicon-chevron-down"></i></span> </div>
                <div class="dropdown-timkiem ">
    <input  type="text" autocomplete="off" placeholder="Tìm nhanh khu vực" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">
<ul class="box_drop">
                                                                <li>
                                                                                
                                                                    <div class="scrollbox" style=" width: 100%;">
                                                                        
                                                                                                                  
                                                                
                                                           
           
                <?php $sql="select * from vung ORDER  BY tenvung asc";
			  
			$stmt = $db->prepare($sql);
			$stmt->execute();
			while($r=$stmt->fetch()){
 ?>
         <div class="list-item txt-color-363636 ">
             <input tabindex="1" type="checkbox"  name="vung[]" class="checkvung" value="<?php  echo $r['mavung']; ?>" style="opacity:0">
<div class="icheckbox" style="position: relative;">
  </div>
<b  class="font14">  <?php  echo $r['tenvung']; ?></b>
</div>
             
                
                 
                  
                <?php  }?>
                                                                        </div> 
                                                                    </li>
                                                               
                                                                 </ul>
                                                                
                                                    </div>
              </div>
           
                
            <div class="col-sm-2"><span  class="ktvung" style="top:10px;color:rgb(0, 204, 102)"></span> </div>
      
            </div>
          <div class="form-group">
            <label  class=" col-sm-2 control-label" for="tieude" > Ngày hết hạn: </label>
            
            <input name="kttg" class="hidden" value="true"  id="kttg" >
            
            
            <div class="col-sm-8">
                
                <?php if(trinhduyet()=="Firefox"){  ?>
     
                <input style="width: 100%" class=" datepicker" value="" name="ngayhethan"  id="ngayhethan"  size="16" type="text"  readonly="" required>
            <?php } else {  ?>
              <input  id="ngayhethan" name="ngayhethan" min="<?php echo  $ngay=date('Y-m-d'); ?>" value="" type="date" placeholder="NĂM-THÁNG-NGÀY"  class="form-control nhapthongtin"  required>
            <?php  }?>
            </div>
            <div class="col-sm-2">
                
                <span id="ktngay" class=""></span> 
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" style="font-size:15px" for="ghichu" >Yêu cầu tuyển dụng: </label>
            <input name="ktgc" class="hidden" value="true"  id="ktgc" >
            <div class="col-sm-8">
                <textarea id="ghichu"   name="ghichu"  rows="10"  class="form-control" >
                  <?php echo isset($_POST['ghichu'])?$_POST['ghichu']:"" ; ?>
                </textarea>
                <script type="text/javascript">
    
    CKEDITOR.replace('ghichu',{
        
          toolbar: 'Full',
          removeDialogTabs : 'link:advanced'
    });

</script>
            </div>
                    
            <div class="col-sm-2"><span  class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
</div>
            
            
            <div class="row boxchitiet">
    <div class="tieudetuyendung">THÔNG TIN LIÊN HỆ</div>  
          <?php 
          
          
         
		   if(checklogin(1))
		   {
			 
		   ?>
          
          <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Số điện thoại : </label>
            <input name="ktsdt" class="hidden" value="true"  id="ktsdt" >
            <div class="col-sm-8">
              <input id="sdt" name="sdt" maxlength="100" type="text"  value='<?php echo $taikhoan['sdt']; ?>'  class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktsodienthoai" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
          
        
   
      <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Địa chỉ: </label>
            <input name="ktdc" class="hidden" value="true"  id="ktdc" >
            <div class="col-sm-8">
              <input id="diachi" name="diachi" maxlength="100" type="text"   value='<?php echo $taikhoan['diachi']; ?>'  class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktdiachi" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
     <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="email" > Email: </label>
            <div class="col-sm-8">
              <input name="email" type="email" maxlength="100" value='<?php echo $taikhoan['email']; ?>'   class="form-control" >
            </div>
            <div class="col-sm-2"><span  class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
          <div class="form-group">
            <label  class=" col-sm-2 control-label" for="tieude" >Logo của bạn: </label>
            <div class="col-sm-8" >
                <img  style="    max-width: 100%;
    max-height: 100px;" class="img-responsive"  src="<?php echo LOGO.$taikhoan['logo']; ?>">
            <small>Để thay đổi logo, vui lòng vào quản lý thông tin</small>
            </div>
           
            <input class="hidden"  name='img' value="<?php echo $taikhoan['logo']; ?>">
            <div class="col-sm-2"><span id="ktimg" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>
          <?php }else
		   { ?>
        
          
     
          <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Số điện thoại: </label>
            <input name="ktsdt" class="hidden" value=""  id="ktsdt" >
            <div class="col-sm-8">
              <input id="sdt" maxlength="100" name="sdt" type="text"    class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktsodienthoai" > </span> </div>
          </div>
         
        
     
      
     <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="select" > Địa chỉ: </label>
            <input name="ktdc"  class="hidden" value=""  id="ktdc" >
            <div class="col-sm-8">
              <input  id="diachi" maxlength="100" name="diachi" type="text" value=""   class="form-control nhapthongtin" required>
            </div>
            <div class="col-sm-2"><span id="ktdiachi" > </span> </div>
          </div>
    <div class="form-group">
            <label  class="control-label col-sm-2" style="font-size:15px" for="email" > Email: </label>
            <div class="col-sm-8">
              <input name="email" maxlength="100" type="email"  value="" placeholder="Email sử dụng để ứng viên nộp hồ sơ trực tiếp từ website!"   class="form-control" >
            </div>
            <div class="col-sm-2" style="color:rgba(51,204,51,1)"><span id="ktsodienthoai" class="glyphicon glyphicon-ok  " style="top:10px;"></span> </div>
          </div>
     <div class="form-group">
            <label  class=" col-sm-2 control-label" for="tieude" >Logo của bạn: </label>
            <div class="col-sm-8">
              <input   name="img" id="img" type="file"  class="form-control" />
            </div>
            <div class="col-sm-2"><span id="ktimg" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)"></span> </div>
          </div>


    
            
   
          <?php } ?>
            
         </div>     
    <div class="row boxchitiet googlemapvagiaodien">
   <div class="tieudetuyendung">VỊ TRÍ CÔNG TY VÀ GIAO DIỆN</div>  
   
   <div class="form-group " >
       
            <label  class="control-label col-sm-2 " style="font-size:15px" for="email" > Vị trí: </label>
            <div class="col-sm-8" >
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                     <div id="map" ></div>
                     <div class="col-md-9 toolmap">
                          <input   name="toado" type="text" readonly="" class=" valvitri " />
                   
                       <button type="button" class="btn btn-default huyvitri">Bỏ vị trí</button>  
                     </div>
                       
            </div>
                        <div class="col-sm-2" style="color:rgba(51,204,51,1)"><span  class="glyphicon glyphicon-ok  " style="top:10px;"></span> </div>

              
          </div>
       
          
          <div class="form-group">
          <div class="col-md-2">
              <b> Chọn giao diện</b>
              <select name="bk" class="form-control chongiaodien">
                  <option value="0">Default</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
              </select>
   
                  </div>
          <div class="col-md-8" style="max-height: 100px">
          <div class="row boxchitiet demobox">
                                <div class="demoboxlogo" >
                                    <img style="max-height: 80px" class="img-responsive img-thumbnail demologo"  src="
                                         <?php
                                         if(checklogin())
                                             echo LOGO.$taikhoan['logo'];
                                         else
                                             echo LOGO.LOGOMACDINH;
                                         ?>
                                         " />
                                </div> 
                                <div  class="demopaneltieude">
                                    <p style="font-size: 14px !important"  align="center" class="demotieudechitiet" >
                                        <?php
                                           if(checklogin())
                                             echo $taikhoan['tencongty'];
                                         else
                                             echo "TÊN CÔNG TY";
                                         ?>
                                        
                                    </p>                                
                                </div>
       </div>

              </div>
                                        <div class="col-sm-2" style="color:rgba(51,204,51,1)"><span  class="glyphicon glyphicon-ok  " style="top:10px;"></span> </div>


          
        </div>
       
    </div>
       <div class="row boxchitiet">
           
           
           <div class="form-group boxmabaove">
               <div>   <label  style="font-size:15px" for="select" > Mã bảo vệ: </label></div>
            <div>
                <input style="width: 100px" id="mabaove" name="mabaove" type="text" value=""   class="form-control" required>
            </div>
         <div class="badge txtmabaove" style="font-size:29px;margin-left: 5px" ><?php  taoma(); echo $_SESSION['mabaove'] ?></div>     
          </div>
          <div align="center">
              <input id="dangtin"    type="submit"   class="btn btn-warning btn-lg "    value="ĐĂNG TIN"><br>
                     
          
</div>
           
       </div>
        </form>
      <?php 
}else{
      // end kiểm tra xác thức
      ?>
      <div class="alert alert-warning">Bạn chưa <b>ĐĂNG NHẬP</b>! vui lòng <b>ĐĂNG NHẬP</b> để đăng tin và <b>QUẢN LÝ</b> tin dễ dàng hơn.<br>
      </div>
<?php } ?>
   </div>

  <div class="col-md-3">
  <?php if(checklogin(1)){ 
        ?>
      <button title="<?= $datauser['email'] ?>"  class=" btn btn-warning btn-md  btn-mobiquanly" ><i class="glyphicon glyphicon-user"></i></button>
   
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
    scrollTo('quanlynhatuyendung',0);
    });
      </script>  
   <?php } ?>
        <?php if(checklogin(1)){
            $token=createhash("sha256",$datauser["email"],HASH_KEY);
            ?>
       
<!--        <div  id="contact_wrap">
          <h3 class="teal">Xin chào</h3>
          <div align="center" class=" alert alert-info"> <?php echo $_COOKIE['email']; ?></div>
          <p align="center"><a href="quanlytuyendung.php" >
                  <button   class="btn btn-warning" ><i class="glyphicon glyphicon-list-alt"></i> Quản lý bài viết</button>
            </a></p>
          <p align="center"><a href="quanlythongtin.php" >
                  <button   class="btn btn-warning"><i class="glyphicon glyphicon-user"></i> Quản lý tài TK</button>
            </a></p>
          <form action="dangnhap.php" method="post">
            <div align="center">
                <button   value="thoat" name="thoat" class="btn btn-default"><i class="glyphicon glyphicon-log-out"> </i>Thoát</button>
            </div>
          </form>
        </div>-->
      
      <div class="boxdangnhap">
           <div class="ribbon-wrapper h2 ribbon-red" style="    margin-bottom: 40px;">
				<div class="ribbon-front">
                                    <h2>Xin chào <br><small><b>Nhà tuyển dụng</b></small></h2>
                                   
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>                   
           <h3 class="blue xinchao" > <?= $datauser["email"] ?></h3>
                <a href="quan-ly-bai-viet.html?token=<?=$token?>" class="quanly"><i class="glyphicon glyphicon-list-alt"></i> Quản lý bài viết</a>
                   <a href="quan-ly-thong-tin.html?token=<?=$token?>" class="quanly"><i class="fa fa-info"></i> Quản lý thông tin</a>

                 
                   <a href="<?= URL.'logout.php' ?>" class="quanly"><i class="glyphicon glyphicon-log-out"></i> <button name="thoat" class="btn btn-default">Thoát</button></a>

              
            </div>  
  <?php }else{?>
       
     
       
          
          
<div id="quanlynhatuyendung" class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Nhà tuyển dụng</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
            <form id="frmdangnhap" class="formlogin">
				<ul>
					<li>
                                            <a href="#" class=" icon user"></a>  <input required="" tabindex="1" id="email" type="email" class="text " value="Email đăng nhập" 
                                                                                        onfocus="if(this.value=='Email đăng nhập'){this.value = ''};" onblur="if (this.value == '') {this.value = 'Email đăng nhập';}" >
					</li>
					 <li>
                                             <a href="#"  class=" icon lock"></a><input tabindex="2" required="" id="matkhau" type="password" value="Password"
                                                                                        onfocus="if(this.value=='Password'){this.value = ''};" onblur="if (this.value == '') {this.value = 'Password';}">
					</li>
				</ul>

			
			<div class="submit">
				<input type="submit" class="btnlogin"  id="btndangnhap" value="Đăng nhập" >
                                <a href="nha-tuyen-dung-dang-ky.html">
                                    <button type="button" class="btnlogin" style="background-color: #39bb21"  id="btndangnhap">Đăng ký</button>
                                </a>
                                <hr>
                                <div class="btn-group">
                                   <a class="btn btn-danger disabled" style="height: 40px;opacity: 0.8;"><i class="fa fa-google-plus" style="width:16px; height:20px"></i></a>
                                   <a class="btn btn-danger logingoogle" onclick="_loginempoyergoogle()"  style="width:14em;height: 40px;"> Đăng nhập với Google</a>
                               </div>
			</div>
                   <img id="loaddangnhap" src="public/images/ajax_loading.gif">

 <div align="center" id='ketqua'>
        </div>
                </form>
            </div>
        <div class="boxdangky">
            <h3 class="squenmatkhau">Nhà tuyển dụng quên mật khẩu</h3>
          Nhấn vào đây  <a href="#"  id="quenmatkhau"><i class="fa fa-exclamation-circle"></i><b>Quên mật khẩu</b></a>
<div class="alert alert-danger boxtimlaimatkhau">
              <label class="control-label">Tìm lại mật khẩu</label>
              <input onkeypress='validate(event)' class="form-control"  id="timlaimatkhauemail" type="text" placeholder="Nhập email đăng nhập">
              <small>Nhớ tắt gõ dấu tiếng việt!</small>
              <i class="loadtimlaimatkhau fa fa-circle-o-notch fa-spin thanhcong"></i>
              <button class="btn btn-warning btntimlaimatkhautuyendung">Gửi</button>
          </div>
		
        </div>

        <?php  } ?>
				

      <br>
      <div class="chuthich">
          <img src="public/images/chuthich.png"> 
        <i class="glyphicon glyphicon-ok"></i> Cấm tất cả các hình thức đăng tin tuyển dụng lừa đảo, ảnh hưởng xấu đến lợi ích của người khác.<br>
       <i class="glyphicon glyphicon-ok"></i> Cấm những tin tuyển dụng không có giá trị thực tế<br>
        <i class="glyphicon glyphicon-ok"></i> Không đăng những tin tuyển dụng vi phạm pháp luật<br>
    </div>
  </div>
</div>
</div>
  <input id="toadox" value="10.03120174178347" class="hidden">
  <input id="toadoy" value="105.76884283068853" class="hidden">
<script src="public/js/googlemap.js?ver=<?= VER ?>">

</script>

<!--
-->    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
         async defer>
    </script>
<script src="public/js/timlaimatkhau.js?ver=<?= VER ?>"></script>
<script src="public/js/kiemtratuyendung.js?ver=1<?= VER ?>"></script>
<script src="public/js/bootstrap-datepicker.js?ver=<?= VER ?>"></script>
<script type="text/javascript">


   $(function () {
  $('.datepicker').datepicker({ format: "dd/mm/yyyy",language:"vi"}).on('changeDate', function (ev) {
    $(this).datepicker('hide');               	
		$('#ktngay').removeClass('glyphicon-remove');
		$('#ktngay').addClass('glyphicon glyphicon-ok ');
		$('#ktngay').css('color','rgba(0,204,102,1)');		
                $('#kttg').prop('value','true');     
  });
});
</script>
<script src="public/js/dangnhap.js?ver=<?= VER ?>"></script>
<?php require 'footer.php' ?>