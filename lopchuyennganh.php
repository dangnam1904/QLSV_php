<?php require "header.php"; ?>

<div class="group-box">
	<div align="center">
	<div class="title">Lớp chuyên ngành</div>

		
	<?php 
		
		
	
	?>
		<form method="post" name="" action="<?php echo $_SERVER["PHP_SELF"];?>">			
		
				
			<?php 
			// tính tổng số dòng 
			$sql = "SELECT COUNT(*) FROM dbo_lopchuyennganh ";
			$result = $db->query($sql);
			$total_row = 0;
			if ($result){
				$row = $result->fetch_array();
				$total_row = $row[0];
			}
			// số dòng in ra ở mỗi trang
			$limit = 25;
			// tính tổng trang, dùng hàm ceil lấy phần nguyên (không dùng floor)
			$total_page = $total_row==0?1:ceil($total_row/$limit);
			$result->free();
			 
			
			// để lưu trữ trang hiện tại được POST mỗi khi submit trang
			// một thẻ input loại hidden được tạo để giữ giá trị trang hiện tại
			// mỗi khi submit thẻ này sẽ submit luôn giá trị của nó
			
			// nếu thẻ này có giá trị (từ lần gọi trang thứ 2 trở đi
			if (isset($_POST["hdCurrentPage"])){
				$current_page = $_POST["hdCurrentPage"];
			}else{
				// là lần gọi trang đầu tiên, thẻ hidden chứa giá trị trang
				// hiện tại chưa có nên gán = 1
				$current_page = 1;
			}
			// trong trường hợp các nút là số trang được nhấn (ví dụ nút: 1 2 3 4 5)
			if (isset($_POST["btnPage"])){
				$current_page = $_POST["btnPage"] ;
			}
			
			
			// nếu nút "Đầu" được nhấn, gán trang hiện tại = 1			
			if (isset($_POST["btnFirst"])){
				$current_page = 1;
			}
			// nếu nút "Trước" được nhấn, giảm trang hiện tại đi 1
			if (isset($_POST["btnPrevious"])){
				$current_page -= 1;
			}
			// nếu nút "Tới" 1 trang được nhấn, tăng trang hiện tại lên 1
			if (isset($_POST["btnNext"])){
				$current_page += 1;
			}
			// nếu nút "Cuối" được nhấn, gán trang hiện tại bằng tổng số trang (trang cuối cùng)
			if (isset($_POST["btnLast"])){
				$current_page = $total_page;
			}
			
			// nếu nút đi đến số trang được nhấn
			if (isset($_POST["btnGoto"])){
				// lấy giá trị được nhập trong ô textbox
				$current_page = $_POST["txtGoto"];
			}
			
			// trong trường hợp người dùng xóa hết cả trang hiện tại, bắt đầu lùi lại 1 trang trước đó
			if (($current_page-1)*$limit >= $total_row){				 
				$current_page -= 1;
			}
			 
			// số nút hiển thị
			$num_page = 5;
			// nút bắt đầu in
			$i = 0;
			// kết thúc in số nút trang cho chọn 
			$j = 0;
			// nếu trường hợp tổng số trang vượt số nút hiển thị
			if($total_page > $num_page && $current_page >= $num_page){
				// in trước nút hiện tại 2 nút
				$i= $current_page - 2;
				// nút cuối cùng là nút tổng số trang hoặc nút hiện tại + 2
				$j = ($total_page >= ($current_page+2))?($current_page+2):$total_page;
					
			}else{
				
				$i = 1;
				$j=$num_page;
			}		
			
			// vị trí bắt đầu SELECT trong CSDL
			$start_row = $current_page==1?0:($current_page-1)*$limit;
			 
			$sql = "SELECT * FROM dbo_lopchuyennganh  lcn join dbo_chuyennganh  cn on cn.macn= lcn.macn order by malop LIMIT $start_row, $limit ";
			$result = $db->query($sql);			 
			// nếu có dữ liệu thì hiển thị danh sách
			
			if ($result && $result->num_rows>0){
		?>
		<table class="ds">
			<!-- in tiêu đề danh sách -->
				<thead>
				<tr>
				
					<th>STT</th>
					<th  style="width:100px">Mã lớp</th>
					<th  style="width:400px">Tên lớp </th>
					<th style="width:50px">Khóa</th>
                    <th style="width: 300px"> Tên Khoa </th>
								
				</tr>  
			 </thead>
			 <!-- end in tiêu đề-->
			 <!-- inh danh dánh -->
			 <tbody>
				<?php 			
					while($row = $result->fetch_array()){
						echo "<tr >";
						//	echo "<td><input name='chkmasv[]' onchange='selectedRow(this,this.checked)' value='".$row["MaGV"]."' class='chkmasv' type='checkbox'/> </td>";
							echo "<td>".++$start_row."</td>";
							echo "<td>".$row["MaLop"]."</td>";
							echo "<td>".$row["TenLop"]." </td>";
                            echo "<td>".$row["MaLop"]."</td>";
							echo "<td>".$row["TenChuyenNganh"]." </td>";
							
							
						echo "</tr>";
					}
					$result->free();
				?>
			</tbody>
			<!--  end in danh sách-->
			
			<!-- in footer của danh sách -->
			<tfoot>
			<tr>
				<td colspan="8">
					<!--  hiển thị nút Xóa tất cả sau khi chọn nhiều dòng -->
					<button type="submit" name="btnXoaTatCa" onclick="return confirmDeleteAll('chkmasv');" >
						<img src="<?php echo IMAGES_DIR;?>/delete.png" />
					</button>
					<!--  end xóa tất cả -->					
				<?php 
					// hiển thị nút "về trang đầu (First)"
					echo "<button name='btnFirst' value='1' ";
					if ($current_page==1){
						// trong trường hợp trang hiện tại là trang 1 thì vô hiệu hóa nút First
						echo " disabled='disabled'";
					}
						// in hình ảnh cho nút First
					echo "><img src='".IMAGES_DIR."/first.png'/></button>";
					
					// hiển thị nút "Trước" (Previous)
					echo "<button name='btnPrevious' value='".($current_page-1)."' ";
					if ($current_page == 1){
						// trong trường hợp trang hiện tại bằng 1 thì vô hiệu hóa
						echo " disabled='disabled'";
					}
					echo " ><img src='".IMAGES_DIR."/previous.png'/></button>";
				?>
					<!-- hiển thị danh sách các trang, submit form khi trang thay đổi -->
					<input type="hidden" name="hdCurrentPage" value="<?php echo $current_page;?>" /> 									
				<?php 	
					
					for($i;$i<=$j;$i++){
						echo "<button name='btnPage' type='submit' value='".$i."' ";
							if ($i == $current_page){
								echo "disabled='disabled' ";
							}
						echo "> <b> $i </b> </button>";
						 
						}
					 
				 				
					?>					
					 				
				<?php 
					// Hiển thị nút "Tới" (Next)
					echo "<button name='btnNext' value='".($current_page+1)."'";
					if ($current_page == $total_page){
						// Nếu trang hiện tại là trang cuối cùng, vô hiệu hóa nút Next
						echo " disabled='disabled'";
					}	
					echo " ><img src='".IMAGES_DIR."/next.png'/></button>";
					//hiển thị nút "Cuối" (Last)
					echo "<button name='btnLast' value='1' ";
					if ($current_page == $total_page){
						// trong trường hợp là trang cuối, vô hiệu hóa nút Last
						echo " disabled='disabled'";
					}
					echo " ><img src='".IMAGES_DIR."/last.png'/></button>";
					// hiển thị trang hiện tại / tổng số trang
					echo "$current_page/$total_page ";
					echo "<input type='text' name='txtGoto' size='2' maxlength='3'/>";
					echo "<button name='btnGoto'> <img src='".IMAGES_DIR."/go.png' height='15px' /></button>";
				?>	
				
				</td>
			</tr>	
			</tfoot>
			<!--  end in footer của danh sách -->
			</table>
		<?php 
			
			}
		?>
		<!--  form này không có tác dụng gì, chỉ dùng để chỉ ra nút Sửa ở cột bên phải bảng
		thuộc về form này, mục đích là không cho post dữ liệu dư thừa khi nhấn nút Sửa, vì chỉ cần giá trị
		trong thuộc tính value của nút Sửa sử dụng tag <button>  -->	
		</form>
		<form id="frmNoAction">
		</form>
	 <p>
	 </div>
</div>		
<?php require "footer.php"; ?>