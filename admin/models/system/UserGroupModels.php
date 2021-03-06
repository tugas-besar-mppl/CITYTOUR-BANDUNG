  <?php   
  include_once '../../includes/koneksi.php';
  
  $aColumns = array("NO", "NamaGroup","", "IdGroup" );
  $aColumnsType = array("string", "string","","string");						 
		
  $strQuery = "SELECT @curRow := @curRow + 1 AS NO,NamaGroup, IdGroup FROM user_group JOIN (SELECT @curRow := 0) AS rNO 
  			   WHERE StatusDelete = 'T' ";
					 
  $strQueryCount = "SELECT COUNT(IdGroup) FROM user_group WHERE StatusDelete = 'T' ";
	
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
        $sWhere = " AND (";				 
        $sWhere .= $_GET['key']." LIKE '%".mysql_escape_string( $_GET['val'] )."%' ";
        //$sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")";
    }
     //print_r($aColumnsType);
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = " AND (";
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
		$menuText ="";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
		    if ($aColumnsType[$i] == 'double'){ 
			    $row[] = number_format($aRow[ $aColumns[$i] ]);
			} else if ($aColumnsType[$i] == 'enum'){ 
				if ($aRow[ $aColumns[$i] ] == '1')
					$row[] = 'ya';
				else
					$row[] = 'tidak';
			} else if ($i == "2"){
				$strMenulevel =  "SELECT b.text FROM user_group_menu a INNER JOIN menu b ON a.menu_id=b.menu_id WHERE a.id_group =  '".$aRow["IdGroup"]."'";
							//echo $strMenulevel."<br>";
						   $hasilMenulevel = mysql_query($strMenulevel);
						   while($rowMenulevel = mysql_fetch_array($hasilMenulevel)) 													 
						   {
						     $menuText .= $rowMenulevel["text"].", ";
						   }
						   $row[] = $menuText;
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
