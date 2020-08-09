<?php
//Lấy mã hoa duoc chon
include_once("xl_csdl.php");
if(isset($_POST["ten"]))
 {
	$tenhoa=$_POST["ten"];
	$banghoa=Tim_Hoa_Theo_Ten($tenhoa);
	echo '<table width="80%" align="center" cellpadding="5"/>';
	$dem=0;
	foreach ($banghoa as $hoa)
	{
		if($dem%2==0)
			echo '<tr>';
		echo '<td align="center">';
		echo '<table width="100%" border="0" align="center">';
		echo '<tr>';
		echo '<td width="30%" align="right">';
			echo '<img src="hinh_anh/'.$hoa['hinh'].'">';
		echo '</td>';
		echo '<td valign="top">';
			echo '<i>Tên bó hoa: </i><b>'.$hoa['tenhoa'].'</b><br><br>';
			echo '<i>Giá bán: </i>'.number_format($hoa['dongia']).' VNĐ<br><br>';
			echo '<i>Thành phần chính:</i><br>';
			echo $hoa['mota'];
		echo '</td>';
		echo '</tr>';
		echo '</table>';
		echo '</td>';
		$dem++;
		if($dem%2==0)
			echo '</tr>';
	}
	echo '</table>';
	}
?>