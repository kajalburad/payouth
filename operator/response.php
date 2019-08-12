
<?php
	//include connection file 
	include_once("database.php");
	 
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

                                    
	//define index of column
	$columns = array( 
		0 =>'fees_transaction_id',
		1 =>'fees_gateway_payment_id', 
		2 => 'fees_transaction_id',
		3 => 'fees_type',
		4 => 'fees_user_rfid',
		5 => 'fees_user_mobile',
		6 => 'fees_user_email',
		7 => 'fees_paid_amount',
		8 => 'fees_payment_type',
		9 => 'fees_billing_instrument',
		10 => 'fees_status',
		11 => 'fees_paid_datetime'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( fees_gateway_payment_id LIKE '".$params['search']['value']."%' ";    
		$where .=" OR fees_transaction_id LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_type LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_user_rfid LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_user_mobile LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_user_email LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_paid_amount LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_payment_type LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_billing_instrument LIKE '".$params['search']['value']."%' ";
		$where .=" OR fees_status LIKE '".$params['search']['value']."%' ";

		$where .=" OR  fees_paid_datetime LIKE '".$params['search']['value']."%' )";
	}

	// getting total number records without any search
	$sql = "SELECT * FROM admission_fees_transactions ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 
		$data[] = $row;
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	