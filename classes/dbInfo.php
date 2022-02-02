<?php
namespace Stratum\classes;

use Stratum\libs\db as Db;

class DbInfo{

    public function getConnection(){
        $conn = Db::dbConnect();
        $result = $conn->query("show status where variable_name = 'threads_connected'");
        $tolal_connection = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_connection[] = array('Variable_name'=>$row['Variable_name'], 'Value'=>$row['Value']);
            }
        }
        $api_result['db_no_connection'] = $tolal_connection;
        echo json_encode($api_result);
    }

    public function connectionList(){
        $conn = Db::dbConnect();
        $result = $conn->query("show processlist");
        $tolal_process = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $tolal_process[] = array('Id'=>$row['Id'], 'User'=>$row['User'], 'Host'=>$row['Host'], 'db'=>$row['db'], 'Command'=>$row['Command'], 'Time'=>$row['Time'],'State'=>$row['State'], 'Info'=>$row['Info'], 'Progress'=>$row['Progress']);
            }
        }
        $api_result['process_list'] = $tolal_process;
        echo json_encode($api_result);
    }

    public function kill(){
        $conn = Db::dbConnect();
        $results = $conn->query("KILL $_GET[kill] ");
        $api_result['kill_process'] = "Process Killed: ".$_GET['kill'];
        echo json_encode($api_result);
    }

    public function dbBackupFilesCount(){
        $fi = new \FilesystemIterator('/var/www/dialer_automation/db_backup/', \FilesystemIterator::SKIP_DOTS);
        printf("There were %d Files in backup directory.", iterator_count($fi));
        exit;
    }

    public function cdrDataGroupByCalldate(){
        $conn       = Db::dbConnect();
        $result     = $conn->query(" SELECT DATE(calldate) AS CD FROM asteriskcdrdb.cdr GROUP BY DATE(calldate) ASC ");
        $total_date = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $total_date[] = $row['CD'];
            }
        }
        echo json_encode($total_date);
    }
}


?>
