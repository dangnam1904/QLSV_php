<?php
    session_start();
?>

<?php

if(isset($_SESSION['username'])){
    
}
else{
    exit();
}
?>

<?php

require "header.php";
require_once "dbhelp.php";
$makhoa =$tenkhoa=$ngayTL=$id_khoa='';

$id=''; 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select *from dbo_khoa where makhoa='".$id."'";
    $khoa_list=executeResult($sql);
    if( $khoa_list!=null && count($khoa_list)>0){
        $k=$khoa_list[0];
        $id_khoa=$k['id_khoa'];
        $makhoa= $k['MaKhoa'];
        $tenkhoa=$k['TenKhoa'];
        $ngayTL=$k['NgayTL'];
       

    }
    else{
        $id='';
    }
}

if (!empty($_POST)){
   
    if(isset($_POST['makhoa'])){
        $makhoa= $_POST['makhoa'];
    }
   
    if(isset($_POST['tenkhoa'])){
        $tenkhoa= $_POST['tenkhoa'];
    }
  
    if(isset($_POST['ngayTL'])){
        $ngayTL= $_POST['ngayTL'];
    }
   
       if(isset($_POST['id_khoa'])){
        $id_khoa= $_POST['id_khoa'];
    }
   
    
    // Tránh lỗi sql injection //
    $id_khoa= str_replace('\'','\\\'',$id_khoa);
    $makhoa= str_replace('\'','\\\'',$makhoa);
    $tenkhoa= str_replace('\'','\\\'',$tenkhoa);
    $ngayTL= str_replace('\'','\\\'',$ngayTL);
  
    if( $id!=''){
        // update 

        $sql="update dbo_khoa set TenKhoa= '$tenkhoa' , NgayTL ='$ngayTL' where  makhoa='$makhoa'";
         execute($sql);
         echo '<script>
         alert("Sửa thông tin thành công");
         </script>';
    }
    else{
        // check khoa
        $sql_check_Fk="select * from dbo_khoa where MaKhoa='".$makhoa."'";
        $array_check= executeResult($sql_check_Fk);
         
        if(count($array_check)<=0){
            //insert 
        $sql= "insert into dbo_khoa(MaKhoa,TenKhoa,NgayTL) values
        ('$makhoa','$tenkhoa','$ngayTL')";
        execute($sql);
        echo '<script>
            alert("Thêm khoa thành công");
            </script>';
        }
        else
        {
            echo '<script>
            alert(" Khoa này đã tồn tại");
            </script>';
        }   
    }
     
}

?>

<body class="nav-md">
    <div class="container body">
    <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Trang quản trị</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Xin chào,</span>
                            <h2><?php echo $_SESSION["username"]?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Chung</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

                                </li>
                                <li><a><i class="fa fa-book"></i> Giảng dạy <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="lopchuyen_nganh.php">Lớp chuyên ngành</a></li>
                                        <li><a href="lophocphan.php">Lớp học phần</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Tin tức <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        
                                        <li><a href="tintuc.php">Thông báo tin</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-group" style="color:white; font-size:20px"></i>Người dùng <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="sinhvien.php">Sinh viên</a></li>
                                        <li><a href="giangvien.php">Giảng viên</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Khoa - viện <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="khoavien.php">Khoa - viện</a></li>
                                       
                                    </ul>
                                </li>

                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo $_SESSION['username']?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right"></span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">1</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                            <span>
                          <span><?php echo $_SESSION['username']?></span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                         Thông báo 
                        </span>

                                            <li class="nav-item">
                                                <div class="text-center">
                                                    <a class="dropdown-item">
                                                        <strong>Xem tất cả</strong>
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                </div>
                                            </li>
                                </ul>
                                </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
        </div>

        <!-- code xử ly từ phần này-->
        <div class="right_col" role="main">
        <div class="x_content">
        <br />
        
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                                        <input name="id_khoa" style="display:none" value="<?=$id_khoa?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="magv">Mã khoa <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="magv" value="<?=$makhoa?>" name="makhoa" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="TenKhoa">Tên Khoa <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="holot" name="tenkhoa" value="<?=$tenkhoa?>" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Ngày thành lập<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control"  value="<?=$ngayTL?>" name="ngayTL"   placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button" onclick="window.open('khoavien.php','_parent')">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
        </div>
    </div>
    
</body>


</html>
<?php 
 require "footer.php";
?>