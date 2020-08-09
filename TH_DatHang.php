<?php 
	include_once("xl_csdl.php");
	$giohang=Doc_Bang_Don_Hang($_SESSION['sodh']);
	//Xử lý giỏ hàng
	echo '<table border="1">
		<tr align="center">
			<td colspan="4"><img src="hinh_anh/gio_hang.jpg" width="20" heidht="20">Giỏ hàng của <b>'.$_SESSION["ten_dn"].'</b></td>
		</tr>
		<tr align="center">
			<td width="150">Mã bó hoa</td>
			<td width="100">Số lượng</td>
			<td width="200">Giá bán</td>
			<td width="200">Thành tiền</td>
		</tr>';
	$tong = 0;
	foreach ($giohang as $hoa)
	{
		echo '<tr align="center">';
		echo '<td>'.$hoa['mahoa'].'</td>';
		echo '<td>'.$hoa['soluong'].'</td>';
		echo '<td>'.number_format($hoa['dongia']).' VNĐ</td>';
		echo '<td>'.number_format($hoa['thanhtien']).' VNĐ</td>';
		$tong = $tong + $hoa['thanhtien'];
		echo '</tr>';
	}
	echo '<tr align="right">
			<td colspan="4">
				<i>Tổng cộng: </i><b>'.number_format($tong).'VNĐ</b>
			</td>
		</tr>
		</table>';
?>