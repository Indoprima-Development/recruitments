<?php

//$fileName --> name of file which will be saved
// $file --> $request->file from controller
function UploadFile($file,$pathUpload,$fileName){
    $file->move(public_path($pathUpload), $fileName);
}

function FormatNumberWithDots($number) {
    return number_format($number, 0, '', '.');
}

function GenerateRandomString($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
