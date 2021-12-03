<?php

const SERVER_KEY = "AAAAwS7h9vU:APA91bFQDbtytR4LHecPhanzueGfKDgJtMBv7XYEWYNVfqy7oV-pxgbQEVYLfPsJkSgGxWN20udNqMzrSTkmrLTZXhO65ECf5s2gVtBfe-Lmt6Wv-wXTA-Iyg57gnIs_N-YuuNq6A6wa";

function sendNotificationAll($body, $title, $action = null, $value = null) {
    if ($action == null) {
        $array = [
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    } else {
        $array = [
            "data" => [
                "action" => $action,
                "key" => $value
            ],
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    }
    executeCurl($array);
}

function sendNotificationArrays($token, $body, $title, $action = null, $value = null) {
    if ($action == null) {
        $array = [
            "registration_ids" => $token,
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    } else {
        $array = [
            "registration_ids" => $token,
            "data" => [
                "action" => $action,
                "key" => $value
            ],
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    }
    return executeCurl($array);
}

function sendNotification($token, $body, $title, $action = null, $value = null) {
    if ($action == null) {
        $array = [
            "to" => $token,
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    } else {
        $array = [
            "to" => $token,
            "data" => [
                "action" => $action,
                "key" => $value
            ],
            "notification" => [
                "body" => $body,
                "title" => $title,
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    }
    return executeCurl($array);
}

function sendNotificationSchedule($token, $body, $title, $action = null, $value = null) {
    if ($action == null) {
        $array = [
            "registration_ids" => $token,
            "data" => [
                "isScheduled" => "true",
                "scheduledTime" => "2021-01-21 10:45:00"
            ],
            "notification" => [
                "body" => $body,
                "title" => $title,
                "isScheduled" => "true",
                "scheduledTime" => "2021-01-21 10:45:00"
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    } else {
        $array = [
            "registration_ids" => $token,
            "data" => [
                "action" => $action,
                "key" => $value,
                "isScheduled" => "true",
                "scheduledTime" => "2021-01-21 10:45:00"
            ],
            "notification" => [
                "body" => $body,
                "title" => $title,
                "isScheduled" => "true",
                "scheduledTime" => "2021-01-21 10:45:00"
            ],
            "android" => [
                "priority" => "high"
            ]
        ];
    }
    return executeCurl($array);
}

function executeCurl($array) {
    $data = json_encode($array);
    $url = 'https://fcm.googleapis.com/fcm/send';
    $headers = array('Content-Type:application/json', 'Authorization:key=' . SERVER_KEY);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    //print_r($result);
    curl_close($ch);
    return $result;
}
