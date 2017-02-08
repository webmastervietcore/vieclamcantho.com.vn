 <?php
 require_once 'db.php';

 ?>
<!doctype html>
<html lang="vi-VN">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="https://farm1.staticflickr.com/619/23261399371_5252d47cdc.jpg" property="og:image">
 <?php 
 if(isset($_GET['mavung']) && isset($_GET['manganh'])){
    $mavung=  input($_GET['mavung']);
    $sql="select * from vung where mavung=:mavung";
    $kq=select($sql, array('mavung'=>$mavung),$db);
    $kq1=$kq[0];
    $manganh=  input($_GET['manganh']);
    $sql="select * from nganhnghe where manganh=:manganh";
    $kq=select($sql, array('manganh'=>$manganh),$db);
    $kq2=$kq[0];

     ?>
 <title>TUYỂN DỤNG <?= mb_convert_case($kq2['tennganh'],MB_CASE_UPPER, "UTF-8"); ?> TẠI <?= mb_convert_case($kq1['tenvung'],MB_CASE_UPPER, "UTF-8"); ?></title>
 <meta name="description" content="Nhiều thông tin tuyển dụng <?= $kq2['tennganh'] ?> mới nhất, chất lượng. Tìm việc làm nhanh chóng tại <?= $kq1['tenvung'] ?>">

 <?php }else{
     if(isset($_GET['mavung'])){
     $mavung=  input($_GET['mavung']);
     $sql="select * from vung where mavung=:mavung";
    $kq=select($sql, array('mavung'=>$mavung),$db);
    $kq=$kq[0];
     ?>
 <title>VIỆC LÀM <?= mb_convert_case($kq['tenvung'],MB_CASE_UPPER, "UTF-8"); ?> | Tuyển dụng <?= $kq['tenvung'] ?></title>
 <meta name="description" content="Việc làm <?= $kq['tenvung'] ?> cung cấp thông tin tuyển dụng mới nhất, chất lượng. Đăng tin tuyển dụng miễn phí">
 <?php }else{if(isset($_GET['manganh'])){
    $manganh=  input($_GET['manganh']);
    $sql="select * from nganhnghe where manganh=:manganh";
    $kq=select($sql, array('manganh'=>$manganh),$db);
    $kq=$kq[0];
     ?>
 <title>TUYỂN DỤNG <?= mb_convert_case($kq['tennganh'],MB_CASE_UPPER, "UTF-8"); ?></title>
 <meta name="description" content="Nhiều thông tin tuyển dụng <?= $kq['tennganh'] ?> mới nhất, chất lượng. Đăng tin tuyển dụng miễn phí">
 
 <?php }else{ ?>
<meta name="description" content="Sàn giao dich việc làm Cần Thơ - tìm việc làm tại Cần Thơ mới nhất. Đăng tin tuyển dụng Cần Thơ miễn phí - Hàng ngàn hồ sơ ứng viên chất lượng.">
<title>VIỆC LÀM CẦN THƠ | Tuyển dụng cần thơ | Đăng tuyển miễn phí</title>
<meta name="keywords" content="VIỆC LÀM CẦN THƠ, TUYỂN DỤNG CẦN THƠ, VIỆC LÀM TẠI CẦN THƠ, TÌM VIỆC LÀM CẦN THƠ, ĐĂNG TIN TUYỂN DỤNG">

 <?php }}}?>





<link type="text/css" href="public/css/bootstrap.min.css" rel="stylesheet" />
<link type="text/css" href="public/css/style.css?ver=3" rel="stylesheet" />	
<link href="public/images/logo.ico" rel="shortcut icon" />
<link type="text/css" href="public/css/w3.css?ver=<?= VER ?>" rel="stylesheet" />
<link type="text/css" href="public/css/khung.css?ver=<?= VER ?>" rel="stylesheet" />
<link href="public/css/font-awesome.min.css?ver=<?= VER ?>" rel="stylesheet">
<link href="public/css/login.css?ver=<?= VER ?>" rel="stylesheet">
<script type="text/javascript" src="public/js/jquery-1.11.0.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/loctuyendung.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/hieuung.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/timkiem.js?ver=<?= VER ?>"></script>
<script src="public/js/function.js?ver=<?= VER ?>"></script>
<script src="public/js/enscroll-0.6.1.min.js?ver=<?= VER ?>"></script>
<script src="public/js/loctuyendung.js?ver=<?= VER ?>"></script>
<script src="public/js/dangnhappublic.js?ver=<?= VER ?>"></script>

<?php
// create token 
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['token']=$token;
?>


<style type="text/css">


</style>
<meta property="fb:app_id" content="885940871479537" />

</head>


<body style=" word-wrap: break-word;">



<?php  include_once("analyticstracking.php") ?>
	
    <nav class="menutop navbar navbar-default navbar-fixed-top " style="  background: white;
  box-shadow: 0px 0px 10px 1px;MAX-HEIGHT: 52px;">
              <div class="container"> 
              <a href="<?= URL ?>"> <img style="float:left;    height: 50px;" width="180" height="60" src="public/images/logo.gif" /> </a>
    <!-- Phần này sẽ hiên thị khi dùng dt-->
    <div class="navbar-header page-scroll" style="margin-top:15px">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Khi zoom</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
    </button>

                      
                </div>
    
    <!--End --> 
    <!-- Danh sách thành viên -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
     
                      <li  class="menu" id="menudangtintuyendung"><a href="<?= URL ?>dang-tin-tuyen-dung.html">
               <i class="glyphicon glyphicon-edit dangtintuyendung"></i> Đăng tuyển miễn phí</a>
       </li>
       <li class="menu" id="menuhosoungvien">
           <a href="<?= URL ?>ho-so-ung-vien.html"><i class="fa fa-file-text hosoungvien"></i> Hồ sơ ứng viên</a>
       </li>
 <?php if(!checklogin()){ ?>
          <li class="menu" id="menuhosoungvien">
           <a  data-toggle="modal" data-target="#modeldangnhap" href="#"><i class="glyphicon glyphicon-log-in dangnhap"></i> Đăng nhập</a>
       </li>            
         
  <!-- Modal -->
 
       
       <?php }else{?>
  
 <?php
 $token=createhash("sha256",$datauser['email'],HASH_KEY);
 if(checklogin(1)){ ?>
<li class="dropdown menu">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="dropdown-header">Xin chào nhà tuyển dụng<br> <?= $datauser['email'] ?></li>
          <li><a href="quan-ly-bai-viet.html?token=<?=$token?>"><i class="glyphicon glyphicon-list-alt"></i> Quản lý bài viết</a></li>
          <li><a href="quan-ly-thong-tin.html?token=<?=$token?>"><i class="fa fa-info"></i> Quản lý thông tin</a></li>
          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li> 
        </ul>
      </li>
 <?php }else{ ?>
      
      <li class="dropdown menu">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-header">Xin chào ứng viên<br> <?= $datauser['email'] ?></li>
          <li><a href="cap-nhat-thong-tin-ho-so.html"><i class="fa fa-info-circle"></i> Cập nhật thông tin hồ sơ</a></li>
          <li><a href="ho-so-da-nop.html"><i class="fa fa-list-alt"></i> Danh sách công ty đã ứng tuyển</a></li>
          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li> 
        </ul>
      </li>
      
 <?php }?>
       <?php } ?>
             
      </ul>
      
                </div>
    <!-- kết thúc navbar-collapse --> 
  </div>
            </nav>
 <?php if(!isset($datauser['email'])){ ?>
        <div class="modal fade" id="modeldangnhap" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title tilepublic">Chọn đối tượng</h4>
        </div>
        <div class="modal-body">
            <div class="chonlua">
                <div><button class="btn btn-warning nhatuyendungdangnhap">NHÀ TUYỂN DỤNG ĐĂNG NHẬP</button> </div>
                <div><button class="btn btn-info ungviendangnhap">ỨNG VIÊN ĐĂNG NHẬP</button> </div>
            </div>
            <form id="frmdangnhappublic" action="dangnhapungvien.php" class="form-horizontal">
    <br>
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Email đăng nhập:</label>
    <div class="col-sm-7">
        <input id="emailpublic" required="" type="email" class="form-control" placeholder="Nhập email">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="email">Mật khẩu:</label>
    <div class="col-sm-7">
        <input  id="matkhaupublic"  required="" type="password" class="form-control" placeholder="Nhập mật khẩu">
    </div>
  </div>
    
          <div align="center">
              <div style="margin-top: 15px">  
                  <button  class="btn" style="width:150px" type="submit" id="btndangnhappublic" >
           <i class="glyphicon glyphicon-log-in"></i> Đăng Nhập
                  </button>
                   <div class="btn-group">
                         <a class="btn btn-danger  disabled" style="opacity: 0.8;"><i class="fa fa-google-plus"></i></a>
                         <a class="btn btn-danger logingoogle" id="loginpublicgoogle" onclick="_loginempoyeegoogle()"> Đăng nhập với Google</a>
                     </div>
              </div>
             <div class="loaddangnhapublic">                                    
                                    <i class=" fa fa-circle-o-notch fa-spin thanhcong"></i><br><b>Vui lòng đợi</b>
                                    </div>
 <div align="center" id='ketquapublic'></div>
        
          </div>
    <br>
    <label class="text-left">
        <a  style="color: #D31C1C" id="quenmatkhaupublic"  href="#">Bạn quên mật khẩu?
        </a>
    </label>
   <div class="alert alert-danger boxtimlaimatkhaupublic">
              <label class="control-label">Tìm lại mật khẩu</label>
              <input onkeypress='validate(event)' class="form-control"  id="inputtimlaimatkhaupublic" type="text" placeholder="Nhập email đăng nhập">
              <small>Nhớ tắt gõ dấu tiếng việt!</small>
              <i class="loadtimlaimatkhaupublic fa fa-circle-o-notch fa-spin thanhcong"></i>
              <button type="button" class="btn btn-warning btntimlaimatkhaupublic">Gửi</button>
          </div>
     <label class="text-left">
        <a style="color: #0091ea" id="dangkypublic"  href="#">Đăng ký tài khoản mới?
        </a>
     </label>
        </form>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
    </div>
      </div> 
    </div>
       <?php } ?>
       <div class="jumbotron" style="background-image:url('public/images/line.jpg')" >
          <div class="panel-body" style="margin:0px;padding:0px"> 
    <div class="col-md-8 " id="quangcao" style="margin-left:10px" >     

      <!--       <marquee direction="LEFT">
                <h3 style=" font-family: -webkit-body;">
 VIỆC LÀM MỚI NHẤT - VIỆC LÀM CHẤT LƯỢNG - VIỆC LÀM LUÔN CÒN THỜI HẠN NHẬN HỒ SƠ

                </h3>
</marquee> --> 
       </div>

    
     <div class=" main_menu" style="float:right">
    
      <ul >
                    <li>
              

 
  <div  id="search">
<input class="form-control" name="q" type="text" size="40" id="nhaptim" placeholder="Tìm công ty,địa chỉ,nghề nghiệp" />
  </div>

                        <ul>
                        <div id="ketquatim">
                      
                     

                            </div>
                        </ul>
                    </li>
                    </ul>
                    
                    
             
                    
    
     </div >
     
        </div>
     
              </div>
       
<div style="position:fixed;top:80%;right:1px;cursor: pointer;z-index:100000"><div id="trovetop"  style="font-size:25px;color: #349AC0" class="glyphicon glyphicon-circle-arrow-up"></div></div>
<div style="position:fixed;top:88%;right:1px;cursor: pointer;z-index:100000"><div id="trovebot"  style="font-size:25px;color:#349AC0" class="glyphicon glyphicon-circle-arrow-down"></div></div>

		<!-- Example row of columns -->
     <!--   <div id="right" style=" position:fixed;right:0px;height:100%;width:50px;background-color:rgba(255,255,255,1);z-index:1000">

       <div id="right" style="margin-top:100px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-user"></span></div>
              <div id="right" style="margin-top:200px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-arrow-left"></span></div>
                     <div id="right" style="margin-top:10px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-arrow-right"></span></div>
       <a href="#" title="Trở về top">    <div id="right" style="margin-top:10px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-circle-arrow-up"></span></div></a>

         </div>
		-->
            

              
<?php $_SESSION['daxem']=0; ?>
      
			  