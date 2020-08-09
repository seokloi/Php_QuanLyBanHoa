<?php
	include_once("xl_csdl.php");
	$banghoa=Doc_Bang_Hoa_ALL();
	//Lấy Mahoa được chọn
	$mahoa=0;
	$tontai=0;
	if(isset($_REQUEST["Mahoa"]))
		$mahoa=$_REQUEST["Mahoa"];
	foreach ($banghoa as $hoa)
	{
		if($hoa['mahoa']==$mahoa)
		{
			$tontai=1;
			echo '<table width="80%" border="1" cellspacing="0" align="center">';
			echo '<tr>';
			echo '<td width="30%" align="right">';
				echo '<img src="hinh_anh/'.$hoa['hinh'].'">';
			echo '</td>';
			echo '<td>';
				echo '<h3>'.$hoa['tenhoa'].'</h3>';
				echo '<i>Giá bán: </i>'.number_format($hoa['dongia']).' VNĐ<br><br>';
				echo '<i>Thành phần chính:</i><br>';
				echo $hoa['mota'];
				echo '<br><br><a href="trang_1.php">Quay về trang chính</a>';
			echo '</td>';
			echo '</tr>';
			echo '</table>';
		}
	}
	if($tontai==0)
	{
		echo '<p align="center">Mã hoa không tồn tại<br><br><a href="trang_1.php">Quay về trang chính</a></p>';
	}
?>