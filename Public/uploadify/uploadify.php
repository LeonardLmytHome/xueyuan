<?php

$targetFolder = $_POST['public_path'].'/Uploads/Photo/'; //上传的目标路径  
  
if (!empty($_FILES)) {  
    $tempFile = $_FILES['Filedata']['tmp_name'];  
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;  
    $targetFile = rtrim($targetPath,'/') . '/' . md5($_FILES['Filedata']['name']);  
      
    // Validate the file type  
    $fileTypes = array('jpg','jpeg','gif','png','bmp'); // File extensions  
    $fileParts = pathinfo($_FILES['Filedata']['name']);  
      
    //查看文件的名字符串的编码方式  
    $encode = mb_detect_encoding($targetFile, array("UTF-8","GBK","ASCII","GB2312"));  
    //echo $tempFile.'<br>';  
    //echo $targetFile.'<br>';  
    //echo $encode.'<br>';  
    /* 
    if ($encode == "UTF-8"){ 
        $targetFile = iconv("UTF-8","GBK",$targetFile); 
    } 
    */  
          
    if (in_array($fileParts['extension'],$fileTypes)) {  
        move_uploaded_file($tempFile,$targetFile);  
        echo md5($_FILES['Filedata']['name']);  
          
    } else {  
        echo '您好，文件类型不允许！';  
    }  
}  
?>