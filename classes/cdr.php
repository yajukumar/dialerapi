<?php
namespace Stratum\classes;

use Stratum\libs\db as Db;

class Cdr{

    public function dms(){
        $conn = Db::dbConnect();
        $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status = '0' ");
        $tolal_process = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['dms'] = $row['TOTAL_DATA'];
            }
        }

        $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status IS NULL ");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['S3'] = $row['TOTAL_DATA'];
            }
        }

	    $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status = '0' AND customer_id  IS NULL  ");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['dms_no_cust_id'] = $row['TOTAL_DATA'];
            }
        }

	    $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status = '0' AND customer_id  IS NOT NULL  ");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['dms_with_cust_id'] = $row['TOTAL_DATA'];
            }
        }

        $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status IS NULL AND customer_id IS NOT NULL ");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['S3_WITH_CUSTOMER_ID'] = $row['TOTAL_DATA'];
            }
        }
	
	    $result = $conn->query("SELECT count(*) AS TOTAL_DATA FROM asteriskcdrdb.cdr WHERE s3_status IS NULL AND customer_id IS NULL ");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process['S3_NO_CUSTOMER_ID'] = $row['TOTAL_DATA'];
            }
        }

        $api_result[] = $tolal_process;
        echo json_encode($api_result);
    }

}


?>
