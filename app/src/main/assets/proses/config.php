<?php
// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "jpap";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

define( 'VALIDASI', 1 );
define("nama_aplikasi","JPAP");
define("nama_perusahaan","JPAP");
define("alamat_perusahaan","JPAP");
 

error_reporting(E_STRICT  | ~E_NOTICE);



?>
