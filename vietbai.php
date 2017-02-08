<?php require 'header.php' ; ?>
 
 <script language="javascript" src="tienich2/ckeditor.js" type="text/javascript"></script>
 <div class="container" style="margin-top:50px">
<div class="panel panel-primary"> 
<div class="panel-heading teal">Đăng bài viết:</div>
<div class="panel-body">






<?php

if(isset($_POST['tieude']))
{
	$tieude=$_POST['tieude'];
	$noidung=addslashes($_POST['noidung']);
	
	$sql="insert into baiviet values('$tieude','$noidung',null)";
	if($db->exec($sql))
	echo "ok";
	else
	"loi roi";
	
	
}

?>




<form  action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form-horizontal" 
id="baiviet" >


Tiêu đề:<input name="tieude" type="text" class="form-control" >

Nội dung:<textarea id="ghichu" name="noidung">


</textarea>

<div align="center"><button type="submit" class="btn btn-default">Đăng</button></div>

</form>



</div>
</div>
</div>
<script type="text/javascript">CKEDITOR.replace('ghichu');</script>
<?php  require 'footer.php'; ?>