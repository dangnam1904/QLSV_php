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
$magv =$holot=$ten=$quequan=$gioitinh=$mahocvi=$matkhau= $email=$id_gv= $ngaysinh='';

$id=''; 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select *from dbo_giangvien where id_GV='".$id."'";
    $gv_list=executeResult($sql);
    if( $gv_list!=null && count($gv_list)>0){
        $gv=$gv_list[0];
        $id_gv=$gv['id_GV'];
        $magv= $gv['MaGV'];
        $mahocvi=$gv['MaHV'];
        $holot=$gv['HoLot'];
        $ten=$gv['Ten'];
        $ngaysinh=$gv['NgaySinh'];
        $gioitinh=$gv['GioiTinh'];
        $quequan=$gv['QueQuan'];
        $matkhau=$gv['MatKhau'];
        $email=$gv['Email'];

    }
    else{
        $id='';
    }
}

if (!empty($_POST)){
   
    if(isset($_POST['magv'])){
        $magv= $_POST['magv'];
    }
   
    if(isset($_POST['holot'])){
        $holot= $_POST['holot'];
    }
  
    if(isset($_POST['ten'])){
        $ten= $_POST['ten'];
    }
   
    if(isset($_POST['email'])){
        $email= $_POST['email'];
    }
   
    if(isset($_POST['matkhau'])){
        $matkhau= md5($_POST['matkhau']);
    }
 
    if(isset($_POST['gioitinh'])){
        $gioitinh= $_POST['gioitinh'];
    }
   
    if(isset($_POST['hoc_vi'])){
        $mahocvi= $_POST['hoc_vi'];
    }
   
    if(isset($_POST['quequan'])){
        $quequan= $_POST['quequan'];
    }
    
    if(isset($_POST['ngaysinh'])){
        $ngaysinh= $_POST['ngaysinh'];
    }
   
    if(isset($_POST['id_gv'])){
        $id_gv= $_POST['id_gv'];
    }
   
    
    // Tránh lỗi sql injection //
    $magv= str_replace('\'','\\\'',$magv);
    $holot= str_replace('\'','\\\'',$holot);
    $ten= str_replace('\'','\\\'',$ten);
    $ngaysinh= str_replace('\'','\\\'',$ngaysinh);
    $gioitinh= str_replace('\'','\\\'',$gioitinh);
    $quequan= str_replace('\'','\\\'',$quequan);
    $matkhau= str_replace('\'','\\\'',$matkhau);
    $email= str_replace('\'','\\\'',$email);
    $mahocvi= str_replace('\'','\\\'',$mahocvi);
    $id_gv= str_replace('\'','\\\'',$id_gv);
    if( $id!=''){
        // update 

        $sql="update dbo_giangvien set HoLot= '$holot' ,Ten ='$ten', NgaySinh ='$ngaysinh',
        Gioitinh='$gioitinh',quequan='$quequan', email='$email'
         where  id_GV='$id_gv'";
         execute($sql);
         echo '<script>
         alert("Sửa thông tin thành công");
         </script>';
    }
    else{
        // check khoa
        $sql_check_Fk="select * from dbo_giangvien where magv='".$magv."'";
        $array_check= executeResult($sql_check_Fk);
         
        if(count($array_check)<=0){
            //insert 
        $sql= "insert into dbo_giangvien(Magv,Holot,Ten,Ngaysinh, gioitinh,Quequan,matkhau,email,mahv) values
        ('$magv','$holot','$ten','$ngaysinh','$gioitinh','$quequan','$matkhau','$email','$mahocvi')";
        execute($sql);
        echo '<script>
            alert("Thêm giảng viên thành công");
            </script>';
        }
        else
        {
            echo '<script>
            alert("Mã giảng viên đã tồn tại");
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
                                        <input name="id_gv" style="display:none" value="<?=$id_gv?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="magv">Mã giảng viên <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="magv" value="<?=$magv?>" name="magv" required="required" class="form-control ">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="Holot">Họ lót <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="holot" name="holot" value="<?=$holot?>" required="required" class="form-control">
											</div>
										</div>

                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="Ten">Tên <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text"  name="ten" value="<?=$ten?>" required="required" class="form-control">
											</div>
										</div>

										<div class="item form-group">
											<label for="quequan" class="col-form-label col-md-3 col-sm-3 label-align">Quê quán</label>
											<div class="col-md-6 col-sm-6 ">
												<input  class="form-control" value="<?=$quequan?>" type="text" name="quequan">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Giới tính</label>
											<div class="col-md-6 col-sm-6 ">
                                                <?php
                                                if($gioitinh==1){
                                                    echo '

                                                    <input type="radio"  name="gioitinh" value="1" checked="checked" >
                                                      <label for="nam">Nam</label>
                                                      <input type="radio" name="gioitinh" value="0">
                                                      <label for="Nữ">Nữ</label><br>
                                                    ';
                                                }
                                                else{
                                                    echo '   <input type="radio"  name="gioitinh" value="1"  >
                                                      <label for="nam">Nam</label>
                                                      <input type="radio" name="gioitinh" value="0" checked="checked">
                                                      <label for="Nữ">Nữ</label><br>';

                                                }
                                                ?>
                                             
											</div>
										</div>

                                        <div class="item form-group">
											<label for="matkhau" class="col-form-label col-md-3 col-sm-3 label-align">Mật khẩu</label>
											<div class="col-md-6 col-sm-6 ">
												<input  class="form-control" type="password" name="matkhau">
											</div>
										</div>

                                        <div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
											<div class="col-md-6 col-sm-6 ">
												<input  class="form-control" value="<?=$email?>" type="text" name="email">
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Học vị</label>
											<div class="col-md-6 col-sm-6 ">
                                            <select name="hoc_vi" style="height:25px;font-size:14px" >
                                                <?php 
                                                $hoc_vi;
                                                if(isset($_POST["hoc_vi"])){
                                                    $hoc_vi=$_POST["hoc_vi"];
                                                } 
                                                else{
                                                    $hoc_vi="";
                                                }
                                                $sql_hoc_vi="select * from dbo_hocvi order by MaHV";
                                                $list_HV= executeResult($sql_hoc_vi);
                                                foreach( $list_HV as $hv){
                                                    echo '
                                                    <option value="'.$hv['MaHV'].'"; style="font-size:14px" 
                                                    ';
                                                    if($hv['MaHV']==$hoc_vi){
                                                        echo "selected";
                                                    }
                                                    echo '> '.$hv['TENHV'].' </option>';
                                                }
                                                
                                                ?>
                                    
                                            </select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Ngày sinh <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control"  value="<?=$ngaysinh?>" name="ngaysinh"   placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
												<button class="btn btn-primary" type="button" onclick="window.open('giangvien.php','_parent')">Cancel</button>
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