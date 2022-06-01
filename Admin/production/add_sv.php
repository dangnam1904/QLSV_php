<?php

require "header.php";
require_once "dbhelp.php";
$masv =$holot=$ten=$quequan=$gioitinh=$malop=$matkhau= $email=$id_sv= $ngaysinh='';
if (!empty($_POST)){
   
    if(isset($_POST['masv'])){
        $masv= $_POST['masv'];
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
    if(isset($_POST['lop'])){
        $malop= $_POST['lop'];
    }
    if(isset($_POST['quequan'])){
        $quequan= $_POST['quequan'];
    }

    if(isset($_POST['ngaysinh'])){
        $ngaysinh= $_POST['ngaysinh'];
    }
    if(isset($_POST['id_sv'])){
        $id_sv= $_POST['id_sv'];
    }
    
    // Tránh lỗi sql injection //
    $masv= str_replace('\'','\\\'',$masv);
    $holot= str_replace('\'','\\\'',$holot);
    $ten= str_replace('\'','\\\'',$ten);
    $ngaysinh= str_replace('\'','\\\'',$ngaysinh);
    $gioitinh= str_replace('\'','\\\'',$gioitinh);
    $quequan= str_replace('\'','\\\'',$quequan);
    $matkhau= str_replace('\'','\\\'',$matkhau);
    $email= str_replace('\'','\\\'',$email);
    $malop= str_replace('\'','\\\'',$malop);
    $id_sv= str_replace('\'','\\\'',$id_sv);

   
   
    if( $id_sv!=''){
        // update
        $sql="update dbo_sinhvien set HoLot= '$holot' ,Ten ='$ten', NgaySinh ='$ngaysinh',
        Gioitinh='$gioitinh',quequan='$quequan', email='$email'
         where  id_sv='$id_sv'";
         execute($sql);
    }
    else{
        // check khoa
        $sql_check_Fk="select * from dbo_sinhvien where masv='".$masv."'";
        $array_check= executeResult($sql_check_Fk);
        if( $array_check!=null && count($array_check)<=0){
            $sql= "insert into dbo_sinhvien(MaSV,Holot,Ten,Ngaysinh, gioitinh,Quequan,matkhau,email,malop) values
            ('$masv','$holot','$ten','$ngaysinh','$gioitinh','$quequan','$matkhau','$email','$malop')";
                 execute($sql);
        }
        
    }
    
}

$id='';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select *from dbo_sinhvien where id_sv='".$id."'";
    $sv_list=executeResult($sql);
    if( $sv_list!=null && count($sv_list)>0){
        $sv=$sv_list[0];
        $id_sv=$sv['id_sv'];
        $masv= $sv['MaSV'];
        $malop=$sv['MaLop'];
        $holot=$sv['Holot'];
        $ten=$sv['Ten'];
        $ngaysinh=$sv['NgaySinh'];
        $gioitinh=$sv['GioiTinh'];
        $quequan=$sv['QueQuan'];
        $matkhau=$sv['MatKhau'];
        $email=$sv['Email'];

    }
    else{
        $id='';
    }
}

?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Trang quản trị</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

                                </li>
                                <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="form.html">General Form</a></li>
                                        <li><a href="form_advanced.html">Advanced Components</a></li>
                                        <li><a href="form_validation.html">Form Validation</a></li>
                                        <li><a href="form_wizards.html">Form Wizard</a></li>
                                        <li><a href="form_upload.html">Form Upload</a></li>
                                        <li><a href="form_buttons.html">Form Buttons</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="general_elements.html">General Elements</a></li>
                                        <li><a href="media_gallery.html">Media Gallery</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                        <li><a href="icons.html">Icons</a></li>
                                        <li><a href="glyphicons.html">Glyphicons</a></li>
                                        <li><a href="widgets.html">Widgets</a></li>
                                        <li><a href="invoice.html">Invoice</a></li>
                                        <li><a href="inbox.html">Inbox</a></li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-group" style="color:white; font-size:20px"></i>Người dùng <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="sinhvien.php">Sinh viên</a></li>
                                        <li><a href="media_gallery.html">Giảng viên</a></li>

                                    </ul>
                                </li>
                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Tables</a></li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a></li>
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
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                                    <img src="images/img.jpg" alt="">John Doe
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                          <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>

                                            <li class="nav-item">
                                                <div class="text-center">
                                                    <a class="dropdown-item">
                                                        <strong>See All Alerts</strong>
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
                                        <input name="id_sv" value=<?=$id_sv?> style="visibility:hidden" >
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="masv">Mã sinh viên <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="masv" value="<?=$masv?>" name="masv" required="required" class="form-control ">
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
											<label class="col-form-label col-md-3 col-sm-3 label-align">Lớp</label>
											<div class="col-md-6 col-sm-6 ">
												<select name="lop" class="form-control">

                                                <?php 
                                                    $sql_class="select * from dbo_lopchuyennganh";
                                                    $list_class= executeResult($sql_class);
                                                    foreach( $list_class as $class){
                                                        echo '
                                                        <option value="'.$class['MaLop'].'" style="font-size:14px"> '.$class['TenLop'].' </option>
                                                        ';
                                                    }
                                                ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Ngày sinh <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" class="date-picker form-control"  value=<?=$ngaysinh?> name="ngaysinh"   placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
												<button class="btn btn-primary" type="button" onclick="window.open('sinhvien.php','_parent')">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
    </div>
    
</body>


</html>
<?php 
 require "footer.php";
?>