<?php
require 'header.php';

if(checklogin(2))
{
$email=input($datauser['email']);
$kq=select("select * from emailungtuyen where email=:email",array("email"=>$email),$db);

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
                <a >Danh sách hồ sơ đã nộp</a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>
            <div class="itemtip"><a><?= $_COOKIE['email'] ?> </a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>

        </div>
        <div class=" show"  role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
        
          <h4 class="modal-title">Danh sách</h4>
        </div>
        <div class="modal-body">
    <div class="tieudetuyendung">Các công ty mà bạn đã nộp hồ sơ!</div>  
       <?php if(!empty($kq)) foreach ($kq as $value){ ?>
            <b>Tên công ty: </b> <span> <?= $value['tencongty']?> </span>
            <b> | Nộp ngày : </b> <span> <?= date_format(date_create($value['ngaygui']),'d/m/Y h:m:s')?> </span> | 
        
          
            <button value="<?= $value['id']; ?>" class="btn btn-info xemnoidung"> Xem </button>
<!--            Link: <a target="_blank" href="<?= $value['slugcongty'] ?>"> <?= $value['slugcongty'] ?> </a>-->
             <hr>
            <?php } else echo "Bạn chưa nộp hồ sơ ứng tuyển vào công ty nào cả"; ?>
        </div>
       
      </div>
      
    </div>
  </div>
    </div>
</div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nội dung Email</h4>

        </div>
        <div class="modal-body ketqua">
            
            
        </div>
           <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- hiển thị quản lý-->
      <button title="<?= $_COOKIE['ungvien'] ?>"  class=" btn btn-warning btn-md btn-showquanly btn-mobiquanly " ><i class="glyphicon glyphicon-user"></i></button>
   
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
          
               
           <h3 class="blue xinchao" > <?= $_COOKIE['email'] ?></h3>
                <a href="cap-nhat-thong-tin-ho-so.html" class="quanly"><i class="glyphicon glyphicon-pencil"></i> Cập nhật thông tin hồ sơ</a>
                               <a href="ho-so-da-nop.html" class="quanly"><i class="glyphicon glyphicon-list"></i> Danh sách công ty bạn đã ứng tuyển</a>

                    <a href="<?= URL."logout.php" ?>" class="quanly"><i class="glyphicon glyphicon-log-out"></i> <button name="thoat" class="btn btn-default">Thoát</button></a>
                
              
            </div>  
<script>
    $('.xemnoidung').click(function(){
       $('.ketqua').html("<i class=' fa fa-circle-o-notch fa-spin thanhcong'></i>");
       $("#myModal").modal("show");
       id=$(this).val();
       $.post(URL+"loadhosoungtuyen.php",{id:id},function(o){
           if(o.tinhtrang==1)
           {
           
               $('.ketqua').html(o.noidung);
               
           }
       },"JSON")
    
    })
</script>
<?php require 'footer.php'; }?>