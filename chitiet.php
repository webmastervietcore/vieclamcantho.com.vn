 <?php
 require_once 'db.php';
 $_SESSION['nowpage']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 if(!isset($_SESSION['daxem']))
     $_SESSION['daxem']=0;
 // xác thực
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['token']=$token;
 ?>
<!doctype html>
<html lang="vi-VN">
    <head>

        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <?php
        $matuyendung1 = input($_GET['matuyendung']);
        $sql = "select *,date(now()) as hientai from tuyendung  where matuyendung=:matuyendung";
        $kq=select($sql,array('matuyendung'=>$matuyendung1),$db);
        if (!empty($kq)) {
            $thongtinchitiet=$kq[0];
            ?>


        <meta name="description" content="<?php echo  xulyxh(output($thongtinchitiet['vitri'])). " / " .xulyxh(output($thongtinchitiet['diachi'])). " / " . xulyxh(output($thongtinchitiet['email'])). ' / ' . xulyxh(output($thongtinchitiet['sdt'])); ?> ">
        <meta content="<?php echo xulyxh(output($thongtinchitiet['tendonvi'])); ?>"  property="og:site_name">
        <meta content="<?php echo xulyxh(output($thongtinchitiet['tendonvi'])); ?>" property="og:title">
            <meta property="og:description"  content="<?php echo  xulyxh(output($thongtinchitiet['vitri'])). " / " .xulyxh(output($thongtinchitiet['diachi'])). " / " . xulyxh(output($thongtinchitiet['email'])). ' / ' . xulyxh(output($thongtinchitiet['sdt'])); ?> " >
            <title><?php echo xulyxh(output($thongtinchitiet['tendonvi'])); ?></title>

            <?php if ($thongtinchitiet['logo'] != LOGOMACDINH) { ?>
                <meta content="<?= URL ?><?php echo SHARE.$thongtinchitiet['logo']; ?>" property="og:image">

            <?php } else { ?>

                <meta content="https://farm1.staticflickr.com/619/23261399371_5252d47cdc.jpg" property="og:image">

            <?php } ?>


 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link type="text/css" href="public/css/bootstrap.min.css?ver=<?= VER ?>" rel="stylesheet" />
<link href="public/images/logo.ico" rel="shortcut icon" />
<link type="text/css" href="public/css/w3.css?ver=<?= VER ?>" rel="stylesheet" />
<link href="public/css/font-awesome.min.css?ver=<?= VER ?>" rel="stylesheet">
<link type="text/css" href="public/css/style.css?ver=3<?= VER ?>" rel="stylesheet" />	
<script type="text/javascript" src="public/js/jquery-1.11.0.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/bootstrap.min.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/hieuung.js?ver=<?= VER ?>"></script>
<script type="text/javascript" src="public/js/timkiem.js?ver=<?= VER ?>"></script>
<script src="public/js/function.js?ver=<?= VER ?>"></script>
<script src="public/js/nophoso.js?ver=<?= VER ?>"></script>
<script src="public/js/enscroll-0.6.1.min.js?ver=<?= VER ?>"></script>
<script src="public/js/dangnhappublic.js?ver=<?= VER ?>"></script>
<script src="public/js/dangkydangnhapungvienchitiet.js"></script>
            <meta property="og:locale" content="vi_VN">
            <meta property="fb:app_id" content="885940871479537" />
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
               <i class="glyphicon glyphicon-edit dangtintuyendung"></i> Đăng tuyển miễn phí</a>
       </li>
       <li class="menu" id="menuhosoungvien">
           <a href="<?= URL ?>ho-so-ung-vien.html"><i class="fa fa-file-text hosoungvien"></i> Hồ sơ ứng viên</a>
       </li>
 <?php if(!checklogin()){ ?>
          <li class="menu" id="menuquanly">
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
                  <button  class="btn  " style="width:150px" type="submit" id="btndangnhappublic" >
           <i class="glyphicon glyphicon-log-in"></i> Đăng Nhập
                  </button>
                       <div class="btn-group">
                         <a class="btn btn-danger  disabled" style="opacity: 0.8;"><i class="fa fa-google-plus"></i></a>
                         <a class="btn btn-danger logingoogle" onclick="_loginempoyeegoogle()"> Đăng nhập với Google</a>
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
<?php 
// xac thuc
$token="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$_SESSION['tokendangnhapungvien']=$token;
$_SESSION['tokendangkyungvienajax']=$token;
?>
            
            
            <?php
         
            $sql = "select luotxem from tuyendung where matuyendung=:matuyendung";
             $kq=  select($sql,array("matuyendung"=>$matuyendung1),$db);

            $luotxem=$kq[0]['luotxem'];
            $temp=$_SESSION['daxem'];
            if ( "$temp" != $matuyendung1) {
                $luotxem=$kq[0]['luotxem'] + 2;
                $data['luotxem']= $luotxem;
               
                update("tuyendung",$data,"matuyendung=:matuyendung",array('matuyendung'=>$matuyendung1),$db);
                $_SESSION['daxem'] = $matuyendung1;
            }
            ?>

            <div id="main" class="panel-body" style="margin-top:10px;padding:0px" > 
                <div class="col-md-1">
                </div>
                <div class="col-md-8 boxchitiettuyendung" style="word-wrap: break-word;">
                    
                    
                    <div class="panel panel-default " style="background-color: #FAFAFA;">
                        <div class="panel-heading teal">
                          <div class="breadcrumb1 clearfix" style="    margin:0px 0px 10px 0px">
              
                             <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
       
     <div class="itemtip">
            <a> <?= $thongtinchitiet['tendonvi'] ?></a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
        
            

            </div> 
                        </div>
                        
                        <div class="panel-body" style="padding-top: 0px;" > 
                            <div class="row boxchitiet boxtieude"  style="    margin-left: -15px;
    margin-right: -15px;
                                 <?php if($thongtinchitiet['bk']!=0){ ?>
                                 background-image: url('public/css/bk<?= $thongtinchitiet['bk'] ?>.png')
                                 <?php } ?>
                                 ">
                                
                                <div  id="logochitiet" style="">
                                    <img style="" class="img-responsive "  src="<?= LOGO.$thongtinchitiet['logo'] ?>" />
                                    <input id="codecompany" value='<?= $matuyendung1 ?>' class="hidden">
                                </div> 
                                <div  id="paneltieudechitiet" >

                                    <h1  align="center" class="tieudechitiet" ><?php echo $thongtinchitiet['tendonvi']; ?>
                                    
                                    </h1>

                                </div>
                            </div>
                            <div class="row  boxdongchitiet">
                                <div class="thongtintuyendung">
                                 <div class=""> 
                                 
                                   <b class="td"><b class="glyphicon glyphicon-time" ></b> Nhận hồ sơ đến:</b><b style="color:red;font-size:16px"> <?php
                                        $date = date_create($thongtinchitiet['ngayhethan']);
                                        echo date_format($date, 'd-m-Y');
                                        if ($thongtinchitiet['ngayhethan'] < $thongtinchitiet['hientai'])
                                            echo "   <span style=\"font-size:16px\"> | HẾT HẠN NỘP HỒ SƠ</span>";
                                        ?>  </b> </div>
                                
                                 <div class=""> 
                                    <b class="td"><span  class='glyphicon glyphicon-user'></span>  Vị trí cần tuyển:</b>
                                    <span id="vitri">   <?php echo "  ".$thongtinchitiet['vitri']  ?></span>
                                </div>

  <div class=""> 
                               
                                <b class="td"> <span class="glyphicon glyphicon-map-marker"></span> Nơi làm: </b>
                                <span class="noilam" >
                                    <?php
                                    $sql = "select * from vungtuyendung mtd,vung v where mtd.mavung=v.mavung and 

matuyendung=:matuyendung ";
                                    $vung=select($sql,array("matuyendung"=>$matuyendung1),$db);

                                  
                                    $i = 0;
                                    $selectvung = " select DISTINCT tuyendung.matuyendung,vitri,mavung,tendonvi,slug  from vungtuyendung,tuyendung where  vungtuyendung.matuyendung=tuyendung.matuyendung and now()< ngayhethan and tuyendung.matuyendung!=$matuyendung1 
Having mavung='999'  ";
                                    foreach ($vung as $value){
                                        $selectvung.="or mavung='" . $value['mavung'] . "'";
                                        $mangtenvung[$value['mavung']] = $value['tenvung'];
                                        ?> 

                                        <?php if ($i != 0) { ?> -<?php } $i++;
                            echo $value['tenvung']; ?>
                                    <?php } ?></span>
                              
                            </div>
  </div>
                            </div>
                            
                            <div class=" row  boxdongchitiet  ">
                               
                                <div class=" boxthongtin">
    <div class="tieudetuyendungver2"><b>NỘI DUNG TUYỂN DỤNG</b></div> 
    <div class="noidungyeucau" style="height:auto;overflow: auto;font-family:'Times New Roman', Times, serif;font-size:16px"><?php echo $thongtinchitiet['ghichu']; ?> </div>
                                </div>
                            </div>
                            <div class="row boxdongchitiet ">
                                <div class="col-md-6 lienhe">
                                    <div class="boxthongtin">
                                    <div class="tieudetuyendungver2"><b>THÔNG TIN LIÊN HỆ</b></div>
                                    <div class=" thongtintuyendung">
                                        <div class=""> <b class="td"><span class="glyphicon glyphicon-phone"></span> Số điện thoại:</b> <?php echo $thongtinchitiet['sdt']; ?> </div>
                                 <div class=""> <b class="td"><span class="glyphicon glyphicon glyphicon-envelope"></span> Email:</b> <?php echo $thongtinchitiet['email']; ?> </div>   
                                 <div class=""> <b class="td"><span class="glyphicon glyphicon-map-marker"></span> Địa chỉ: </b> <?php echo $thongtinchitiet['diachi']; ?>  </div>        
                                     </div>
                                    </div>
                                </div>
                                  <div class="col-md-6" style="padding: 0px;">
                                    <div class="boxthongtin">
                                    <div class="tieudetuyendungver2"><b>LĨNH VỰC TUYỂN DỤNG</b></div>
                                     <div class=""> 
                    
                                <span  class="linhvuc">
                                    <?php
                                    $sql = "select * from nganhtuyendung ntd,nganhnghe n where ntd.manganh=n.manganh and 

matuyendung=:matuyendung";
                                    
$nganh=select($sql,array("matuyendung"=>$matuyendung1),$db);

                                  
                                    $i = 0;
                                    $selectnganh = " select DISTINCT tuyendung.matuyendung,vitri,manganh,tendonvi,slug  from nganhtuyendung,tuyendung where  nganhtuyendung.matuyendung=tuyendung.matuyendung and now()< ngayhethan and tuyendung.matuyendung!=$matuyendung1 
Having manganh='999'  ";
                                    foreach ($nganh as $value) {

                                        $selectnganh.="or manganh='" .$value['manganh'] . "'";
                                        $mangtenganh[$value['manganh']] = $value['tennganh'];
                                    $url = URL."tuyen-dung-" . tieudekhongdau($value['tennganh']) . "-" . $value['manganh'] . "-trang-1.html";

                                        ?> 

                                        <?php if ($i != 0) { ?>, <?php }$i++;
                                        echo "<a href='$url' class='itemnganhnghe'>".$value['tennganh']."</a>"; ?>
                                    <?php } $selectnganh.=" ORDER  BY ngaybatdau" ?></span>       

                                <br>
  </div>
                                    </div>
                                </div>
                                
                            </div>
                             
                             <div class="row boxdongchitiet"> 
                          
                             

    <?php
    if ($thongtinchitiet['email'] != "") {
        $to = $thongtinchitiet['email'] . ",lienhe@vieclamcantho.com.vn";
        $su = "HỒ SƠ ỨNG TUYỂN CỦA THÀNH VIÊN TỪ VIECLAMCANTHO.COM.VN";
        $urlungtuyen = "http://vieclamcantho.com.vn/" . tieudekhongdau($thongtinchitiet['tendonvi']) . "-" . $thongtinchitiet['matuyendung'] . ".html";
        $mg = "Tên công tuyển dụng: " . str_replace('&', 'VÀ', $thongtinchitiet['tendonvi']) . "%0A%0AĐịa chỉ: " . $thongtinchitiet['diachi']
                . "%0A%0A---------------------------------%0A%0A"
                . "Nội dung ứng tuyển: %0A%0A _ %0A _%0A%0A---------------------------------%0A%0A"
                . "Tin tuyển dụng được đăng tại: vieclamcantho.com.vn %0ANguồn: $urlungtuyen ";
        $link = "https://mail.google.com/mail/u/0/?view=cm&fs=1&to=$to&su=$su&body=$mg&ui=2&tf=1";
        ?>
                                <div class="text-center">
                                
                                    <div class="row">  
                                        <div class="col-md-2">
                                            
                                        </div>
                                          <div class="col-md-8">
                                            
                                      
            <div class="col-md-12">
                
                <div class="boxnophoso shownophoso "> <i class="glyphicon glyphicon-send"></i> NỘP HỒ SƠ NGAY</div>
	   </div>

<!--     <div class="col-md-6">
         <a  href="<?= $link ?>" target="blank" style="text-decoration: blink"> <div class="boxnophosogmail"> <i class="glyphicon glyphicon-send"></i> Nộp qua Gmail của bạn</div></a>
	   </div>-->
                                        </div>
                                          <div class="col-md-2">
                                            
                                        </div>
                                    </div>
                              
                       <!-- Modal nop ho so-->
  <div class="modal fade modelnophoso" id="sendcvmodal" role="dialog">
    <div  class="modal-dialog">
      <div class="modal-content">
       
        
        
      </div> 
    </div>
  </div>   
   
             <script>
                                                  // Show the Modal on load
    $(document).on("click",".shownophoso",function(){
        btnlinkload($(".shownophoso"));
         _loadform(function(){
              $("#sendcvmodal").modal("show");
              btnlinkthanhcong($(".shownophoso"),'<i class="glyphicon glyphicon-send"></i> NỘP HỒ SƠ NGAY');
         });
});
 </script>                                            
                        
                                      
                                
                                </div>

                                
    <?php } ?>
                                
                                
</div>
<?php if($thongtinchitiet['toado']!=""){ ?>
<div class="row boxdongchitiet"> 
    <div class="boxthongtin">
 <div class="tieudetuyendungver2">VỊ TRÍ CÔNG TY</div>
                                  
                                  
                                  
                                <?php 
              $toado=$thongtinchitiet['toado'];
           
              $toado=str_replace('(','',$toado);
               $toado=str_replace(')','',$toado);
               $array=  explode(',',  $toado);
              $tenmap=  xulyxh($thongtinchitiet['tendonvi']);
           
              ?>
                          <input id="toadox" value="<?= $array[0] ?>" class="hidden">
                           <input id="toadoy" value="<?= $array[1] ?>" class="hidden">
                  <input id="tieudemap" value="<?= '<b>'.xulyxh(output($thongtinchitiet['tendonvi'])).'</b><br><span>'.xulyxh(output($thongtinchitiet['diachi'])).'</span>' ?>" class="hidden">
                             <div id="map"></div>      
                                  <script>
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

                function initAutocomplete() {
                var pos;
                        var haightAshbury = new google.maps.LatLng($('#toadox').val(), $('#toadoy').val());
                        var map = new google.maps.Map(document.getElementById('map'), {
                             Center: haightAshbury,
                                zoom: 16,
                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.RIGHT
    },
                      });
//       if (navigator.geolocation) {
//                        navigator.geolocation.getCurrentPosition(function(position) {
//                        pos = {
//                        lat: position.coords.latitude,
//                                lng: position.coords.longitude
//                        };
//                                var infoWindow = new google.maps.InfoWindow({map: map});
//                                infoWindow.setPosition(pos);
//                                infoWindow.setContent('Có thể bạn đang ở đây.');
//                        }, function() {
//                        handleLocationError(true, infoWindow, map.getCenter());
//                        });
//                } else {
//        alert("Không xác định được vị trí của bạn")
//
//        }

        marker = new google.maps.Marker({
        map: map,
                animation: google.maps.Animation.DROP,
                position:haightAshbury,
          
        });
                var contentString = '<div id="content">' + $('#tieudemap').val() + '</div>';
                var infowindow = new google.maps.InfoWindow({
                content: contentString
                });
                infowindow.open(map, marker);
               
                // [END region_getplaces]
                }


    </script>
                                  
           <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
         async defer>
     
    </script>                       
  
                                
                             </div>
</div>
                                  <?php } ?>

    <?php $u = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    ?>
                            <hr>
                            <div class="row boxchitiet">

          <div class="tieudetuyendung">Lượt xem  <i class="fa fa-eye"></i><span style="color:#F33;font-weight:bold"> <?= $luotxem ?></span></div>
          <div class="col-md-6">
                           

                            <div    class="fb-comments fb-like" data-href="http://vieclamcantho.com.vn/<?php echo tieudekhongdau($thongtinchitiet['tendonvi']); ?>-<?php echo $thongtinchitiet['matuyendung']; ?>.html"
                                    data-colorscheme="light" data-numposts="5" data-width="100%" ></div>

      </div>
          <div class="col-md-6">
           <div class="alert alert-info">
                                <span class="fb-like" data-href="<?php echo URL.$thongtinchitiet['slug']; ?>-<?php echo $thongtinchitiet['matuyendung']; ?>.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></span>

                                <span style="margin-left: 20px;" class="fb-send" data-href="<?php echo URL.$thongtinchitiet['slug']; ?>-<?php echo $thongtinchitiet['matuyendung']; ?>.html"></span>
                            </div>

                            <div class="alert alert-info">
                            <span class="g-plusone" data-size="standard" data-href='http://vieclamcantho.com.vn/' ></span>
                             <span class="g-plus" data-action="share"  data-annotation="none" ></span>
                            </div>

      </div>
 
                              </div>




                        </div>



                    </div>
                </div>
                <div class="col-md-3" id="chitietquangcao">

   <a href="<?= URL ?>ung-vien-dang-ky-ho-so.html">    <img src="public/images/UNG TUYEN.jpg" class="img-responsive img-thumbnail"></a>

                    <div id='vitrivietcore' style="margin-top: 50px"> </div>
                    <div id="vietcore"> <a  href="http://thietkewebcantho.net"  target="_blank"><image  class="img-responsive"  src='public/quangcao/vietcore1.gif'></a></div>
<p>&nbsp;</p>

<a  href="http://thietkewebbanhang360.com/" title="THIẾT KẾ WEB BÁN HÀNG"  target="_blank"><img  width="100%" class="img-responsive"  src='public/quangcao/thiet-ke-web-ban-hang.png'></a>







    <?php
//    $sql = "select * from nganhnghe ORDER  BY tennganh  asc";
//
//
//    $stmt = $db->prepare($sql);
//    $stmt->execute();
//    $mangnganhlist = $stmt->fetchAll();


    $sql = "select * from vung ORDER  BY tenvung  asc";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $mangvunglist = $stmt->fetchAll();
    ?>

                    <hr>     

                    <div class="panel panel-primary">
                        <div class="panel-heading teal">Việc làm theo vùng/miền</div>

                        <div class="scrollbox"  >
                            <div class="list-group ">  <?php
                foreach ($mangvunglist as $r) {
                    $url =URL."viec-lam-" . tieudekhongdau($r['tenvung']) . "-" . $r['mavung'] . "-trang-1.html";
                    ?>

                                    <a href="<?= $url ?>" class="list-group-item"><?= $r['tenvung'] ?></a>      

                                <?php } ?>
                            </div> 
                        </div>
                    </div>



            






                </div>

            </div>



            <div class="container">
                <div class=" panel panel-primary">  
                    <div class="panel-heading teal text-center" >THÔNG TIN LIÊN QUAN</div>

                    <div class="row" style="    padding-top: 10px;"> 



                        <div  class="col-md-6">




    <?php
    $stmt = $db->prepare($selectnganh);
    $stmt->execute();
    $temp = $stmt->fetchAll();
    foreach ($temp as $value) {

        $mangnganhnghe[$value['manganh']][] = $value;
    }

    foreach ($mangtenganh as $key => $vl) {

        $i = 0;
      
        ?>


                                <div class="col-md-12">
                                       <?php  if(isset($mangnganhnghe[$key])){?>
                                        <div class="panel panel-primary">
                                        <div class="panel-heading teal">Tuyển dụng <?= $vl ?></div>


                                <?php
                                  
                                foreach ($mangnganhnghe[$key] as $r) {
                                  
                                    ?>

                                            <a  class="list-group-item" 
                                                href="<?php echo URL.($r['slug']); ?>-<?php echo $r['matuyendung']; ?>.html">
                                                <h3 id="cttieude"> <?php echo $r['tendonvi']; ?></h3>
                                                <div><span  class='glyphicon glyphicon-user'></span><span class="keytd">Vị trí </span>:
                                                    <span class="innganh"><?php echo "  " . $r['vitri'] ?></span></div>
                                            </a>

            <?php
            $i++;
            if ($i == 3)
                break;
                                   } echo "</div>";}
        ?>

                                    
                                </div>
    <?php } ?>





                        </div>



                        <div  class="col-md-6">



    <?php
    $stmt = $db->prepare($selectvung);
    $stmt->execute();

    $temp = $stmt->fetchAll();

    foreach ($temp as $value) {

        $mangvung[$value['mavung']][] = $value;
    }

    foreach ($mangtenvung as $key => $vl) {

        $i = 0;
        ?>


                                <div class="col-md-12">
                                     <?php  if(isset($mangvung[$key])){?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading teal">Tuyển dụng <?= $vl ?></div>


                                <?php
                                foreach ($mangvung[$key] as $r) {
                                    ?>

                                            <a  class="list-group-item" 
                                                href="<?php echo URL.$r['slug']; ?>-<?php echo $r['matuyendung']; ?>.html">
                                                <h3 id="cttieude"> <?php echo $r['tendonvi']; ?></h3>
                                                <div><span  class='glyphicon glyphicon-user'></span><span class="keytd">Vị trí </span>:
                                                    <span class="innganh"><?php echo "  " . $r['vitri']; ?></span></div>
                                            </a>

                                    <?php
                                    $i++;
                                    if ($i == 3)
                                        break;
                                     }echo "</div>";}
                                ?>

                                    
                                </div>
    <?php } ?>


                        </div>
                    </div>
                    Nội dung bản quyền bởi <a href="https://plus.google.com/u/2/112643183066427020573?rel=author" >Web Master</a>
                </div>






            </div>
                            <script>
               $('.scrollbox').enscroll({
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
    });
            </script>
             <script>
               $('.scrollbox1').enscroll({
            verticalTrackClass: 'track3',
            verticalHandleClass: 'handle3'
    });
            </script>
        
            
                    <script src="public/js/timlaimatkhau.js?ver=<?= VER ?>"></script>

                                    <?php
                                    require 'footer.php';
                                }
                                else {


                                    header("Location: http://vieclamcantho.com.vn/error.html");
                                }
                                ?>

                    
    
            