<?php
if(!empty($_POST["dia_chi"]))
{        
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '',$options);
	$bangkhachhang=$dbh->query("select * from khachhang");
	foreach($bangkhachhang as $khachhang)
	{
		if($khachhang['TenDN']==$_SESSION['ten_dn'])
		{
			$caulenh="insert into donhang(ngaydh,makh,hoten,diachi,email,dienthoai,trangthai)
			values(curdate(),".$khachhang['Makh'].",'".$khachhang['HoTen']."','".$_POST['dia_chi']."','".$khachhang['Email']."','".$khachhang['DienThoai']."',0)";
			$dbh->exec($caulenh);
			echo '<b>Chúng tôi sẽ giao hàng cho bạn tại địa chỉ:';
			echo '<br>'.$_POST["dia_chi"].'</b>';  
		}	
	}
}
?>