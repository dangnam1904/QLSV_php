<?php
    session_start();
?>


<?php
require "header.php";
require_once "dbhelp.php";


if(isset($_SESSION['username'])){
    
}
else{
    exit();
}
?>
<html>
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
                                        <li><a href="monhoc.php">Môn học</a></li>
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

        <!-- Code ---->

        <div class="right_col" role="main">
                <div class="">
                        <div style="width:auto">
                            <div style="width:60%;float:left">
                                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                                    <label for ="class" style="font-size: 16px">Chọn khoa</label>
                                    <select name="khoa" style="height:25px;font-size:14px" >
                                        <?php 
                                         $khoa;
                                         if(isset($_POST["khoa"])){
                                             $khoa=$_POST["khoa"];
                                         } 
                                         else{
                                             $khoa="";
                                         }
                                        $sql_khoa="select * from dbo_khoa order by Makhoa";
                                        $list_k= executeResult($sql_khoa);
                                        foreach( $list_k as $k){
                                            echo '
                                            <option value="'.$k['MaKhoa'].'"; style="font-size:14px" 
                                            ';
                                            if($k['MaKhoa']==$khoa){
                                                echo "selected";
                                            }
                                            echo '> '.$k['TenKhoa'].' </option>';
                                        }
                                        
                                        ?>
                                    
                                    </select>
                                    <button type="submit"> Hiển thị</button>
                                </form>
                            </div>
                            <form method="get">
                            <div class="input-group" style="width:25%;float:right;" >
                                <div class="form-outline">
                                    <input id="search-input" type="search" id="form1" name="search" class="form-control" placeholder="Tìm theo tên môn học" />
                                
                                </div>
                                <button id="search-button" type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                            </form>

                        </div>
                      
                    
                   
                    <div class="clearfix"></div>
                    <div>
                           <button  onclick="window.open('add_monhoc.php','_seft')"> Thêm môn học</button>
                       </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            
                            
                                                <table id="" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th> STT</th>
                                                            <th style="display:none">Id </th>
                                                            <th>Mã môn học</th>
                                                            <th>Tên môn học</th>
                                                            <th>Số tín chỉ  </th>
                                                            <th>Số tiết LT</th>
                                                            <th>Số tiết TH</th>
                                                            <th>Học phí</th>
                                                            <th> Chỉnh sửa</th>
                                                        </tr>
                                                    </thead>

                                               
                                                    <tbody>
                                                    <?php
                                                    $sql_monhoc='';
                                                   if( isset( $_GET['search']) && $_GET['search']!='' ){
                                                     $key_seach= $_GET['search'];
                                                     $sql_monhoc="SELECT * FROM dbo_monhoc mh inner join dbo_nhomhocphi hp on hp.MaNhomHP= mh.MaNhomHP where  TenMH like '%".$key_seach."%' ";
                                                   }
                                                   else{
                                                    $sql_monhoc="SELECT * FROM dbo_monhoc mh inner join dbo_nhomhocphi hp on hp.MaNhomHP= mh.MaNhomHP where makhoa= '".$khoa."'";
                                                   }
                                                    
                                                    $id=1;
                                                    $list_mh= executeResult($sql_monhoc);
                                                    // if( empty($list_sv)){
                                                    //     echo ' Không có giảng viên';
                                                    // }
                                                    foreach( $list_mh as $mh){
                                                       
                                                        echo '
                                                        <tr>
                                                        <td>' .($id++). '</td>
                                                        <td style="display:none">' .$mh['id_monhoc']. '</td>
                                                        <td>' .$mh['MaMH']. '</td>
                                                        <td>'.$mh['TenMH'].' </td>
                                                        
                                                        <td>' .$mh['SoTC'].'</td>
                                                        <td>' .$mh['SoTietLT'].'</td>
                                                        <td>' .$mh['SoTietTH'].'</td>
                                                        <td>' .$mh['MucHocPhi'].'</td>
                                                        <td> <button style="border-radius:4px;" onclick=\'window.open("add_giangvien.php?id='.$mh['id_monhoc'].'","_self")\'> <i class="fa fa-edit" style="color:#0066ff"></i> </button> &nbsp;&nbsp;
                                                         <button style="border-radius:4px;"  onclick="deleteTeacher('.$mh['id_monhoc'].')"><i class="fa fa-remove" style="color:#0066ff"></i> </button></td>
                                                        <tr>';

                                                    }
                                                ?>
                                                        
                                            
                                                    </tbody>
                                                </table>
                                               
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                                    function deleteTeacher(id_gv){
                                                        option = confirm("Ban muốn xóa giảng viên  này không")
                                                        if( !option){
                                                            return;
                                                        }
                                                        
                                                        $.post('delete_gv.php',{
                                                            'id':id_gv
                                                        },function(data){
                                                            alert(data);
                                                            location.reload()
                                                        })
 
                                                    }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    
</body>
</html>
<?php 
 require "footer.php";
?>

