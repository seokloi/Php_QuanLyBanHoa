<?php
	 $error = 0;
	 $options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
	 $dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '',$options);
	 $bangkhachhang = $dbh->query('select * from khachhang');
	 //Xử lý dữ liệu
	 if(!empty($_POST["ten_dn"]) && !empty($_POST["mat_khau"]) && !empty($_POST["mat_khau1"]) && !empty($_POST["ho_ten"]) && !empty($_POST["email"]) && !empty($_POST["dia_chi"]) && !empty($_POST["so_dt"]))
	 {
		//Xử lý đăng ký
		foreach ($bangkhachhang as $khach)
		{
			if(strpos($khach['Makh'],$_POST["ten_dn"]) !== false)
			{
				$error = 1;
				echo "<p align='center'>Tên đăng nhập đã tồn tại";
				break;
			}
			if($_POST["mat_khau"] !== $_POST["mat_khau1"])
			{
				$error = 1;
				echo "<p align='center'>Mặt khẩu xác nhận không đúng";
				break;
			}
		}
		if($error == 0)
		{
			$caulenh="insert into khachhang(TenDN,MatKhau,HoTen,DiaChi,DienThoai,Email)
			values('".$_POST["ten_dn"]."','".$_POST["mat_khau"]."','".$_POST["ho_ten"]."','".$_POST["dia_chi"]."','".$_POST["so_dt"]."','".$_POST["email"]."')";
			$dbh->exec($caulenh);
	 		echo "<p align='center'>Đăng ký thành công";
		}
	 }
	 else echo "<p align='center'>Hãy nhập đủ các thông tin!";
?>