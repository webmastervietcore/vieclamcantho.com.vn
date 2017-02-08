		
			

	
	 <!-- row -->
     
         <div id="bot" class="panel-body " style="background-color: white;margin-top: 5px;">
	
             <div class="col-md-3" id="footer1" >
               
                     <div class="text-center">  <label class="label label-warning">Nhà tuyển dụng</label></div>
                      <hr>
  <?php
                   
                   $sql="select logo,slug,matuyendung from tuyendung where logo!='logodefault.jpg' group by logo ORDER  BY ngaybatdau Desc limit 12";
                 $stmt = $db->prepare($sql);
			$stmt->execute();
			while($r=$stmt->fetch() ) {
                   ?>
                      <div class="col-xs-6 col-md-3" style="height: 50px">
    <a href="<?= URL ?><?= $r['slug']  ?>-<?= $r['matuyendung'] ?>.html" class="thumbnail">
        <img   src="<?php echo LOGO.$r['logo'];  ?>" alt="...">
    </a>
  </div>
                        <?php  }  $db=null;?>             
               
               
             </div>	
	  <div class="col-md-6" id="footer2"  style="">		

<div class="text-center">  <label class="label label-warning">  Thông tin   </label></div>
   <hr>
   <div  class="well" align="center">SÀN GIAO DỊCH VIỆC LÀM CẦN THƠ ONLINE<br>
202 Nguyễn Đệ, An Thới, Bình Thủy, TP. Cần Thơ -<br>
- Hotline: 0987.609.283 -<br>
Thông tin chuyển khoản <br>
CTY TNHH MTV GIẢI PHÁP TIN HỌC VIETCORE
<br>Số Tài Khoản: 0111000230951 - Vietcombank Cần Thơ<br>

<span class="glyphicon glyphicon-copyright-mark" ></span> Thiết kế bởi <a style="color: blue" target="_blank" title="THIẾT KẾ WEB CẦN THƠ" href="http://thietkewebcantho.net">THIET KE WEB CAN THO</a>
</div>

          </div>
                
	        <div class="col-md-3" id="footer3">
                    <div class="text-center">  <label class="label label-warning">  Liên kết   </label></div>
                       <hr>
                       <div style="float: left" > <img  width="50" height="50" class="img-responsive" src="public/images/fb.png" ></div>
                       <div>
                           <span class="badge"> Trang:</span> <a style="color: blue" target="_blank" href="https://www.facebook.com/vieclamcantho.com.vn?ref=hl">Vieclamcantho.Com.Vn</a><br>
                   <span class="badge"> Nhóm:</span>  <a style="color: blue" target="_blank" href="https://www.facebook.com/groups/canthowork/?fref=ts">CẦN THƠ WORK</a></div>
                         <hr>
                         <div style="float: left" > <img  width="50" height="50" class="img-responsive" src="public/images/google.png" ></div>
                       <div>
                           <span class="badge"> Liên hệ:</span>  <span style="font-size: 12px">Lienhe@vieclamcantho.com.vn</span><br>
                           <span class="badge"> Tư vấn:</span>  <span style="font-size: 12px">webmastervietcore@gmail.com</span></div>
                       
                       
                       
                </div>	
               
	</div>

<style>
#vgc_logo_msgoffline{
	display: none !important;
}
a.vgc_bt_logovchat
{
display: none !important;
}
#vgc_adv_client
{
display: none !important;
}
.vgc_adv_client
</style>

</body>
</html>