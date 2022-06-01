<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php 
    
    require_once('dbhelp.php');
    

    $username =$password='';
    if (!empty($_POST)){
       
        if(isset($_POST['username'])){
            $username= $_POST['username'];
        }
        if(isset($_POST['password'])){
            $password= md5($_POST['password']);
        }
        $sql="select *from dbo_admin where tendn='".$username."' and matkhau='".$password."'";
        $result= executeResult($sql);
        if($result!=null && count($result)>0){
            $admin=$result[0];
            $_SESSION["username"]=$admin['TenDN'];
           // echo $_SESSION['username'];
            header("location: index.php");
        }
        else{
            echo "<div class='error'><br><div align='center'>Tên đăng nhập và mật khẩu không hợp lệ. <br>";
			echo " <a href='".$_SERVER["PHP_SELF"]."'> Thử lại </a> </div> </div><br>";
            
        }
    }
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>


<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                        <h1>Đăng nhập</h1>
                        <div>
                            <input type="text" class="form-control" name="username" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" >Đăng nhập</button>
                            <a class="reset_pass" href="#">Quên mật khẩu</a>
                        </div>
                      
                        <div class="clearfix"></div>


                    </form>
                </section>
            </div>


        </div>
    </div>


</body>

</html>