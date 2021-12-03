<?php

/**
 * 
 * @param type $n
 * @return String format money 00.00
 */
function money($n) {
    return sprintf('%0.2f', $n);
}

function validPhone($number) {
    return preg_match('/^[0-9]{10}+$/', $number);
}

function validEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function containsWord($str, $word) {
    return !!preg_match('#\\b' . preg_quote($word, '#') . '\\b#i', $str);
}

/**
 * Generate unique ID
 * 
 * @param int $numStr
 * @param string $strPrx
 * @return string
 */
function myUniqId($numStr, $strPrx = "") {
    srand((double) microtime() * rand(1000000, 9999999));
    $arrChar = array();
    $uId = $strPrx;
    for ($i = 65; $i < 90; $i++) {
        array_push($arrChar, chr($i));
        array_push($arrChar, strtolower(chr($i)));
    }
    for ($i = 48; $i < 57; $i++) {
        array_push($arrChar, chr($i));
    }
    for ($i = 0; $i < $numStr; $i++) {
        $r = rand(0, count($arrChar));
        if (isset($arrChar[$r])) {
            $uId .= $arrChar[$r];
        }
    }
    return $uId;
}

function getFilesPath($path, $find = "", $expand = true) {
    $data = array();
    if (!file_exists($path)) {
        return $data;
    }

    $files = array_diff(scandir($path), array('.', '..', '@eaDir', 'trash'));
    foreach ($files as $value) {
        if ($find != "") {
            if (strpos($value, $find) !== false) {
                if ($expand == true) {
                    $d = date("Y-m-d H:i", filectime($path . $value));
                    $ext = pathinfo($path . $value, PATHINFO_EXTENSION);
                    $f = array();
                    array_push_key($f, "path", generatePath() . str_replace("../", "", str_replace("../", "", $path)) . $value);
                    array_push_key($f, "MD5", hash_file("MD5", str_replace("../", "", $path) . $value));
                    array_push_key($f, "file", $value);
                    array_push_key($f, "name", str_replace($find, "", $value));
                    array_push_key($f, "date", getDateTimeString($d));
                    array_push_key($f, "ext", getExt($ext));
                    array_push_key($f, "extImg", getExtImg($ext));
                    array_push($data, $f);
                } else {
                    array_push($data, generatePath() . str_replace(generatePathLocal(), "", str_replace("../", "", $path)) . $value);
                }
            } 
        } else {
            if ($expand == true) {
                $d = date("Y-m-d H:i", filectime($path . $value));
                $ext = pathinfo($path . $value, PATHINFO_EXTENSION);
                $f = array();
                array_push_key($f, "path", generatePath() . str_replace("../", "", str_replace("../", "", $path)) . $value);
                array_push_key($f, "MD5", hash_file("MD5", str_replace("../", "", $path) . $value));
                array_push_key($f, "file", $value);
                array_push_key($f, "name", str_replace($find, "", $value));
                array_push_key($f, "date", getDateTimeString($d));
                array_push_key($f, "ext", getExt($ext));
                array_push_key($f, "extImg", getExtImg($ext));
                array_push($data, $f);
            } else {
                array_push($data, generatePath() . str_replace(generatePathLocal(), "", str_replace("../", "", $path)) . $value);
            }
        }
    }
    return $data;
}

function lastFileCreate($dir = '', $type = 0) {
    $ignore = array(
        '.',
        '..',
        '@eaDir'
    );
    if (substr($dir, -1) != '/') {
        $dir .= '/';
    }
    if ($handle = opendir($dir)) {
        $mas_nuevo = 0;
        $ultimo_nombre = false;
        while (false !== ($curfile = readdir($handle))) {
            if (in_array($curfile, $ignore))
                continue;
            if (is_file($dir . $curfile) && $type == 2)
                continue;
            if (is_dir($dir . $curfile) && $type == 1)
                continue;
            if (filemtime($dir . $curfile) > $mas_nuevo) {
                $mas_nuevo = filemtime($dir . $curfile);
                $ultimo_nombre = $curfile;
            }
        }
        return $ultimo_nombre;
    }
    return false;
}

function getExt($ext) {
    switch ($ext) {
        case "jpg":
            return "img";
        case "png":
            return "img";
        case "pdf":
            return "doc";
        case "xlsx":
            return "doc";
        case "pptx":
            return "doc";
        case "docx":
            return "doc";
        default:
            return "";
    }
}

function getExtImg($ext) {
    switch ($ext) {
        case "pdf":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337946.svg";
        case "jpg":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337940.svg";
        case "png":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337948.svg";
        case "png":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337948.svg";
        case "doc":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337932.svg";
        case "docx":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337932.svg";
        case "xls":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337958.svg";
        case "xlsx":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337958.svg";
        case "ppt":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337949.svg";
        case "pptx":
            return "https://www.flaticon.com/svg/static/icons/svg/337/337949.svg";
        case "dwg":
            return "https://viewer.autodesk.com/assets/images/fileicons/dwg.svg";
        case "xml":
            return "https://www.flaticon.com/premium-icon/icons/svg/377/377252.svg";
        default:
            return generatePath() . "core/img/page.png";
    }
}
