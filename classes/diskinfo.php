<?php
namespace Stratum\classes;

//use Stratum\libs\db as Db;

class DiskInfo{

    public function df(){
        echo shell_exec('df -h');
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
}


?>