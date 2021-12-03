<?php

/**
 * Description of Date
 *
 * @author nila_
 */
class Date {

    /**
     * Days elapsed to date current
     * 
     * @param String $date
     * @return String
     */
    public static function getYears($date) {
        $cumpleanos = new DateTime($date);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;
    }

    /**
     * datetime format Y-m-d H:i:s
     * 
     * @return string
     */
    public static function getDateTimeStr() {
        return date("Y-m-d H:i:s");
    }

    /**
     * Date current format Y-m-d
     * 
     * @return String
     */
    public static function getDateStr() {
        return date("Y-m-d");
    }

    /**
     * time format H:i
     * 
     * @return string
     */
    public static function getTimeStr() {
        return date("H:i");
    }

    /**
     * time format H:i:s: A
     * 
     * @return string
     */
    public static function getTimeAStr() {
        return date("H:i:s A");
    }

    
    /**
     * 
     * @param String $dateTimeInit 
     * @param String $dateTimeEnd
     * @param String $dateTime
     * @return Bool
     */
    function within_hours($dateTimeInit, $dateTimeEnd, $dateTime = NULL) {
        if (is_null($dateTime)) {
            $dateTime = date('G:i:s');
        }

        list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $dateTimeInit), 3, 0);
        $s_inicio = 3600 * $h + 60 * $m + $s;

        list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $dateTimeEnd), 3, 0);
        $s_fin = 3600 * $h + 60 * $m + $s;

        list($h, $m, $s) = array_pad(preg_split('/[^\d]+/', $dateTime), 3, 0);
        $s_referencia = 3600 * $h + 60 * $m + $s;

        if ($s_inicio <= $s_fin) {
            return $s_referencia >= $s_inicio && $s_referencia <= $s_fin;
        } else {
            return $s_referencia >= $s_inicio || $s_referencia <= $s_fin;
        }
    }

}
