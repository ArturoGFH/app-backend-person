<?php

include_once '../core/firebase.php';

function notify($ft, $agent, $body) {
    $tokens = array();
    foreach ($ft as $value) {
        array_push($tokens, $value["token"]);
    }
    $response = sendNotificationArrays($tokens, $body, "ISI Service");
    __log($response, $agent, $body);
}

function notifyToAdmin($idSession, $agent, $body) {
    $query = "select ft.token from ft, login where login.id=ft.idLogin and login.id!='$idSession' and (login.rol=1 or login.rol=7) and ft.token!=''";
    $ft = execute($query, true);
    $tokens = array();
    foreach ($ft as $value) {
        array_push($tokens, $value["token"]);
    }
    $response = sendNotificationArrays($tokens, $body, "ISI Service");
    __log($response, $agent, $body);
}

function notifyToAdminProject($idProject, $agent, $body) {
    $query = "select ft.token from ft, adminProjectUsers where ft.idLogin=adminProjectUsers.idLogin and adminProjectUsers.idProject='$idProject' and adminProjectUsers.notification='1' and adminProjectUsers.status=1";
    $ft = execute($query, true);
    $tokens = array();
    foreach ($ft as $value) {
        array_push($tokens, $value["token"]);
    }
    $response = sendNotificationArrays($tokens, $body, "ISI Service");
    __log($response, $agent, $body);
}

function __log($response, $agent, $body) {
    $query = "insert into log_notifications (`agent`, `response`, `date`, `body`, `title`) values ('$agent', '{$response}', '" . getDateTimeStr() . "', '{$body}', 'ISI Service')";
    execute($query);
}
