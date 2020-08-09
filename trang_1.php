<?php session_start(); 
	include_once("xl_csdl.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cua hang Hoa Dep</title>
<style type="text/css">
<!--
.style2 {
	color: #000099;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: smaller;
}
.style3 {
	color: #006633;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: smaller;
}
.style5 {
	font-size: smaller;
	font-weight: bold;
	color: #009933;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: smaller; }
a:link {
	color: #006633;
}
a:visited {
	color: #006633;
}
a:hover {
	color: #009900;
}
a:active {
	color: #009900;
}
.style12 {font-size: smaller}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr bgcolor="#F4FBEB">
    <td width="21%" valign="top"><img src="hinh_anh/LogotypeKvitka.gif" width="205" height="102" /></td>
    <td width="28%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="2">
      <tr>
        <td><span class="style5">(08) 9891234 </span></td>
      </tr>
      <tr>
        <td><span class="style10">(Giờ mở cửa: 8:00 - 22:00 mỗi ngày) </span></td>
      </tr>
      <tr>
        <td><span class="style10"><img src="hinh_anh/IconMail.gif" width="16" height="16" /> <a href="./ktphuong@hcmuns.edu.vn">ktphuong@hcmuns.edu.vn </a></span></td>
      </tr>
      <tr>
        <td><span class="style10"><img src="hinh_anh/online0.gif" width="18" height="18" />hoadep.com.vn</span></td>
      </tr>
    </table></td>
    <td width="27%" valign="top">
	<table width="100%" border="0" cellpadding="0" cellspacing="2">
      <form id="form1" name="form1" method="post" action="trang_1.php">
	  <tr>
        <td colspan="2"><div align="center" class="style5">          Đăng nhập</div></td>
        </tr>
      <tr>
        <td width="46%"><p class="style10">Tên đăng nhập: </p></td>
        <td width="54%"><span class="style10">
          <label>
            <input name="ten_dn" type="text" id="ten_dn" size="15" />
            </label>
        </span> </td>
      </tr>
      <tr>
        <td><p class="style10">Mật khẩu: </p></td>
        <td><span class="style10">
          <label>
            <input name="mat_khau" type="password" id="mat_khau" size="15" />
            </label>
        </span></td>
      </tr>
      
        <td colspan="2"><div align="center">
          <label>
          <input type="submit" name="Submit" value="Đăng nhập" />
          </label>
        </div></td>
        </tr>
	</form>
    </table></td>
    <td width="24%" valign="top"><table width="100%" border="0">
      <tr>
        <td valign="top"><div align="center" class="style5">          Có thể thanh toán bằng</div></td>
      </tr>
      <tr>
        <td valign="top"><div align="center" class="style10">
		<img src="hinh_anh/IconCardMasterCard.gif" width="37" height="23" />
		<img src="hinh_anh/IconCardVisaE.gif" width="37" height="23" />
		<img src="hinh_anh/IconCardVisa.gif" width="37" height="23" /></div></td>
      </tr>
      <tr>
        <td valign="top">
        <?php
		$ktra = 0;
		$dangnhap = 0;
		if(!empty($_POST["ten_dn"]) && !empty($_POST["mat_khau"]))
		{
			$_SESSION["ten_dn"]=$_POST["ten_dn"];
			$_SESSION["mat_khau"]=$_POST["mat_khau"];
		}
		if(!empty($_SESSION["ten_dn"]) && !empty($_SESSION["mat_khau"]))
		{
			$bangkhach=Doc_Bang_Khach_Hang();
			//Xử lý đăng nhập
			foreach ($bangkhach as $khach)
			{
				if(strpos($khach['TenDN'],$_SESSION["ten_dn"]) !== false)
				{
					$dangnhap = $khach;
					$ktra =1;
					break;
				}
			}
			if($ktra == 1)
			{
				if($dangnhap['MatKhau'] !== $_SESSION["mat_khau"])
				{
					$ktra = 0;
					echo 'Mặt khẩu sai';
				}
			}
			else echo 'Sai tên đăng nhập';
			if($ktra == 1)
			{
				$_SESSION['sodh']=$dangnhap['Makh'];
				echo 'Xin chào <b>'.$dangnhap["TenDN"].'   </b>';
				echo '<a href="trang_dat_hang_test.php"><img src="hinh_anh/gio_hang.jpg" width="30" heidht="30"></a>';
			}
		}
		else
		{
			$_SESSION['sodh']=0;
			echo "Hãy đăng nhập";
		}
		?>
        </td>
      </tr>
      <tr>
        <td valign="top"><div align="left" class="style10">
        <?php
		if($ktra==1)
			echo '<a href="trang_logout.php"> Thoát đăng nhập</a><img src="hinh_anh/click.gif">';
		?>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#D3F4CE"><span class="style3">&nbsp;Danh mục hoa</span></td>
    <td colspan="3" valign="top" background="hinh_anh/nen.jpg"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr align="center" class="style10" bgcolor="#CCFFCC">
        <td width="25%" height="23" bgcolor="#CCFFCC"><strong><a href="trang_1.php"><strong>Trang chủ</strong></a></td>
        <td width="25%"><strong><a href="trang_2.php"><strong>Tìm kiếm bó hoa</strong></a></td>
        <td width="28%"><strong><a href="trang_3.php"><strong>Thêm bó hoa mới</strong></a></td>
        <td width="22%"><strong><a href="trang_dang_ky.php">Đăng ký mới</a></strong></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#F4FBEB">
    <td valign="top" bgcolor="#F4FBEB"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="hinh_anh/nen.jpg">
      <tr>
        <td bgcolor="#C7EAB0"><table width="100%" border="0" bgcolor="#F4FBEB">
            <tr>
              <td><?php include_once("TH_LoaiHoa.php");?> </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>		  </td>
      </tr>
      <tr>
        <td valign="bottom" bgcolor="#F4FBEB"><img src="hinh_anh/BannerSideCreative.jpg" width="200" height="200" /></td>
      </tr>
    </table>    </td>
    <td colspan="3" valign="top" bgcolor="#FFFFFF"><?php include_once("TH_Hoa.php")?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#d3f4ce"><span class="style2">Copyright &copy;2003-2007 <br />
    Công ty thiết kế Ý Tưởng </span></td>
    <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
    <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
    <td bgcolor="#d3f4ce"><span class="style10"><img src="hinh_anh/IconMail.gif" width="16" height="16" />
	    <a href="./ktphuong@hcmuns.edu.vn">ktphuong@hcmuns.edu.vn</a>
      <br />
      <img src="hinh_anh/online0.gif" width="18" height="18" />hoadep.com.vn</span></td>
  </tr>
</table>
</body>
</html>
