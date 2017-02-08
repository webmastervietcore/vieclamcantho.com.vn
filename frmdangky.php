<?php
require 'header.php';
?>
<?php 
// xac thuc
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['token']=$token;
?>    


<br>
<div class="container">


           <div class="breadcrumb1 clearfix">
              
        <div class="itemtip"><a> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
      
       <div class="itemtip">
            <a>Nhà tuyển dụng đăng ký</a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>

            </div> 
<div class="col-md-6">

              <div class="boxchitiet">
                  <div class="boxline row">
                         <div class="line"></div> 
                    </div>
                <div class="tieudetuyendung tieudechinhsua">NHÀ TUYỂN DỤNG ĐĂNG KÝ</div> 
             
              <form id="frmdangky" action="authentic/nhatuyendung/insert" method="post" class="form-horizontal" role="form"  enctype="multipart/form-data">
                        
                            
                            <small class="col-md-12 text-right">Tắt gõ dấu tiếng việt khi nhập Email và mật khẩu</small>    
 <div  class="tendangnhap form-group  has-feedback ">
     <label class="col-sm-3 control-label">Email đăng nhập</label>
      <div class="col-sm-9">
          <input  name="email" required="" id="nhaptaikhoan" placeholder="Email này sử dụng để nhận Hồ Sơ từ ứng viên!" onkeypress='validate(event)' type="email" class="form-control" >
        <span class=" form-control-feedback"></span>
        <i id="kiemtratk"></i>
      </div>
    </div>
           
                        
                               
          
 <div class="matkhau form-group  has-feedback">
   <label class="col-sm-3 control-label">  Mật khẩu </label>
       <div class="col-sm-9">
        <input  name="matkhau" required="" id="nhapmatkhau" placeholder="Chỉ nhận các ký tự từ a - z hoặc 0-9" onkeypress='validate2(event)'  type="text" class="form-control" >
        <span class="form-control-feedback"></span>
         <i id="kiemtramk"></i>
       </div>
    
    </div>                   
           
              
    
 <div class="thongtin form-group has-feedback">
   <label class="col-sm-3 control-label">Tên công ty</label>
      <div class="col-sm-9">
          <input type="text" maxlength="100" name="tendonvi"  required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
        <i></i>
      </div>
    </div>
          
                    
   
 <div class="thongtin form-group  has-feedback">
    <label class="col-sm-3 control-label">Địa chỉ</label>
      <div class="col-sm-9">
          <input type="text" name="diachi" maxlength="100"  required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
           <i></i>
      </div>
    </div>
               
    
 <div class="thongtin form-group  has-feedback">
   <label class="col-sm-3 control-label">Số điện thoại</label>
      <div class="col-sm-9">
          <input type="text"  name="sdt" maxlength="100" required="" class="form-control" id="inputSuccess">
        <span class=" form-control-feedback"></span>
          <i></i>
      </div>
    </div>
               
   
                  
       <div class="form-group  has-feedback">
    <label class="col-sm-3">Logo của bạn</label>
      <div class="col-sm-9">
          <input  id='img' name="img" class="form-control" type="file">
        <span class=" form-control-feedback"></span>
       <span   style="color:#5CB85C" id='ktimg' class="glyphicon glyphicon-ok  ">Có thể trống</span>
      </div>
    </div>   
                      
          
                               
                               <br>
                           <div  align="center">
                               
                               <div class="thongbaodangky  alert"></div>
                               <button  class="btn btn-warning btn-lg" type="submit" id="btndangky" ><i class="fa fa-user-plus"></i> ĐĂNG KÝ</button>
                               <div class="btn-group">
                                   <a class="btn btn-danger disabled" style="height: 40px;opacity: 0.8;"><i class="fa fa-google-plus" style="width:16px; height:20px"></i></a>
                                   <a class="btn btn-danger logingoogle" onclick="_loginempoyergoogle()"  style="width:14em;height: 40px;"> Đăng nhập với Google</a>
                               </div>
                           </div>
                              <div> </div>
                        
</form>
                   </div>
           
        
    </div>

<div class="col-md-6">
    <div class="chuthich">
        <img src="public/images/chuthich.png"> 
        <i class="glyphicon glyphicon-ok"></i> Việc đăng ký một tài khoản, đồng nghĩa bạn đồng ý tuân thủ các quy chế hoạt động của chúng tôi.<br>
       <i class="glyphicon glyphicon-ok"></i>  Các tin tuyển dụng mà bạn đăng sau này phải là những tin hợp pháp, không mang tính chất lừa đảo hoặc vi pháp các quy định của pháp luật<br>
       <i class="glyphicon glyphicon-ok"></i>  Tất cả vì lợi ích chung của công ty bạn, cũng như lợi ích của thành viên ứng tuyển vào công ty bạn.
    </div>
    </div>
</div>  
        <script src="public/js/dangky.js" ></script>
    <?php require 'footer.php'; $_SESSION['kiemtrataikhoan']=false;?>