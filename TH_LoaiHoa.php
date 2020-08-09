<?php
//Mở tập tin để đọc tu dong tu
include_once("xl_csdl.php");
$bangloaihoa=Doc_Bang_Loai_Hoa();
//Xuat
foreach($bangloaihoa as $loaihoa)
{
	echo"<a href='Trang_1.php?Maloai=".$loaihoa["Maloai"]."'>".$loaihoa["Tenloai"]."</a><br>";
}
?>
