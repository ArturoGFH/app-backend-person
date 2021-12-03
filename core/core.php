<?php

header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');

header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
header('Content-Type: application/json; charset=utf-8');


date_default_timezone_set('America/Mexico_City');

ini_set('memory_limit', '2048M');

/**
 * PATH TO PROJECT SDK FOLDER
 */
define("PATH", "clarios/" . explode("/", $_SERVER["SCRIPT_NAME"])[2]);

const ENCODE_QUERY = false;

$request = array_merge($_POST, $_GET);

require_once __DIR__ . '/database/Config.php';
require_once __DIR__ . '/database/Connection.php';
require_once __DIR__ . '/database/CoreDB.php';
require_once __DIR__ . '/prototype.php';
require_once __DIR__ . '/prototypeDate.php';


if (!file_exists(generatePathLocalUploads())) {
    mkdir(generatePathLocalUploads(), 0777, true);
}

if (count($request) == 0) {
    $array = array();
    array_push_key($array, "type", "OAuthException.");
    array_push_key($array, "message", "Invalid OAuth access to params.");
    json("Exception", $array);
}

use database\Connection;

try {
    $connection = null;
    $connection = new Connection();
    $connection->query("SET GLOBAL sql_mode=`NO_ENGINE_SUBSTITUTION`");
    $connection->query("SET SESSION sql_mode=`NO_ENGINE_SUBSTITUTION`");
} catch (Exception $exc) {
    array_push_key($array, "type", "DBException.");
    array_push_key($array, "message", $exc->getMessage());
    json("Exception", $array);
}

/**
 *
 * @global \database\Connection $con
 * @return \database\Connection
 */
function connection() {
    global $connection;
    return $connection;
}

/**
 * 
 * @param string $query
 * @param boolean $fetch
 * @return array()
 */
function execute($query, $fetch = false, $log = true) {
    global $request;

    if (!$fetch && $log) { 
        //$_q = "insert into log (`idLogin`, `query`, `path`, `date`, `time`) values ('{$request["sessionId"]}', '" . str_replace("'", "", $query) . "', '" . dirname($_SERVER["PHP_SELF"]) . "', '" . getDateStr() . "', '" . getTimeStr() . "')";
        //connection()->query($_q);
    }

    try {
        if ($fetch) {
            return connection()->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } else {
            connection()->query($query);
            return array();
        }
    } catch (Exception $ex) {
        $array = array();
        array_push_key($array, "type", "DBException.");
        array_push_key($array, "query", (ENCODE_QUERY) ? base64_encode($query) : $query);
        array_push_key($array, "message", $ex->getMessage());
        array_push_key($array, "trace", $ex->getTrace());
        json("Exception", $array);
    }
}

/**
 *  Returns the last inserted id.
 *  @return string
 */
function lastInsertId() {
    return connection()->lastInsertId();
}

function array_push_key(&$array, $key, $value) {
    $array[$key] = ($value != null or $value == 0) ? $value : "No value";
}

function json($root = null, $element = null) {
     global $connection;
     $connection = null;
    if (is_null($element)) {
        if (is_null($root)) {
            //execute("'KILL CONNECTION_ID()'");
            exit(json_encode(array("md5" => md5("success"), "success" => "success"), JSON_PRETTY_PRINT));
        }
        exit(json_encode(array($root => "null"), JSON_PRETTY_PRINT));
    } else {
        exit(json_encode(array($root => (!is_null($element)) ? $element : "null"), JSON_PRETTY_PRINT));
        exit(json_encode(array("md5" => md5(json_encode($element)), $root => (!is_null($element)) ? $element : "null"), JSON_PRETTY_PRINT));
    }
}

function getOS() {
    global $user_agent;
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    $os_platform = "Unknown OS Platform";
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

function getBrowser() {
    global $user_agent;
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    $browser = "Unknown Browser";
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }
    return $browser;
}

function getInfoSystem() {
    return array("SO" => getOS(), "Browser" => getBrowser());
}

function generatePath() {
    return $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . "/" . PATH . "/";
}

function generatePathLocal() {
    return $_SERVER["HOME"] . "/" . PATH . "/";
}

function generatePathLocalUploads() {
    return generatePathLocal() . "uploads/";
}

//require_once __DIR__ . '/backup.php';
//require_once __DIR__ . '/dataRemote.php';
//setDataRemote();
 