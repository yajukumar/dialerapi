<?php
namespace Stratum\classes;


class Update{

    public function updateComposer(){
        echo shell_exec('composer update --working-dir=/var/www/html/stratum/api');
    }
}
?>