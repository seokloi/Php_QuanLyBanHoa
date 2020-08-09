<?php
	include_once("xl_csdl.php");
	//Khi nhận dữ liệu của Maloai
	$dem=0;
	$maloai=0;
	if(isset($_REQUEST["Maloai"]))
	{
		$maloai=$_REQUEST["Maloai"];
		$banghoa=Doc_Bang_Hoa($maloai);
	}
	else $banghoa=Doc_Bang_Hoa_ALL();
	//Dữ liệu hoa
	echo '<table width="80%" align="center" cellpadding="5"/>';
	foreach ($banghoa as $hoa)
	{
		//Hiển thị
		if($dem%3==0)
			echo '<tr>';
		echo '<td align="center">';
		echo '<img src="hinh_anh/'.$hoa['hinh'].'" width="150" height="200"/><br>';
		echo '<a href="trang_chi_tiet_hoa.php?Mahoa='.$hoa['mahoa'].'"/><b>'.$hoa['tenhoa'].'</b></a>';
		echo '<a href="trang_1.php?sohd='.$_SESSION['sodh'].'&&ma='.$hoa['mahoa'].'&&ten='.$hoa['tenhoa'].'&&gia='.$hoa['dongia'].'"><img src="hinh_anh/gio_hang.jpg" width="30" heidht="30"></a><br>';
		echo '<i>Giá bán:</i> '.number_format($hoa['dongia']).' VNĐ';
		echo '</td>';
		$dem++;
		if($dem%3==0)
			echo '</tr>';
	}
	echo '</table>';
?>

<?php
	include_once("xl_csdl.php");
	if(isset($_GET["ma"])&&isset($_GET["ten"])&&isset($_GET["gia"])&&$ktra==1)
	{
		addgiohang($_SESSION["sodh"],$_GET["ma"],$_GET["ten"],$_GET["gia"]);
	}
	function addgiohang($sodh,$ma,$ten,$gia)
	{
		$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		$dbh = new PDO('mysql:host=localhost;dbname=qlbanhoa', 'root', '',$options);
		$ctdonhang=Doc_Bang_Chi_Tiet_Don_Hang();
		$ktra=0;
		foreach ($ctdonhang as $donhang)
		{
			if( $sodh == $donhang['sodh'] && $ma == $donhang['mahoa'])
				{
					$ktra = 1;
					break;
				}
		}
		if($ktra ==0)
		{
			$caulenh="insert into ctdonhang(sodh,mahoa,soluong,dongia,thanhtien)
			values(".$sodh.",".$ma.",1,".$gia.",".$gia.")";
			$dbh->exec($caulenh);
			echo "<script>alert('Thêm thành công!');</script>";
		}
		else
		{
			$caulenh="update ctdonhang set soluong=soluong+1, thanhtien=dongia*soluong where sodh='".$sodh."'and mahoa='".$ma."'";
			$dbh->exec($caulenh);
			echo "<script>alert('Thêm thành công!');</script>";
		}
	}
?>