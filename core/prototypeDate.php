<?php

function getYears($date) {
    $cumpleanos = new DateTime($date);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    return $annos->y;
}

/**
 * Año-mes-día
 * date format Y-m-d
 * 
 * @return string
 */
function getDateStr() {
    return date("Y-m-d");
}

/**
 * Horas:minutos
 * time format H:i
 * 
 * @return string
 */
function getTimeStr() {
    return date("H:i:s");
}

/**
 * Horas:minutos:segundos AM/PM
 * time format H:i:s: A
 * 
 * @return string
 */
function getTimeAStr() {
    return date("H:i:s A");
}

/**
 * Año-mes-dia Hora:minutos:segundos
 * datetime format Y-m-d H:i:s
 * 
 * @return string
 */
function getDateTimeStr() {
    return date("Y-m-d H:i:s");
}

function dentro_de_horario($hms_inicio, $hms_fin, $hms_referencia = NULL) { // v2011-06-21
    if (is_null($hms_referencia)) {
        $hms_referencia = date('G:i:s');
    }

    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_inicio), 3, 0);
    $s_inicio = 3600 * $h + 60 * $m + $s;

    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_fin), 3, 0);
    $s_fin = 3600 * $h + 60 * $m + $s;

    list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $hms_referencia), 3, 0);
    $s_referencia = 3600 * $h + 60 * $m + $s;

    if ($s_inicio <= $s_fin) {
        return $s_referencia >= $s_inicio && $s_referencia <= $s_fin;
    } else {
        return $s_referencia >= $s_inicio || $s_referencia <= $s_fin;
    }
}

function hourIsBetween($from, $to, $input) {
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    if ($dateFrom > $dateTo)
        date_modify($dateTo, '+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= date_modify($dateInput, '+1 day') && $dateInput <= $dateTo);
}

function hoursLapsed($fecha_i, $fecha_f) {
    $minutos = ((strtotime($fecha_i) - strtotime($fecha_f)) / 60) / 60;
    $minutos = abs($minutos);
    $minutos = round($minutos, 2);
    return $minutos;
}

function decimal_to_time($decimal) {
    $hours = floor($decimal / 60);
    $minutes = floor($decimal % 60);
    $seconds = $decimal - (int) $decimal;
    $seconds = round($seconds * 60);

    return str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
}

function dateRange($first, $last, $step = '+1 day', $format = 'Y-m-d') {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while ($current <= $last) {

        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function getDayName($dayOfWeek) {
    switch ($dayOfWeek) {
        case 6:
            return 'Sab';
        case 0:
            return 'Dom';
        case 1:
            return 'Lun';
        case 2:
            return 'Mar';
        case 3:
            return 'Mie';
        case 4:
            return 'Jue';
        case 5:
            return 'Vie';
        default:
            return '';
    }
}

function dateTimeDiff($date1, $date2) {
    $fecha1 = new DateTime($date1);
    $fecha2 = new DateTime($date2);
    $fechaF = $fecha1->diff($fecha2);

    return $fechaF;
}

function getDateCurrent() {
    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    return $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
}

function getDateString($str) {
    $date = strtotime($str);
    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    return $dias[date('w', $date)] . " " . date('d', $date) . " de " . $meses[date('n', $date) - 1] . " del " . date('Y', $date);
}

function getDateTimeString($str) {
    $date = strtotime($str);
    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    return $dias[date('w', $date)] . " " . date('d', $date) . " de " . $meses[date('n', $date) - 1] . " del " . date('Y', $date) . " " . date('H:i', $date);
}
