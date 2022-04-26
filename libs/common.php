<?php
$db;
require_once("config.php");
require_once("libs/db.php");

function auto_login(){
		$db = $GLOBALS["db"];
	if (isset($_COOKIE["User"]) && isset($_COOKIE["Password"]) && isset($_COOKIE["Type"])){
		$user = $_COOKIE["User"];
		$pass = $_COOKIE["Password"];
		$type = $_COOKIE["Type"];
			
		if ($type == "sv"){
			$sql = "SELECT MaSV as User, concat(Holot,' ', Ten) as HoTen, MatKhau ".
					" FROM dbo_sinhvien WHERE MaSV='".$user."' ".
					" AND MatKhau ='".$pass."'";
		}else{
			$sql = "SELECT MaGV as User, concat(Holot,' ', Ten) as HoTen, MatKhau  ".
					" FROM dbo_giangvien WHERE MaGV='".$user."' ".
					" AND MatKhau ='". $pass ."'";
		}
		$result = $db->query($sql);
		// nếu xác thực thành công
		if($row = $result->fetch_array()){
	
			// tạo lại session
			$_SESSION["loggedin"]= true;
			$_SESSION["User"] = $row["User"];
			$_SESSION["HoTen"] = $row["HoTen"];
			$_SESSION["Type"] = $type;
				
			// đặt lại cookie với thời gian mới
			setcookie("User",$row["User"],time()+3600*24 );
			setcookie("Password",$row["MatKhau"],time()+3600*24);
			setcookie("Type",$type,time()+3600*24);
				
			header("location: index.php");
				
		}else{
			// xác thực không thành công, xóa cookie đã lưu
			setcookie("User","",time()-3600);
			setcookie("Password","",time()-3600);
			setcookie("Type","",time()-3600);
			header("location: ". $_SERVER["PHP_SELF"]);
		}
	}
}

/**
 * insert, update, delete -> su dung function
 */
function execute($sql) {
	//create connection toi database
	$db = $GLOBALS["db"];
	//query
	$db-> $sql;  

	//dong connection
	
}

/**
 * su dung cho lenh select => tra ve ket qua
 */
function executeResult($sql) {
	//create connection toi database
	$db = $GLOBALS["db"];

	//query
	$resultset = mysqli_query($db, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//dong connection
	mysqli_close($db);

	return $list;
}
?>

