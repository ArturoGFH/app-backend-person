<?php

$table = "dataRemote";

$values = "`id` int(11) NOT NULL auto_increment PRIMARY KEY,"
        . "`ip` varchar(100),"
        . "`city` varchar(250),"
        . "`region` varchar(250),"
        . "`country` varchar(45),"
        . "`lat` varchar(100),"
        . "`lng` varchar(100)";

$query = "SHOW TABLES FROM `" . database\Config::DATABASE . "` LIKE '$table'";
$exist = execute($query, true)[0];
if ($exist == null) {
    $_t = "CREATE TABLE IF NOT EXISTS `$table` ($values);";
    execute($_t);
} 

function setDataRemote() {
    global $table;
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $query = "select * from $table where ip='{$ip}'";
    $temp = execute($query, true)[0];
    if ($temp == null) {
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

        $new_arr[] = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        
        $query = "insert into $table (`ip`, `city`, `region`, `country`, `lat`, `lng`) values ('{$details->ip}', '{$details->city}', '{$details->region}', '{$details->country}', '{$new_arr[0]['geoplugin_latitude']}' ,'$new_arr[0]['geoplugin_longitude']')";
        execute($query);
    }
}
