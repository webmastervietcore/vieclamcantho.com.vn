
<?php 
require 'header.php'; 
 if(checklogin(1)){
   $datauser = getvaluecookie("authentic");
  if(isset($_GET['token']))
{ 
      $tokenget=$_GET['token'];
      $tokenemail=  createhash("sha256", $datauser['email'],HASH_KEY);
      if($tokenemail==$tokenget)
      {
         
     ?>


<div id="main" class="container" style="margin-top:10px ;padding:0px"  > 
     
    

    
    <div class="col-md-9" >
          
   <?php   
   $tk=input($datauser['email']);		
//		$sql="select count(*) as row from tuyendung where taikhoan=:taikhoan";
//			$row=select($sql,array('taikhoan'=>$tk),$db);
//                        $row=$row[0];
//				// tong so dong co trong CSDL
//				$totalRow = $row['row'];
//		
//				// so dong tren moi trang
//				$limit = 5;
//				
//				// tinh tong so trang
//				$total_page = $totalRow==0?1:ceil($totalRow/$limit);
//				
//				
//				// lan dau goi trang nen trang hien tai = 1
//				$current_page = 1;
//					
//				// neu gia tri trang moi duoc submit
//				if (isset($_GET["page"])){
//					$current_page = $_GET["page"] ;
//				}
//			 
//			 
//				
//				if (isset($_GET['first'])){
//					$current_page = 1;
//				}
//				
//				if (isset($_GET['next'])){
//					$current_page += 1;
//				}
//				
//				if (isset($_GET['previous'])){
//					$current_page -= 1;	
//				}
//				
//				if (isset($_GET['last'])){
//					$current_page = $total_page;	
//				}
//				
//				$current_page = $current_page>$total_page?$total_page:$current_page;
//				
//				
//				// tinh vi tri bat dau select
//				$start = $current_page==1?0:($current_page-1)*$limit;				
   ?>
        
  <div class="breadcrumb1 clearfix">
              
      <div class="itemtip"><a href="<?= URL ?>"> <i class="glyphicon glyphicon-home"></i> TRANG CHỦ </a>
                  <span class="arrow">
                      <span></span>
                  </span>
              </div>
       
        <div class="itemtip">
            <a>Quản lý bài viết </a>
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
            <div class="tieudetuyendung">QUẢN LÝ BÀI VIẾT <a href="dang-tin-tuyen-dung.html" class="btn btn-success"> Đăng tin</a></div>  
 
    <form action="quanlytuyendung.php" method="get"> 
        <input name="token" id="token" class="hidden" value="<?= $tokenget?>">
<div class="alert alert-info">
    <i class="glyphicon glyphicon-alert thanhcong " style="color: yellow"></i>Chú ý: Nếu tin tuyển dụng hết hạn. Đừng vội xóa-bạn có thể cập nhật lại hạn nộp hồ sơ</div>
               <table class="table table-bordered">
                  <thead>
      <tr>
          <th>STT</th>
        <th>Tiều đề bài viết</th>
        <th>Công cụ</th>
           <th>Thông báo</th>
      </tr>
    </thead>
     <tbody>
        <?php

		$i=0;
		$sql="select tendonvi,vitri,matuyendung,now() as now,ngayhethan from tuyendung where taikhoan=:taikhoan  ORDER  BY ngaybatdau   desc";
		$kq=select($sql,array('taikhoan'=>$tk),$db);	
		foreach ($kq as $r)
		{
		$i++;
		?>
            
<tr>
 <td>      <?php echo $i; ?> </td>
 <td>     <div style="word-wrap: break-word;" class="text-left"> <?php echo output(neods($r['tendonvi'],30)).'...'.'<br>Cần tuyển:'.  output(neods($r['vitri'],30)).'...'; ?></div> </td>
  <td>
      <a href="<?= URL."chinh-sua-tuyen-dung-asd-".createhash("sha256",$r['matuyendung'],HASH_KEY).'-fgh-'.$r['matuyendung']."-hjk-".$tokenget.".html"?>"><button style="margin-right: 30px" type="button" name="matuyendung" value="<?php echo $r['matuyendung']; ?>" class="suatuyendung btn btn-info" >Sửa   </button>
      </a>
          <button type="button"  class="xoatuyendung btn btn-danger" value="<?php echo $r['matuyendung']; ?>">  Xóa</button></td>
      <td> <?php
	  if($r['ngayhethan'] <= $r['now'])
	  {
		  echo "Đã hết hạn";
	  }
	   ?></td>
  
        </tr>
        
        <?php } ?>
     </tbody>
        </table>   
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
<?php     $token=createhash("sha256",$datauser['email'],HASH_KEY); ?>
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



 <?php require 'footer.php'; 
 
      } // token bang nhau
  }else echo "";
// kiem tra ton tai token

  }// kiem tra ton tai $_Coo email 
  else
	{
	
	
	?>
	<div class="alert alert-info" align="center">Bạn chưa đăng nhập</div>
<?php } ?>
        <script src="public/js/deleteitem.js?ver=<?= VER ?>">  </script>

    
 