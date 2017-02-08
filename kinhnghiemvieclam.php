 <?php require_once 'db.php';?>
<!doctype html>
<html>
<head>


    <?php	$id=$_GET['id'];
$sql="select * from baiviet where id='$id'";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			if($baiviet=$stmt->fetch())
			{
	?>
<meta content="<?php echo $baiviet['tieude'];  ?>"  property="og:site_name">
<meta content="<?php echo $baiviet['tieude'];  ?>" property="og:title">
 <meta property="og:description" content="<?php echo $baiviet['tieude'];  ?>" >
 <meta content="http://vieclamcantho.com.vn/images/index.png" property="og:image">

<title ><?php echo $baiviet['tieude']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<meta name="viewport" content="width=device-width, initial-scale=1">


       
			  
      
	<link type="text/css" href="css/bootstrap.css" rel="stylesheet" />
<link type="text/css" href="css/bootstrap-theme.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
<link type="text/css" href="css/style.css" rel="stylesheet" />
<link type="text/css" href="css/w3.css" rel="stylesheet" />
<link type="text/css" href="css/khung.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/datepicker.css" />
<link href="images/logo.ico" rel="shortcut icon" />
<link type="text/css" href="engine1/style.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/loctuyendung.js"></script>
<script type="text/javascript" src="js/hieuung.js"></script>
<script type="text/javascript" src="js/timkiem.js"></script>
<script src="js/kiemtratuyendung.js"></script>
<script src="js/dangnhap.js"></script>
<script src="js/suaxoatuyendung.js"></script>
<script src="js/dangky.js" ></script>

<!--    <script>
	
	$(function () {
  $('.datepicker').datepicker({ format: "dd//mm/yyyy" }).on('changeDate', function (ev) {
    $(this).datepicker('hide');
  });
});

	</script-->


<style type="text/css">
.retap{

  box-shadow: 0px 0px 15px 1px  #363;


	
}

#main{

	
}
@media screen and (min-width: 1500px) {
#main{

width:1500px;
margin:auto;

}
}

@media screen and (max-width: 1000px){
	
	#chitietquangcao
        {
            display: none;
                
        }
	#hot{
display:none;	
}
#trangchutuyendung
{
width:100%;	
margin:0px;
padding:0px;	
}
#logo{

  float:left;
}
#kelogo{

  float:left;
width:80%;
}
#nganhnghe{
	 float:left;
}
#tinhthanhpho{
	 float:left;
}
}
@media screen and (max-width: 720px){
    #chitietquangcao
        {
            display: none;
                
        }
#kelogo{
width:auto;	
}
#logo{
display:none;
}

	}
@media screen and (max-width: 480px) {
#nengoogle{
     background-size: 250px 50px !important;
}
#google{
left: 180px !important;
}
    #chitietquangcao
        {
            display: none;
                
        }
	#kelogo{

  float:none;
  width:auto;
}
	#nganhnghe{
	 float:none;
}
#tinhthanhpho{
	 float:none;
}
#logo{

  display: none;
}
#trangchutuyendung{
width:100%;	
margin:0px;
padding:0px;
}
#hienthituyedung
{
width:100%;	
margin:0px;
padding:0px;	
}
#hienthichitiet{
	width:100%;	
margin:0px;
padding:0px;
}
#quangcao{
display:none;	
}
#main{

width:auto;

}
.hientim{
display:none;
}
#right{
display:none;	
}
#hot{
display:none;	
}
.jumbotron{
margin-top:30px;
}
}
</style>

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
        lang: 'vi'
      };

      (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>


	

<div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '885940871479537',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script lang="javascript">
(function() {var _h1= document.getElementsByTagName('title')[0] || false;
var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=3d0839bf6f1d53c6bc539c58223c94bf&data=eyJzc29faWQiOjI4Mzc0NjMsImhhc2giOiJmNWVjNDg1ZGE0YjY0OWZiYWQyNzkwZGJjNGZmMTFkNSJ9&pname='+product_name;
var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>



    <nav class="menutop navbar navbar-default navbar-fixed-top " style=" background: white;
  box-shadow: 0px 0px 10px 1px;">
              <div class="container"> 
              <a href="http://vieclamcantho.com.vn/"> <img style="float:left" width="180" height="60" src="images/logo.gif" /> </a>
    <!-- Phần này sẽ hiên thị khi dùng dt-->
    <div class="navbar-header page-scroll" style="margin-top:15px">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Khi zoom</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
    </button>

                      
                </div>
    
    <!--End --> 
    <!-- Danh sách thành viên -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
      
        <li  class="page-scroll"> <a id="menutuyendung"  href="http://vieclamcantho.com.vn/">
                <button class="btn btn-info"> <span class="glyphicon glyphicon-list-alt"></span> Tuyển dụng</button>
                    </a></li>
                     
                    
        <li   class="page-scroll"> <a id="menudangtintuyendung"  href="http://vieclamcantho.com.vn/dang-tin-tuyen-dung.html">
             <button class="btn btn-danger" ><span class="glyphicon glyphicon-edit"></span> Đăng tin tuyển dụng</button>
            
            
                    </a></li>
       
        
      </ul>
                </div>
    <!-- kết thúc navbar-collapse --> 
  </div>
            </nav>
       
       <div class="jumbotron teal" style="padding:15px 0px 0px 0px; margin-top:5px" >
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
          
      
			  		  



 
 
     <div id="main" class="panel-body" style="margin-top:10px ;padding:0px" >
       <div class="col-md-1">
 
 </div>
       
	 <div class="col-md-8">
<div class=" panel panel-primary">  
   <div class="panel-heading teal text-center" >
 <a href="index.php" style="color:rgba(255,255,255,1)">TRANG CHỦ </a><span class="glyphicon glyphicon-circle-arrow-right"></span><span style="color:rgba(255,255,255,1)">Kinh nghiệm việc làm </span>
   </div>
   <div class="panel-body"> 
  <div   style="color:green">
 <h1> <?php echo
    $baiviet['tieude'];?></h1>
 </div>

<div class="fb-like" data-href="http://vieclamcantho.com.vn/kinhnghiemvieclam.php?id=<?php echo $id;  ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div> 

 <div   style="height:auto;width:100%;overflow:auto;">
  <?php  echo $baiviet['noidung']; ?>
 </div>
      <div    class="fb-comments fb-like" data-href="http://vieclamcantho.com.vn/kinhnghiemvieclam.php?id=<?php echo $id;  ?>"
 data-colorscheme="light" data-numposts="5" data-width="100%" ></div>
       </div>
       </div>
       </div>
       
    
       <div class="col-md-3">


<div class="panel panel-primary">
<div class="panel-heading teal">Liên kết với chúng tôi</div>

  
     <div
     class='fb-like-box'
     data-href="https://www.facebook.com/vieclamcantho.com.vn"
     data-width='300' data-show-faces='true'
     data-stream='false' data-show-border='flase'
       data-header='true'>
       </div>

</div>

<div class="panel panel-primary">
<div class="panel-heading teal">Kinh nghiệm việc làm</div>

<div class="list-group">
<?php  

$sql="select id,tieude from baiviet  ORDER  BY  id  DESC LIMIT 5 ";
$stmt = $db->prepare($sql);
			$stmt->execute();
			while($r=$stmt->fetch()){
?>

<a href="kinhnghiemvieclam.php?id=<?php echo $r['id'] ;?>"  class="list-group-item">
<?php echo $r['tieude'];  ?>

<span style="float:right;color:green" class="glyphicon glyphicon-leaf"></span>
</a>

<?php  } ?>
</div>
</div>

</div>



 </div>
       
       
     </div>    
</body>
<?php
}else
{


 require 'header.php' 
 ?>

<div class="alert alert-info">Tin này đã bị xóa do:<br>
_Hết hạn <br>
_Chủ sở hữu
</div>
<?php } ?>
<?php  require 'footer.php'; ?>