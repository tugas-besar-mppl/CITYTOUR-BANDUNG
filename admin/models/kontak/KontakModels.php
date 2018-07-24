  <?php   
  include_once '../../includes/koneksi.php';
  
  $aColumns = array("NO","Nama","Email","Subjek","Pesan","Tanggal","IdKontak" );
  $aColumnsType = array("string","string","string","string","string","string","string" );						 
		
  $strQuery = "SELECT  @curRow := @curRow + 1 AS NO, IdKontak, Nama, Email, Subjek, Pesan, DATE_FORMAT(Tanggal,'%d-%m-%Y %H:%i:%s') as Tanggal FROM tb_kontak  
					  JOIN (SELECT @curRow := 0) AS rNO ";
					 
  $strQueryCount = "SELECT COUNT(IdKontak) FROM tb_kontak ";
	
	/* 
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
        $sOrder = " ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".mysql_escape_string( $_GET['sSortDir_'.$i] ) .", ";
            }
        }
         
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == " ORDER BY" )
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
			if ($aColumnsType[$i] == "string" && $aColumns[$i] != "NO") {			
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
	
	$sQuery = $strQuery.$sWhere.$sOrder.$sLimit;
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
			} else if ($aColumnsType[$i] == 'date'){ 
				$date = explode("-",$aRow[ $aColumns[$i] ]);
				$row[] = $date[2]."-".$date[1]."-".$date[0];
			}else {
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
