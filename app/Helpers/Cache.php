<?php

use Illuminate\Support\Facades\Cache;

function SaveCacheRedis($key,$value,$seconds = 2592000){
    return Cache::put($key, $value, $seconds);
}

function GetCacheRedis($key){
    return Cache::get($key);
}

function ClearCacheRedis($key){
    return Cache::forget($key);
}

function ClearAllCacheRedis(){
    return Cache::flush();
}