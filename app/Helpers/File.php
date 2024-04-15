<?php

//$fileName --> name of file which will be saved
//$ext --> extention of file which will be saved
//$path --> where location file will be saved
// $file --> $request->file from controller 
function UploadFile($fileName,$ext,$path,$file){ 
    $fileName = $fileName.'.'.$ext;  
    $file->move(public_path($path), $fileName);
}