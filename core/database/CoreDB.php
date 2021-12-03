<?php

/**
 * Description of CoreDB
 *
 * @author nila_
 */
class CoreDB {

    public function mapp($request) {
        foreach (get_object_vars($this) as $key => $value) {
            $this->{$key} = (isset($request[$key])) ? $request[$key] : "";
        }
        return $this;
    }

    public function get($to, $value) {
        return "select * from " . get_class($this) . " where $to='$value'";
    }

    public function insert() {
        $_vars = array_diff_key(get_object_vars($this), array("id", "name"));
        unset($_vars["id"]);

        $_n = 0;
        $_max = count($_vars);

        $query = "insert into " . get_class($this) . " (";
        foreach ($_vars as $key => $value) {
            $query .= "`{$key}`";
            $_n++;
            $query .= ($_n < $_max) ? ", " : ") values (";
        }

        $_n = 0;
        foreach ($_vars as $key => $value) {
            $query .= "'{$value}'";
            $_n++;
            $query .= ($_n < $_max) ? ", " : ")";
        }
        return $query;
    }

    public function update($to = "id") {
        $_vars = array_diff_key(get_object_vars($this), array("id", "name"));
        $id = $_vars[$to];
        unset($_vars["id"]);
        $query = "update " . get_class($this) . " set ";
        $_n = 0;
        $_max = count($_vars);
        foreach ($_vars as $key => $value) {
            $query .= $key . "='$value'";
            $_n++;
            $query .= ($_n < $_max) ? ", " : " where id='$id'";
        }
        return $query;
    }

}
