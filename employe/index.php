<?php

include_once '../core/core.php';

if (isset($request["post"])) {
    //`
    $query = "select * from login where user='{$request["user"]}' and status=1";
    $temp = execute($query, true)[0];
    if ($temp == null) {
        $query = "insert into login (`user`, `password`, `rol`, `status`) values ('{$request["user"]}', '{$request["password"]}', '{$request["rol"]}', '1')";
        execute($query);
        $lastId = lastInsertId();

        $query = "insert into user (`idLogin`, `noEmploye`, `name`, `phone`, `rfc`, `address`, `nss`, `sex`, `workArea`, `birthday`, `dateAdmission`) values ('{$lastId}', '{$request["noEmploye"]}', '{$request["name"]}', '{$request["phone"]}', '{$request["rfc"]}', '{$request["address"]}', '{$request["nss"]}', '{$request["sex"]}', '{$request["workArea"]}', '{$request["birthday"]}', '{$request["dateAdmission"]}')";
        execute($query);
        json();
    }
    json("fail", "User repeat");
}

if (isset($request["get"])) {
    if (isset($request["all"])) {
        $query = "select * from login where status=1";
        $data = execute($query, true);
        foreach ($data as $key => $value) {
            $query = "select * from user where idLogin='{$value["id"]}'";
            array_push_key($data[$key], "profile", execute($query, true)[0]);
        }
        json("data", $data);
    }

    if (isset($request["id"])) {
        $query = "select * from login where id='{$request["id"]}'";
        $data = execute($query, true)[0];
        $query = "select * from user where idLogin='{$request["id"]}'";
        array_push_key($data, "profile", execute($query, true)[0]);
        json("data", $data);
    }
    
    if (isset($request["workArea"])) {
        $query = "select * from workArea where status=1";
        $data = execute($query, true);
        json("data", $data);
    }
}

if (isset($request["update"])) {
    $query = "update login set user='{$request["user"]}', password='{$request["password"]}' where id='{$request["id"]}'";
    execute($query);

    $query = "UPDATE `user` SET `noEmploye`='{$request["noEmploye"]}',`name`='{$request["name"]}',`phone`='{$request["phone"]}',`rfc`='{$request["rfc"]}',`address`='{$request["address"]}',`nss`='{$request["nss"]}',`sex`='{$request["sex"]}',`workArea`='{$request["workArea"]}',`birthday`='{$request["birthday"]}',`dateAdmission`='{$request["dateAdmission"]}' WHERE idLogin='{$request["id"]}'";
    execute($query);

    json();
}

if (isset($request["delete"])) {
    $query = "update login set status=0 where id='{$request["id"]}'";
    execute($query);
    json();
}