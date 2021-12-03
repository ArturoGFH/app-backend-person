<?php

include_once '../core/core.php';

if(isset($request["oauth"])){
    
    $query = "select * from login where user='{$request["user"]}' and status=1";
    $data = execute($query, true)[0];
    if($data != null){
        if($data["password"] == $request["password"]){
            
            $query = "select * from user where idLogin='{$data["id"]}'";
            array_push_key($data, "profile", execute($query, true)[0]);
            json("data", $data);
        }
        json("fail_pwd", "Password incorrect");
    }
    json("fail", "User incorrect");
    
}