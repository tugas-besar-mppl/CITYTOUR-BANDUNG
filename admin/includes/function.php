<?php
function autonumber($field,$table) {
	    $sql=mysql_query("SELECT COUNT(*) AS cdata FROM $table");			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sql_num=mysql_query("SELECT $field FROM $table ORDER BY $field DESC LIMIT 1");			
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}		
		return $number; //hasil terakhir di database +1
}

function autonumber_plus($field,$table) {
	    $sql=mysql_query("SELECT $field AS cdata FROM $table ORDER BY $field DESC LIMIT 1");			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sql_num=mysql_query("SELECT $field FROM $table ORDER BY $field DESC LIMIT 1");			
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}		
		return $number; //hasil terakhir di database +1
}

function kode_anggota() {
		$sql_jml_data = "SELECT COUNT(*) AS cdata FROM m_anggota";
	    $sql=mysql_query($sql_jml_data);			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sqljmlnum = "SELECT CAST(SUBSTRING(KodeAnggota,6) AS UNSIGNED) FROM m_anggota ORDER BY IdAnggota DESC LIMIT 1";
			$sql_num=mysql_query($sqljmlnum);				
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}
			if (strlen($number) == "1") {
				$number = "000".$number;
			} else if (strlen($number) == "2") {
				$number = "00".$number;
			} else if (strlen($number) == "3") {
				$number = "0".$number;
			} else if (strlen($number) == "4") {
				$number = $number;
			}
		
		return date("y").$number; //hasil terakhir di database +1
}
function autonumber_peminjaman() {
		$sql_jml_data = "SELECT COUNT(*) AS cdata FROM tb_peminjaman WHERE DATE_FORMAT(TanggalPeminjaman,'%y%m') = '".date("ym")."'";
	    $sql=mysql_query($sql_jml_data);			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sqljmlnum = "SELECT CAST(SUBSTRING(NomorPeminjaman,7) AS UNSIGNED) FROM tb_peminjaman WHERE DATE_FORMAT(TanggalPeminjaman,'%y%m') = '".date("ym")."' ORDER BY IdPeminjaman DESC LIMIT 1";
			$sql_num=mysql_query($sqljmlnum);				
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}
			if (strlen($number) == "1") {
				$number = "000".$number;
			} else if (strlen($number) == "2") {
				$number = "00".$number;
			} else if (strlen($number) == "3") {
				$number = "0".$number;
			} else if (strlen($number) == "4") {
				$number = $number;
			}
		
		return date("ym").$number; //hasil terakhir di database +1
}

function autonumber_penjualan() {
		$sql_jml_data = "SELECT COUNT(*) AS cdata FROM penjualan WHERE DATE_FORMAT(tgl_penjualan,'%m%Y') = '".date("mY")."'";
	    $sql=mysql_query($sql_jml_data);			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sqljmlnum = "SELECT CAST(SUBSTRING(no_penjualan,7) AS UNSIGNED) FROM penjualan WHERE DATE_FORMAT(tgl_penjualan,'%m%Y') = '".date("mY")."' ORDER BY id_penjualan DESC LIMIT 1";
			$sql_num=mysql_query($sqljmlnum);				
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}
			if (strlen($number) == "1") {
				$number = "0000".$number;
			} else if (strlen($number) == "2") {
				$number = "000".$number;
			} else if (strlen($number) == "3") {
				$number = "00".$number;
			} else if (strlen($number) == "4") {
				$number = "0".$number;
			} else if (strlen($number) == "5") {
				$number = $number;
			}
		
		return date("mY").$number; //hasil terakhir di database +1
}

function autonumber_kondisi($field,$table,$valkondisi,$fieldkondisi, $strnol) {
	    $sql=mysql_query("SELECT COUNT(*) AS cdata FROM $table WHERE $fieldkondisi = '".$valkondisi."'");			
		$row=mysql_fetch_array($sql);		
		
		$jmldata=$row['cdata'];
		if ($jmldata==0)
		    $number = '1';
		else {
			$sql_num=mysql_query("SELECT $field FROM $table WHERE $fieldkondisi = '".$valkondisi."' ORDER BY $field DESC LIMIT 1");			
			$row_num=mysql_fetch_array($sql_num);
			$number = intval($row_num[0])+1;
		}
		if ($strnol) {
			if (strlen($number) == "1") {
			$number = "0000".$number;
			} else if (strlen($number) == "2") {
				$number = "000".$number;
			} else if (strlen($number) == "3") {
				$number = "00".$number;
			} else if (strlen($number) == "4") {
				$number = "0".$number;
			} else if (strlen($number) == "5") {
				$number = $number;
			}
		}
		return $number; //hasil terakhir di database +1
}



function get_kode($field,$table, $valkondisi,$fieldkondisi) {
	 $sql=mysql_query("SELECT $field AS kode FROM $table WHERE $fieldkondisi = '".$valkondisi."'");			
	 $row=mysql_fetch_array($sql);
	 return $row['kode'];
}

	function jum_hari($bln,$thn){
		switch($bln){
			case 1 : $jum_hari = 31; break;
			case 3 : $jum_hari = 31; break;
			case 5 : $jum_hari = 31; break;
			case 7 : $jum_hari = 31; break;
			case 10 : $jum_hari = 31; break;
			case 12 : $jum_hari = 31; break;
			case 4 : $jum_hari = 30; break;
			case 6 : $jum_hari = 30; break;
			case 8 : $jum_hari = 30; break;
			case 9 : $jum_hari = 30; break;
			case 11 : $jum_hari = 30; break;
			case 2 :  if ($thn % 400 == 0 || ($thn % 4 == 0 && $thn % 100 != 0)) {
						$jum_hari = 29;
					 }else{
						$jum_hari = 28;
					 }
					 break;
		}
		return $jum_hari;
	}
function tgl_mysql($tgl)
{
	$tanggal = explode("-",$tgl);
	return $tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
}

function tgl_mysql_garing($tgl)
{
	$tanggal = explode("/",$tgl);
	//if ($tanggal[0].length==1) $tanggal[0]="0".$tanggal[0];
	//if ($tanggal[1].length==1) $tanggal[1]="0".$tanggal[1];
	return $tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
}

function getTarifJasaMedis($jasa_medis, $tarif_restitusi) {
	$umk = $_SESSION["umk"];
	if ($jasa_medis == "1" || $jasa_medis == "3") {
		return 2 * $umk / 200;
	}
	 else  {
		if ($jasa_medis == "6") {
			return $_SESSION["harga_dokter_spesialis"];
		}
		 else  {
			return $tarif_restitusi;
		}
	}
	return;
}
function curl_download($url, $fields){
if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');
//print $fields_string;
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);
//echo $result;
curl_close($ch);	
return $result;
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>