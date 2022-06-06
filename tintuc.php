<?php require "header.php"; ?>


<div class="group-box">
	
	<div  align="center" class="title">Thông báo</div>
    <?php 
        $id='';
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
     ?>
	<?php 
	 $sql="select * from dbo_tintuc where id_tintuc='$id'";
	 $result = $db->query($sql);
	if ($result){
	while($row = $result->fetch_array()){
		echo '<h3 style="margin-left: 30px;">'.$row['TieuDe'].'</h3> ';
        echo '<h4 style="margin-left: 30px;margin-right: 30px;">'.$row['NoiDung'].'</h4>';
		}
	}
	?>
</div>
</div>
	
</div>
<?php require "footer.php";