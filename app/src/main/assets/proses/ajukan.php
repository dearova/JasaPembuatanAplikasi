<html>

<head>
	<link href="../sweetalert/sweetalert.css" rel="stylesheet" />
	<script src="../sweetalert/sweetalert.min.js"></script>
</head>
<body>
<?php
	 
    include "config.php";

     
	//$nip=$_POST['nip'];
	$nama=mysql_real_escape_string (trim($_POST['nama'])); 
	$email=mysql_real_escape_string (trim($_POST['email'])); 
	$phone=mysql_real_escape_string (trim($_POST['phone']));  
	$lembaga=mysql_real_escape_string (trim($_POST['lembaga'])); 
	$almlembaga=mysql_real_escape_string (trim($_POST['almlembaga'])); 
	$jabatan=mysql_real_escape_string (trim($_POST['jabatan'])); 
	$tujuan= mysql_real_escape_string (trim($_POST['tujuan'])); 
	$proses=mysql_real_escape_string (trim($_POST['proses'])); 
	$harga=mysql_real_escape_string (trim($_POST['harga'])); 
	$pesan=mysql_real_escape_string (trim($_POST['pesan'])); 
	
	 
	 
	 
	$ip=$_SERVER['REMOTE_ADDR'];
	$browser=$_SERVER['HTTP_USER_AGENT'];
	$date=date('Y-m-d H:i:s');
	$exp=explode(")",$browser);
	$exp2=$exp[0];
	
 

	//blokir yang login dari luar negeri (proxy)
	$url = "http://ipinfo.io/$ip/json?token=7f7a48a1e21326";
	$file = file_get_contents("$url");
	$ser= "[$file]";
	$json = json_decode($ser);
	$country= $json[0]->country;
	$city= $json[0]->city;
	$region= $json[0]->region;	
	
	
 
 
	
	 
		 
    //melakukan update data berdasarkan ID
    $sql = "insert into pengajuan (nama, email, telp, lembaga, almlembaga, jabatan, tujuan, proses, harga, komentar, tgl, ip, city, region, browser) 
	values ('$nama','$email', '$phone','$lembaga','$almlembaga', '$jabatan','$tujuan','$proses','$harga','$pesan','$date','$ip', '$city','$region','$exp2)')";
 
    $modal=mysql_query($sql);
    if ($modal){
					echo "<script>swal('Berhasil!', 'Data sudah dikirimkan!', 'success')</script>";
					
					echo "<meta http-equiv='refresh' content='2; url=../'>";
					
				}else{
					
					echo "<script>swal('Gagal!', 'Data gagal dikirim!', 'error')</script>";
					echo "<meta http-equiv='refresh' content='2; url=../'>";
					 
				}



?>
</body>
</html>