<?php

//$fileName --> name of file which will be saved
// $file --> $request->file from controller 
function UploadFile($file,$pathUpload,$fileName){ 
    $file->move(public_path($pathUpload), $fileName);
}