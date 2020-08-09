<?php
function Doc_Bang_Hoa_ALL()
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$Banghoa = $dbh->query('select * from hoa');
	return $Banghoa;
}

function Doc_Bang_Hoa($maloai)
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$Banghoa = $dbh->query('select * from hoa where maloai='.$maloai);
	return $Banghoa;
}

function Doc_Bang_Loai_Hoa()
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$BangLoaihoa = $dbh->query('select * from loaihoa');
	return $BangLoaihoa;
}

function Doc_Bang_Khach_Hang()
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$BangKhachHang = $dbh->query('select * from khachhang');
	return $BangKhachHang;
}

function Doc_Bang_Chi_Tiet_Don_Hang()
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$BangChiTietDonHang = $dbh->query('select * from ctdonhang');
	return $BangChiTietDonHang;
}

function Doc_Bang_Don_Hang($sodh)
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$BangHD = $dbh->query('select * from ctdonhang where sodh='.$sodh);
	return $BangHD;
}

function Tim_Hoa_Theo_Ten($ten)
{
	$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '');
	$dbh->query("set names utf8");
	//thuc hien cau truy van
	$Banghoa = $dbh->query("select * from hoa where tenhoa like '%".$ten."%'");
	return $Banghoa;
}

?>