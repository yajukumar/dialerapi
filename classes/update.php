<?php
namespace Stratum\classes;


class Update{

    public function updateComposer(){
        echo 'hi';exit;
        echo shell_exec('composer update --working-dir=/var/www/html/stratum/api');
    }
}
?>