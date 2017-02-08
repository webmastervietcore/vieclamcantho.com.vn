<?php 

require 'header.php';
if(checklogin(1) && isset($_GET['token']))
{
$datauser = getvaluecookie("authentic");
if(isset($_POST['tendonvi']) && isset($_POST['token']) && isset($datauser['email']) && isset($_SESSION['tokencapnhatthongtintaikhoan']))
{  
    if( strlen($_POST['matkhau'])>4 )
{
    unset($_SESSION['tokencapnhatthongtintaikhoan']);
   $token=createhash("sha256",$datauser['email'],HASH_KEY);
if($_POST['token']==$token)
 
{
      $thaydoilogo=FALSE;
      $tendonvi=  input($_POST['tendonvi']);
      $email= $datauser['email'];
      $data['tencongty']= tieude(input($_POST["tendonvi"]));
      $data['sdt']=input($_POST["sdt"]);
      $data['diachi']= input($_POST["diachi"]);
      $data['matkhau']= kytuthuong(input($_POST["matkhau"]));
      $image_name=input($_POST['logo']);


if(isset($_FILES['img']))
{
    $file=$_FILES['img'];
 if(!ktfileanh($file))   
 {
if($_POST['logo']!=LOGOMACDINH)
{
    
$linkxoa = LOGO.$_POST['logo']; // Địa chỉ file ảnh cần xóa
if(file_exists($linkxoa))
{
    if(file_exists($linkxoa))
unlink($linkxoa);
$linkxoa = SHARE.$image_name;
    if(file_exists($linkxoa))
unlink($linkxoa);
}
}
$extension=  getExtension($file['name']);
// đặt tên mới cho file hình up lên
$image_name=  tieudekhongdau($tendonvi).time().'.'.$extension;
// gán thêm cho file này đường dẫn
$newname=LOGO.$image_name;

// kiểm tra xem file hình này đã upload lên trước đó chưa

 $copied = copy($_FILES['img']['tmp_name'], $newname);
 resizeImage($newname,$newname,'300','300');
 watermark_image("nen.png",SHARE.$image_name, $newname);
 update("tuyendung",array("logo"=>$image_name),"taikhoan=:taikhoan",array('taikhoan'=>$email),$db);
 $thaydoilogo=TRUE;
 $data['logo']=$image_name;

 }
}
$resultupdate = update('taikhoan',$data,"email=:email",array('email'=>$email),$db);
//thong bao thanh cong?>
 <?php
}// bang nhau
}// dung la email
 } // ton tai
?>
<?php
    $token=createhash("sha256",$datauser['email'],HASH_KEY);
    $_SESSION['tokencapnhatthongtintaikhoan']=$token;
      if( $token==$_GET['token'])
{ 
?>


<div id="main" class="container" style="margin-top:10px ;padding:0px"  > 
    
    <div class="col-md-1" ></div>
    <div class="col-md-8" >
        <div class="breadcrumb1 clearfix">
              
       <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        
        <div class="itemtip">
            <a>Quản lý thông tin</a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
       <div class="itemtip">
            <a><?= $datauser['email'] ?></a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
            </div> 

    <?php
		$email=$datauser['email'];
    $sql="SELECT * from taikhoan  where email='$email'";
  $i=0;
      $stmt = $db->prepare($sql);
      $stmt->execute();
      while($r=$stmt->fetch() )
      {
            
?>          
        <?php
        if(isset($resultupdate) && $resultupdate["row"] > 0  ){
        ?>
        <div class="alert alert-success"><i class="glyphicon glyphicon-ok thanhcong" style="font-size: 15px;"></i> Cập nhật thông tin thành công</div>
        <?php }?>
        <div class="boxchitiet row">
                <div class="tieudetuyendung">CHỈNH SỬA THÔNG TIN</div>  
            <form id="frmdangky" action="quan-ly-thong-tin.html?token=<?= $_GET["token"] ?>" method="post" class="form-horizontal" role="form"  enctype="multipart/form-data">                  
 <div class="thongtin form-group  has-feedback">
     <input value="<?= $token ?>" name="token" class="hidden">
         <label class="col-sm-2 control-label">Email đăng nhập</label>
      <div class="col-sm-8">
          <input disabled maxlength="100" type="email" value="<?= $r['email']; ?>" name="email" required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
            <i class="">Đây là email để bạn đăng nhập. Mỗi tin tuyển dụng có thể nhận email khác hoặc giống email này. Ứng viên sẽ nộp hồ sơ qua email mà bạn đã điền trong tin tuyển dụng.</i>
      </div>
    </div>
                <div class="matkhau form-group  has-feedback">
        <label class="col-sm-2 control-label">Mật khẩu</label>
       <div class="col-sm-8">
           <input value="<?php echo $r['matkhau']; ?>"  onkeypress='validate2(event)' placeholder="Chỉ nhận ký tự a-Z, 0-9"  name="matkhau" required="" id="nhapmatkhau" type="text" class="form-control" >
        <span class="form-control-feedback"></span>
        <i id="kiemtramk" class="form-chuthich"></i>
      </div>
    </div>        
                
    <div class="thongtin form-group has-feedback">
        <label class="col-sm-2 control-label"> Tên công ty</label>
      <div class="col-sm-8">
          <input type="text" maxlength="100" value='<?= $r['tencongty']; ?>' name="tendonvi"  required="" class="form-control" id="inputSuccess">
         <span class=" form-control-feedback"></span>
         <i class="form-chuthich"></i>
      </div>
    </div>
          
               
 <div class="thongtin form-group  has-feedback">
         <label class="col-sm-2 control-label">Địa chỉ</label>
      <div class="col-sm-8">
          <input  maxlength="100" value='<?= $r['diachi']; ?>' type="text" name="diachi"  required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
          <i class="form-chuthich"></i>
      </div>
    </div>
               
                
 <div class="thongtin form-group  has-feedback">
         <label class="col-sm-2 control-label">Số điện thoại</label>
      <div class="col-sm-8">
          <input maxlength="100" value='<?= $r['sdt']; ?>' type="text"  name="sdt" required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
          <i class="form-chuthich"></i>
      </div>
    </div>
               
 
          
       <div class="form-group">
             <label  class=" col-sm-2 control-label" for="tieude" >Logo của bạn: </label>
            <div class="col-sm-8">
                <img style="    max-width: 100%;
    max-height: 100px;"  class="img-responsive"  name="logo" src="<?php echo LOGO.$r['logo']; ?>">
            <input name="logo" class="hidden" value="<?php echo $r['logo']; ?>"></div>

           </div>                

            <div class="form-group">
             <label  class=" col-sm-2 control-label" for="tieude" >Chọn logo mới: </label>
             <input type="text" class="hidden" name='logo' value="<?php echo $r['logo']; ?>">
            <div class="col-sm-8"><input   name="img" id="img" type="file"  class="form-control" /></div>
           <div class="col-sm-2"><span id="ktimg" class="glyphicon glyphicon-ok " style="top:10px;color:rgb(0, 204, 102)">Có thể trống</span> </div> 
           </div>
          
              
  
              
                         <div  align="center">
                             <button class="btn btn-warning btn-lg "  type="submit">Cập Nhật</button>
                             <a href="<?= URL ?>dang-tin-tuyen-dung.html">  <button class="btn btn-default btn-lg" type="button">Hủy</button></a>
                         </div>   
</form>

        <?php }?> 
 
        </div>
   

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
        
       </div>

<script src="public/js/quanlythongtin.js?ver=<?= VER ?>" ></script>


<?php require 'footer.php'; }}?>
	