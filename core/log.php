<?php

function _log($idSession, $name, $log, $query, $date) {
    $query = "insert into log (`idSession`, `name`, `log`, `query`, `date`) values ('$idSession', '$name', '$log', '$query', '$date')";
    execute($query);
}
