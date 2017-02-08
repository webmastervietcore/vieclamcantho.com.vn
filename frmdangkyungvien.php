<?php
require 'header.php';
?>
<script src="public/js/frmdangkyungvien.js"></script>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
             <div class="breadcrumb1 clearfix">

            <div class="itemtip"><a> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>
            
            <div class="itemtip"><a>Ứng viên đăng ký </a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>

        </div>
         <div class="boxchitiet">
             <div class="boxline row">
                         <div class="line"></div> 
                    </div>
               <div class="tieudetuyendung">Tạo sao phải tạo hồ sơ?</div> 
               
               <ul style="font-size: 16px">
                   <li>Nhà tuyển dụng nhanh chóng tìm thấy bạn khi họ có nhu cầu</li>
                    <li>Bạn có nhiều cơ hội hơn trong việc tìm kiếm việc làm đúng như mình mong muốn </li>
                    <li>Thông tin của bạn được đảm bảo và xác thực bởi vieclamcantho.com.vn, tạo niềm tin với nhà tuyển dụng </li>
                    <li>Dễ dàng nộp hồ sơ ứng tuyển khi bạn có nhu cầu </li>

               </ul>
         </div>
        </div>         
        <form action="authentic/ungvien/insert" method="post" class="form-horizontal" id="frmdangkyungvien"  enctype="multipart/form-data">
            <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="boxchitiet">
                <div class="boxline row">
                         <div class="line"></div> 
                    </div>
               <div class="tieudetuyendung tieudechinhsua">Thông tin đăng nhập</div>  
               
               <small class="col-md-12 text-right">Tắt gõ dấu tiếng việt khi nhập Email và mật khẩu</small> 

               <div class="form-group  has-feedback ">
      <label class="col-sm-3 control-label" for="inputWarning">Email đăng nhập</label>
    <div class="col-sm-9">
        <input name="email" type="email" required="" placeholder="Email này để nhận thông báo từ nhà tuyển dụng!"   class="form-control tendangnhap" onkeypress='validate(event)' id="inputWarning">
      <span class=" form-control-feedback"></span>
       <i id="kiemtratk"></i>
    </div>
  </div>
    <div class="form-group matkhau  has-feedback ">
    <label class="col-sm-3 control-label" for="inputWarning">Mật khẩu </label>
    <div class="col-sm-9">
        <input name="matkhau" type="text" required="" placeholder="Chỉ nhận các ký tự từ a - Z hoặc 0-9" class="form-control" onkeypress='validate2(event)' id="nhapmatkhau">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
              
            </div>
                        
                        
                          <div class="boxchitiet">
                              <div class="boxline row">
                         <div class="line"></div> 
                    </div>
               <div class="tieudetuyendung tieudechinhsua">Thông tin cá nhân</div>  
               
           
               <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="inputWarning">Họ và tên:</label>
    <div class="col-sm-9">
        <input name="ten" type="text" required="" class="form-control" id="inputWarning">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
           
               
        
           <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="inputWarning">SDT:</label>
    <div class="col-sm-9">
        <input name="sdt" type="text" required="" class="form-control" id="inputWarning">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
               
               
           <div class="form-group  has-feedback thongtin">
    <label class="col-sm-3 control-label" for="inputWarning">Địa chỉ:</label>
    <div class="col-sm-9">
        <input name="diachi" type="text" required="" class="form-control" id="inputWarning">
      <span class=" form-control-feedback"></span>
      <i></i>
    </div>
  </div>
             
               
            </div>
           
        </div>
                        <div class="col-md-3"></div>
            <div class="col-md-12">
                 <div align="center" class="boxchitiet" > 
                     <button  class="btn btn-success btn-lg"s type="submit" id="btndangky" ><i class="fa fa-user-plus"></i> ĐĂNG KÝ</button>
                    <div class="btn-group">
                         <a class="btn btn-danger disabled" style="height: 40px;opacity: 0.8;"><i class="fa fa-google-plus" style="width:16px; height:20px"></i></a>
                         <a class="btn btn-danger logingoogle" onclick="_loginempoyeegoogle()"  style="width:14em;height: 40px;"> Đăng nhập với Google</a>
                </div>
                <div class="loaddangkyungvien">
                <i class=" fa fa-circle-o-notch fa-spin thanhcong"></i><br><b>Vui lòng đợi</b>
                </div>
            </div>
            </div>
           

        </form>
    </div>
    
</div>
<?php require 'footer.php';?>

