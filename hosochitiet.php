<?php
 require_once 'db.php';
 $_SESSION['nowpage']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 ?>
<!doctype html>
<html lang="vi-VN">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <?php

$email= input($_GET['id']);

$sql = "select * from hosoungvien where email=:email";
$kq = select($sql, array('email' => $email), $db);
if(!empty($kq))
{
$thongtin = $kq[0];


$sql = "select * from hinhanhungvien where email=:email and loai=:loai";
$anhbangcap = select($sql, array('email' =>$email, 'loai' => 2), $db);
$sql = "select * from nganhungvien,nganhnghe where email=:email and nganhungvien.manganh=nganhnghe.manganh";
$nganhungvien = select($sql, array('email' =>$email), $db);
$sql = "select * from vungungvien,vung where email=:email and vungungvien.mavung=vung.mavung";
$vungungvien = select($sql, array('email' => $email), $db);

if(!isset($_SESSION['daxemungvien']))
    $_SESSION['daxemungvien']=false;

if($_SESSION['daxemungvien']==false)
{
$daxem=$thongtin['daxem'] +1;
update("hosoungvien", array("daxem"=>$daxem),"email=:email",array("email"=>$email),$db);
$_SESSION['daxemungvien']=true;
}

?>


        <meta name="description" content="<?php echo  xulyxh(output($thongtin['vitrimongmuon'])). " / " .xulyxh(output($thongtin['email'])). " / " . xulyxh(output($thongtin['diachi'])). ' / ' . xulyxh(output($thongtin['sdt'])); ?> ">
        <meta content="<?php echo xulyxh(output($thongtin['ten'])); ?>" property="og:title">
            <meta property="og:description"  content="<?php echo  xulyxh(output($thongtin['vitrimongmuon'])). " / " .xulyxh(output($thongtin['email'])). " / " . xulyxh(output($thongtin['diachi'])). ' / ' . xulyxh(output($thongtin['sdt'])); ?> " >
            <title><?php echo xulyxh(output($thongtin['ten'])); ?></title>

            <?php if ($thongtin['avatar'] !='') { ?>
                <meta content="<?= URL ?><?php echo "upload/avatar/".$thongtin['avatar']; ?>" property="og:image">

            <?php } else { ?>

                <meta content="https://farm1.staticflickr.com/619/23261399371_5252d47cdc.jpg" property="og:image">

            <?php } ?>


 <meta name="viewport" content="width=device-width, initial-scale=1">

<link type="text/css" href="public/css/bootstrap.css?ver=<?= VER ?>" rel="stylesheet" />
<link href="public/images/logo.ico" rel="shortcut icon" />
<link type="text/css" href="public/css/w3.css?ver=<?= VER ?>" rel="stylesheet" />
<link href="public/css/font-awesome.min.css?ver=<?= VER ?>" rel="stylesheet">
<link type="text/css" href="public/css/style.css?ver=2<?= VER ?>" rel="stylesheet" />	
<script type="text/javascript" src="public/js/jquery-1.11.0.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/hieuung.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/timkiem.js?ver=<?= VER ?>"></script>
<script src="public/js/function.js?ver=<?= VER ?>"></script>
<script src="public/js/nophoso.js?ver=<?= VER ?>"></script>
<script src="public/js/dangnhapungvienchitiet.js?ver=<?= VER ?>"></script>
<script src="public/js/dangkyungvienchitiet.js?ver=<?= VER ?>"></script>
<script src="public/js/enscroll-0.6.1.min.js?ver=<?= VER ?>"></script>
<script src="public/js/dangnhappublic.js?ver=<?= VER ?>"></script>
<script language="javascript" src="public/tienich/ckeditor.js?ver=<?= VER ?>" type="text/javascript"></script>
    <!--    <script>
            
            $(function () {
      $('.datepicker').datepicker({ format: "dd//mm/yyyy" }).on('changeDate', function (ev) {
        $(this).datepicker('hide');
      });
    });

            </script-->


            

            <meta property="og:locale" content="vi_VN">

            <meta property="fb:app_id" content="885940871479537" />

            <meta property="article:publisher" content="https://www.facebook.com/vieclamcantho.com.vn">

            <meta property="og:type" content="website">
            <meta property="og:site_name" content="Vieclamcantho">
            <meta property="fb:admins" content="100005194575333">

        </head>


        <body style=" word-wrap: break-word;">


            <?php include_once("analyticstracking.php") ?>


            <script type="text/javascript">
                window.___gcfg = {
                    lang: 'vi',
                    parsetags: 'onload'
                };

                (function () {
                    var po = document.createElement('script');
                    po.type = 'text/javascript';
                    po.async = true;
                    po.src = 'https://apis.google.com/js/plusone.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(po, s);
                })();
            </script>




            <div id="fb-root"></div>

            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '885940871479537',
                        xfbml: true,
                        version: 'v2.5'
                    });
                };

                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/en_US/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>




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
               <i class="glyphicon glyphicon-edit dangtintuyendung"></i> Đăng tin miễn phí</a>
       </li>
       <li class="menu" id="menuhosoungvien">
           <a href="<?= URL ?>ho-so-ung-vien.html"><i class="fa fa-file-text hosoungvien"></i> Hồ sơ ứng viên</a>
       </li>
 <?php if(!isset($_COOKIE['email'])){ ?>
          <li class="menu" id="menuquanly">
           <a  data-toggle="modal" data-target="#modeldangnhap" href="#"><i class="glyphicon glyphicon-log-in dangnhap"></i> Đăng nhập</a>
       </li>            
         
  <!-- Modal -->
 
       
       <?php }else{?>
  
 <?php
 $token=createhash("sha256",$_COOKIE['email'],HASH_KEY);
 if($_COOKIE['type']==1){ ?>
  
<li class="dropdown menu">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li class="dropdown-header">Xin chào nhà tuyển dung<br> <?= $_COOKIE['email'] ?></li>
          <li><a href="quan-ly-bai-viet.html?token=<?=$token?>"><i class="glyphicon glyphicon-list-alt"></i> Quản lý bài viết</a></li>
          <li><a href="quan-ly-thong-tin.html?token=<?=$token?>"><i class="glyphicon glyphicon-user"></i> Quản lý thông tin</a></li>
          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Thoát</a></li> 
        </ul>
      </li>
 <?php }else{ ?>
   
      <li class="dropdown menu">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li class="dropdown-header">Xin chào ứng viên<br> <?= $_COOKIE['email'] ?></li>
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

<?php if(!isset($_COOKIE['email'])){ ?>
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
        <input  id="matkhaupublic"  required="" type="text" class="form-control" placeholder="Nhập mật khẩu">
    </div>
  </div>
    
          <div align="center">
              <div style="margin-top: 15px">  
                  <button  class="btn  " style="width:150px" type="submit" id="btndangnhappublic" >
           <i class="glyphicon glyphicon-log-in"></i> Đăng Nhập
                  </button>
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
            <div class="jumbotron teal" >
                <div class="panel-body" style="margin:0px;padding:0px"> 
                    <div class="col-md-8 " id="quangcao" style="margin-left:10px" >       

                    </div>


                    <div class=" main_menu" style="float:right">

                        <ul >
                            <li>



                                <form   id="search">
                                    <input class="form-control" name="q" type="text" size="40" id="nhaptim" placeholder="Tìm tên công ty,địa chỉ,nghề nghiệp..." />
                                </form>

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
            <div style="position:fixed;top:88%;right:1px;cursor: pointer;z-index:100000"><div id="trovebot"  style="font-size:25px;color: #349AC0" class="glyphicon glyphicon-circle-arrow-down"></div></div>
            <!-- Example row of columns -->
            <!--   <div id="right" style=" position:fixed;right:0px;height:100%;width:50px;background-color:rgba(255,255,255,1);z-index:1000">
       
              <div id="right" style="margin-top:100px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-user"></span></div>
                     <div id="right" style="margin-top:200px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-arrow-left"></span></div>
                            <div id="right" style="margin-top:10px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-arrow-right"></span></div>
              <a href="#" title="Trở về top">    <div id="right" style="margin-top:10px"> <span style="border:solid 1px;font-size:30px;border-radius:100%;padding:10px" class="glyphicon glyphicon-circle-arrow-up"></span></div></a>
       
                </div>
            -->

            <input class="hidden" id="current_page"  value="<?php echo isset($_SESSION['current_page']) ? $_SESSION['current_page'] : '1' ?>"> 

            <input class="hidden" id="segment"  value="<?php echo isset($_SESSION['segment']) ? $_SESSION['segment'] : '1' ?>"> 
            <input class="hidden" id="mavung"  value="<?php echo isset($_SESSION['mavung']) ? $_SESSION['mavung'] : 'all' ?>"> 

            <input class="hidden" id="manganh"  value="<?php echo isset($_SESSION['manganh']) ? $_SESSION['manganh'] : 'all' ?>"> 




<?php




$trinhdohocvan = array(
    "0"=>"Đang cập nhật",
    "1" => "Trên đại học",
    "2" => "Đại học",
    "3" => "Cao đẳng",
    "4" => "Trung cấp",
    "5" => "Chứng chỉ nghề",
    "6" => "Không qua đào tạo"
);
$loaitotnghiep = array(
    "0"=>"Đang cập nhật",
    "1" => "Xuất sắc",
    "2" => "Giỏi",
    "3" => "Khá",
    "4" => "Trung bình khá",
    "5" => "Trung bình",
);
$sonamkinhnghiem = array(
    "0"=>"Đang cập nhật",
    "1" => "Chưa có kinh nghiệm",
    "2" => "1 năm",
    "3" => "2 năm",
    "4" => "3 năm",
    "5" => "4 năm",
    "6" => "5 năm",
    "7" => "Trên 5 năm",
);
$ngoaingu = array(
    "1" => "Tốt",
    "2" => "Khá",
    "3" => "Trung bình",
    "4" => "Kém",
        )
?>
<style>
    i{
        color: #7F147B
    }
</style>
<script>

  $('#menuhosoungvien').addClass('active');

</script>
<script src="public/js/capnhatthongtinhoso.js"></script>
<link href="public/css/datepicker.css" rel="stylesheet" />
<!--<link href="public/css/lightbox.css" rel="stylesheet" />-->
<script src="public/js/bootstrap-datepicker.js"></script>
<script src="public/js/inputhtml5.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="public/css/magnific-popup.css">
<script type="text/javascript" src="public/js/jquery.magnific-popup.min.js"></script>


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
                <a href="<?= URL ?>ho-so-ung-vien.html" > Hồ sơ ứng viên </a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>
            <div class="itemtip"><a><?= $thongtin['email'] ?> </a>
                <span class="arrow">
                    <span></span>
                </span>
            </div>

        </div>
            
  </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">THÔNG TIN CÁ NHÂN</div>
                <div class="panel-body boxtongquatchitiet">
                    <div class="boxhosoungvien clearfix">
                        <div class="hinhungvien ">
<?php if ($thongtin['avatar'] == '') { ?>
                             <img class="img-responsive img-thumbnail" src="<?= URL ?>public/images/avatardefault.png">
                            <?php } else { ?>
                             <a  title="<?= $thongtin['ten'] ?>"  href="<?= URL . "upload/avatar/" . $thongtin['avatar'] ?>" >
                                 <img class="img-responsive img-thumbnail" src="<?= URL . "upload/avatar/" . $thongtin['avatar'] ?>">
                             </a>
                                 <?php } ?>
                        </div>
                        <div class="thongtinungvien">
                            <h3 class="tenungvien"> <?= output($thongtin['ten']) ?></h3>
                            
                            <?php if(kiemtranullcheck($thongtin['muctieunghenghiep'])){ ?>
                            <div class="boxmuctieu scrollbox2">
<?= $thongtin['muctieunghenghiep'] ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="boxthongtinchitiet clearfix">
                        <div>
                            <b><i class="glyphicon glyphicon-envelope"></i>Email</b>: <?= kiemtranull($thongtin['email']) ?>
                        </div>
                        <div>
                            <b><i class="fa fa-transgender"></i>Giới tính</b>: <?php
                            if(kiemtranullcheck($thongtin['gioitinh']))
                                {
                                echo $thongtin['gioitinh']==1?"NAM":"NỮ";
                                        
                                }else
                                    echo "Đang cập nhật" ;
                                    ?>
                        </div> 
                        <div>
                            <b><i class="glyphicon glyphicon-calendar"></i>Ngày sinh</b>:
 <?=                          kiemtranullcheck($thongtin['ngaysinh'])==TRUE?date_format( date_create($thongtin['ngaysinh']),'d/m/Y'):"Đang cập nhật";?>
                        </div>
                        <div>
                            <b><i class="glyphicon glyphicon-phone"></i>SDT</b>: <?= kiemtranull($thongtin['sdt']) ?>
                        </div>
                        <div>
                            <b><i class="glyphicon glyphicon-map-marker"></i>Địa chỉ</b>: <?= kiemtranull($thongtin['diachi']) ?>
                        </div>
                          <div>
                              <b><i class="fa fa-facebook"></i>acebook</b>: <a  target="<?= kiemtranullcheck($thongtin['linkfb'])==true?"_blank":"" ?>" href="<?= kiemtranullcheck($thongtin['linkfb'])==true?$thongtin['linkfb']:"#" ?>" rel="nofollow"> <?= kiemtranull($thongtin['linkfb']) ?> </a>
                        </div>
                    </div>
                </div> 
            </div>
<!--           end thong tin ca nhan-->

<div class="panel panel-info">
                <div class="panel-heading">TRÌNH ĐỘ VÀ BẰNG CẤP</div>
                <div class="panel-body boxtongquatchitiet">
                    <div class="boxthongtinchitiet">
                       <div>
                            <b><i class="fa fa-graduation-cap"></i>Trình độ học vấn</b>:
 <?php
                           if(kiemtranullcheck($thongtin['trinhdohocvan']))
                               echo $trinhdohocvan[$thongtin['trinhdohocvan']];
                           else
                               echo "Đang cập nhật";
                            ?>
                   </div>
                        <div>
                            <b><i class="fa fa-trophy"></i>Loại tốt nghiệp</b>:
 <?php
                           if(kiemtranullcheck($thongtin['loaitotnghiep']))
                               echo $loaitotnghiep[$thongtin['loaitotnghiep']];
                           else
                               echo "Đang cập nhật";
                            ?>
                   </div> 
                        <div>
                            <b><i class="fa fa-bookmark"></i>Tên bằng cấp</b>: <?= kiemtranull($thongtin['tenbangcap']) ?>
                        </div>
                         <div>
                            <b><i class="fa fa-university"></i>Đơn vị đào tạo</b>: <?= kiemtranull($thongtin['donvidaotao']) ?>
                        </div>
                        
                         <div>
                            <b><i class="fa fa-calendar-check-o"></i>Số năm kinh nghiệm</b>:
 <?php
                           if(kiemtranullcheck($thongtin['sonamkinhnghiem']))
                               echo $sonamkinhnghiem[$thongtin['sonamkinhnghiem']];
                           else
                               echo "Đang cập nhật";
                            ?>
                   </div>
                        
                    </div>
                    <?php if(kiemtranullcheck($thongtin['tunglamviec'])){ ?>
                        <div>
                            <b><i class="fa fa-suitcase"></i>Từng làm việc tại</b>:
                            <div class="boxmuctieu scrollbox2"> 
                           <?= kiemtranull($thongtin['tunglamviec']) ?>
                            </div>
                        </div>
                        <?php  } ?>
                </div>
 </div>
<!--end trinh do va bang cap-->
             <div class="panel panel-info">
                <div class="panel-heading">MONG MUỐN TÌM VIỆC</div>
                <div class="panel-body boxtongquatchitiet">
                     <div class="boxthongtinchitiet">
                   <div>
                            <b><i class="glyphicon glyphicon-user"></i>Vị trí</b>: <?= kiemtranull($thongtin['vitrimongmuon']) ?>
                   </div> 
                       <div>
                            <b><i class="glyphicon glyphicon-usd"></i>Mức lương</b>: <?= kiemtranull($thongtin['mucluongmongmuon']) ?>
                   </div> 
                       
                    <div>
                            <b><i class="glyphicon glyphicon-briefcase"></i>Chuyên môn</b>: <?php 
                               if(!empty($nganhungvien)){
                                                        foreach ($nganhungvien as $key=>$value)
                                                        {
                                                            echo $value['tennganh'].(isset($nganhungvien[$key+1])?" , ":"");
                                                        }
                               }
                               else
                                   echo "Đang cập nhật";
                            ?>
                   </div>
                    <div>
                            <b><i class="glyphicon glyphicon-map-marker"></i>Khu vực</b>: <?php 
                            
                              if(!empty($vungungvien)){
                                                        foreach ($vungungvien as $key=>$value)
                                                        {
                                                            echo $value['tenvung'].(isset($vungungvien[$key+1])?" - ":"");
                                                        }
                                                         }
                               else
                                   echo "Đang cập nhật";
                            ?>
                   </div>
                     </div>
                </div>
             </div>
<!--           end mong muon tim viec-->
        </div>

            <div class="col-md-6">

                  <div class="panel panel-info">
                <div class="panel-heading">NGOẠI NGỮ</div>
                <div class="panel-body boxtongquatchitiet">
                   <div>
                  <b><i class="fa fa-commenting-o"></i>Ngoại ngữ</b>: <?= kiemtranull($thongtin['ngoaingu']) ?>
                   </div>
                    <div>
                        <table class="table table-responsive">
                             <thead>
      <tr>
        <th>Nghe</th>
        <th>Nói</th>
        <th>Đọc</th>
        <th>Viết</th>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= kiemtranullcheck($thongtin['ngoaingunghe'])==TRUE?$ngoaingu[$thongtin['ngoaingunghe']]:"Đang cập nhật" ?></td>
                        <td><?= kiemtranullcheck($thongtin['ngoaingunoi'])==TRUE?$ngoaingu[$thongtin['ngoaingunoi']]:"Đang cập nhật" ?></td>
                           <td><?= kiemtranullcheck($thongtin['ngoaingudoc'])==TRUE?$ngoaingu[$thongtin['ngoaingudoc']]:"Đang cập nhật" ?></td>
                              <td><?= kiemtranullcheck($thongtin['ngoainguviet'])==TRUE?$ngoaingu[$thongtin['ngoainguviet']]:"Đang cập nhật" ?></td>

        </tr>
    </tbody>
                        </table>
                    </div>
                </div>
                  </div>
                
                <div class="panel panel-info">
                <div class="panel-heading">TIN HỌC</div>
                <div class="panel-body boxtongquatchitiet">
                    <div>
                        <table class="table table-responsive">
                             <thead>
      <tr>
      <th>Word</th>
        <th>Excel</th>
        <th>Power Point</th>
        <th>Photoshop</th>
      </tr>
    </thead>
    <tbody>
        <tr>
             <td><?= kiemtranullcheck($thongtin['tinhocword'])==TRUE?$ngoaingu[$thongtin['tinhocword']]:"Đang cập nhật" ?></td>
             <td><?= kiemtranullcheck($thongtin['tinhocexcel'])==TRUE?$ngoaingu[$thongtin['tinhocexcel']]:"Đang cập nhật" ?></td>
             <td><?= kiemtranullcheck($thongtin['tinhocpp'])==TRUE?$ngoaingu[$thongtin['tinhocpp']]:"Đang cập nhật" ?></td>
             <td><?= kiemtranullcheck($thongtin['tinhocphotoshop'])==TRUE?$ngoaingu[$thongtin['tinhocphotoshop']]:"Đang cập nhật" ?></td>
        </tr>
    </tbody>
                        </table>
                    </div>
                    
                    <?php if(kiemtranullcheck($thongtin['tinhockhac'])){ ?>
                        <div>
                            <b><i class="fa fa-laptop"></i>Phần miềm khác</b>:
                            <div class="boxmuctieu scrollbox2"> 
                           <?= kiemtranull($thongtin['tinhockhac']) ?>
                            </div>
                        </div>
                        <?php  } ?>
                </div>
                  </div>
                
                <div class="panel panel-info">
                <div class="panel-heading">ẢNH CÁ NHÂN VÀ BẰNG CẤP</div>
                <div class="panel-body boxtongquatchitiet">
                    
                    
                 
    <div class="col-sm-12 pre-scrollable">
        <div class="listimage row">
            
             <?php
             if(!empty($anhbangcap))
             {
                   foreach ($anhbangcap as $value)
                   {
            ?>
            <a title="<?= $value['tenanh']; ?>" class="image-item showimage"
            href="upload/fileungvien/<?= $value['tenanh'] ?>"
              style="background-image: url('upload/fileungvien/<?= $value['tenanh'] ?>');">
           </a>
             <?php } }else echo "Đang cập nhật";?>
            
       </div>
        
    <script>
$(function(){
  $('.listimage').magnificPopup({
    delegate: 'a',
    type: 'image',
    image: {
      cursor: null,
      titleSrc: 'title'
    },
    gallery: {
      enabled: true,
      preload: [0,1], // Will preload 0 - before current, and 1 after the current image
      navigateByImgClick: true
		}
  });
  $('.hinhungvien').magnificPopup({
    delegate: 'a',
    type: 'image',
    image: {
      cursor: null,
      titleSrc: 'title'
    },
    gallery: {
      enabled: true,
      preload: [0,1], // Will preload 0 - before current, and 1 after the current image
      navigateByImgClick: true
		}
  });
});
</script>
  </div> 
                </div>
                </div>
                <div class="panel panel-info">
                <div class="panel-heading">FILE CV</div>
                <div class="panel-body boxtongquatchitiet">
                    <?php if(kiemtranullcheck($thongtin['filecv'])){?>
                    <div class="boxfilecv " >
                        <i class="fa fa-file-text-o" style="color: white"></i> 
                        <b id="namefilecv"> File-CV-<?= $thongtin['ten']?>.<?= getExtension($thongtin['filecv']) ?></b> 
            <a target="blank" href="https://docs.google.com/viewer?url=<?= URL."upload/filecv/".$thongtin['filecv'] ?>" style="color: white">  <i class="glyphicon glyphicon-eye-open thanhcong" style="color: white"></i> XEM NGAY</a>
            <br>Hoặc <a target="blank" style="color: white" href="<?= URL."upload/filecv/".$thongtin['filecv'] ?>"> Tải về <i class="glyphicon glyphicon-download thanhcong " style="color: #DCFE4F"></i> </a>
            
                    </div>
                    <?php }else echo "Đang cập nhật"; ?>
                    </div>
                   
                   
 </div>
                
                
            </div>
<!--        <script src="public/js/lightbox.dist.js"></script>-->
             <!--            end col-main-->
 <script>
               $('.scrollbox2').enscroll({
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
    });
            </script>
            
            <div class="col-md-12">
                <div class="panel panel-info">
                <div class="panel-heading">Chia sẻ hồ sơ và bình luận</div>
                <div class="panel-body boxtongquatchitiet">
                    <div class="col-md-6">
                        <span class="fb-like" data-href="<?php echo URL."ho-so-chi-tiet-".$thongtin['email'] ?>.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>
 <span style="margin-left: 20px;" class="fb-send" data-href="<?php echo URL."ho-so-chi-tiet-".$thongtin['email'] ?>.html"></span>
 <span class="g-plus" data-action="share"  data-annotation="none" ></span>
 <style>
     #___plus_0
     {
          vertical-align: middle !important;
     }
.fb_ltr
{
z-index:0;
}
 </style>  
                    </div>

   <div class="col-md-6">
      <div    class="fb-comments fb-like" data-href="<?php echo URL."ho-so-chi-tiet-".$thongtin['email'] ?>.html"
                                    data-colorscheme="light" data-numposts="5" data-width="100%" ></div>
   </div>         
                    </div>
               </div>
            </div>      
    </div>
</div>

         
<?php } else header("Location: error.html");?>
<?php require 'footer.php'; ?>

