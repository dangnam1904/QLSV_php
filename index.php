<?php require "header.php"; ?>
<div class="group-box">
	<div align="center">
	<div class="title">Thông báo</div>
	
	 <h3>Chào mừng bạn đến với Hệ thống quản lý đào tạo.</h3> 
	 </div>
</div>

<div class="group-box">
	
	<div  align="center" class="title">Thông báo</div>
	<?php 
	 $sql="select * from dbo_tintuc";
	 $result = $db->query($sql);
	if ($result){
	while($row = $result->fetch_array()){
		echo '<h3 style="marign-left:30px"><a href="tintuc?id='.$row['id_tintuc'].'""> '.$row['TieuDe'].'</h3> ';
		}
	}
	?>
</div>
</div>


	
</div>
<?php require "footer.php";