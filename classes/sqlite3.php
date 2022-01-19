<?php
namespace Stratum\classes;

//use Stratum\libs\db as Db;

class Sqlite3{

    private $db_name = NULL;
    private $db_path = '/var/www/html/stratum/db/';

    private function connectDatabase(){
        return new \SQLite3($this->db_path.$this->db_name);
    }

    private function closeDatabase(){
        return new \SQLite3($this->db_path.$this->db_name);
    }

    public function userSessionReport(){
        $this->db_name = 'stashfin.db';
        $db = $this->connectDatabase();
        //$db->exec('CREATE TABLE agent_session (bar STRING)');
       // $db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");
       // $result = $db->query('SELECT bar FROM foo');
       // var_dump($result->fetchArray());
        $db->close();
    }

    public function testSqlite3(){
        /**
        $db = new \SQLite3('/var/www/db/menu.db');
        $db->query("INSERT INTO menu (
            id,
            IdParent,
            Link,
            Name,
            Type,
            order_no
        )
        VALUES (
            'user_session',
            'reports_ingoing_call',
            '',
            'User Session',
            'module',
            '718'
        );");
        $results = $db->query('SELECT * FROM menu');
        echo '<pre>';
        while ($row = $results->fetchArray()) {
            var_dump($row);
        }
        $db->close();
        */

        /**
        $db = new \SQLite3('/var/www/db/acl.db');
        $db->query("INSERT INTO acl_resource (
            id,
            name,
            description
        )
        VALUES (
            '143',
            'user_session',
            'User Session'
        )");
        $results = $db->query('SELECT * FROM acl_resource');
        echo '<pre>';
        while ($row = $results->fetchArray()) {
            var_dump($row);
        }
        $db->close();
         */
    }

}
?>