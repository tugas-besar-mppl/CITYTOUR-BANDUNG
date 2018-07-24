  <?php   
  include_once '../../includes/koneksi.php';
  
  $aColumns = array("KodeBooking","Jenis","Paket","Nama","JmlHari","TotalHarga","TanggalRegistrasi","TanggalBookingAwal","TanggalBookingAkhir","StatusBayar","IdBooking");
  $aColumnsType = array("string","string", "string","string","string","string","string","string","string","string", "string");						 
		
  $strQuery = "SELECT
  tb_booking.IdBooking,
  tb_booking.KodeBooking,
  m_kendaraan.Jenis,
  m_wisata.Paket,
  m_pelanggan.Nama,
  tb_booking.JmlHari,
  tb_booking.TotalHarga,
  DATE_FORMAT(tb_booking.TanggalRegistrasi,'%d-%m-%Y %H:%i:%s') AS TanggalRegistrasi,
  DATE_FORMAT(tb_booking.TanggalBookingAwal,'%d-%m-%Y') AS TanggalBookingAwal,
  DATE_FORMAT(tb_booking.TanggalBookingAkhir,'%d-%m-%Y') AS TanggalBookingAkhir,
  tb_booking.StatusBayar
FROM tb_booking
  INNER JOIN m_kendaraan
    ON tb_booking.IdKendaraan = m_kendaraan.IdKendaraan
  INNER JOIN m_wisata
    ON tb_booking.IdWisata = m_wisata.IdWisata
  INNER JOIN m_pelanggan
    ON tb_booking.IdPelanggan = m_pelanggan.IdPelanggan
     ";
					 
  $strQueryCount = "SELECT COUNT(tb_booking.IdBooking) FROM tb_booking
  INNER JOIN m_kendaraan
    ON tb_booking.IdKendaraan = m_kendaraan.IdKendaraan
  INNER JOIN m_wisata
    ON tb_booking.IdWisata = m_wisata.IdWisata
  INNER JOIN m_pelanggan
    ON tb_booking.IdPelanggan = m_pelanggan.IdPelanggan ";
	
	/* include_once '../../config/koneksi.php';
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = " LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
     
     
    /*
     * Ordering
     */
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = " ORDER BY   ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysql_escape_string( $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == " ORDER BY DATE_FORMAT(tb_booking.TanggalRegistrasi,'%d-%m-%Y %H:%i:%s')" )
        {
            $sOrder = " ";
        }
    }
     
     
    /*
     * Filtering
     * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
     * on which ILIKE can be used). Boolean fields etc will need a modification here.
     */
    $sWhere = " ";
    if ( isset($_GET['key']) && !empty($_GET['val']))
    {
        $sWhere = " WHERE (";				 
        $sWhere .= $_GET['key']." LIKE '%".mysql_escape_string( $_GET['val'] )."%' ";
        //$sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")";
    }
     //print_r($aColumnsType);
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{     
			if ($aColumnsType[$i] == "string" && $aColumns[$i] != "IdBooking") {			
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_escape_string( $_GET['sSearch'] )."%' OR ";
			}
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	//$group = "GROUP BY m_anggota.Nama";
	$sQuery = $strQuery.$sWhere.$group.$sOrder.$sLimit;	
	//echo $sQuery."<br>";
	$rResult = mysql_query($sQuery);
	
		/* Data set length after filtering */
	
	$sQuery = $strQueryCount.$sWhere;
	//echo $sQuery;
	$rResultFilterTotal = mysql_query($sQuery);
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */	
	$sQuery = $strQueryCount;
	$rResultTotal = mysql_query( $sQuery );
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
		    if ($aColumnsType[$i] == 'double'){ 
			    $row[] = number_format($aRow[ $aColumns[$i] ]);
			} else if ($aColumnsType[$i] == 'enum'){ 
				if ($aRow[ $aColumns[$i] ] == '1')
					$row[] = 'ya';
				else
					$row[] = 'tidak';
			} else {
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}		
		$output['aaData'][] = $row;
	}
	
    echo json_encode( $output );
     
    // Free resultset
    mysql_free_result($rResult);
     
    // Closing connection
    mysql_close();
	
  ?>
