<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   include('db.conn.php');
   $imgfolder = 'uploads/images/';
   $vidfolder = 'uploads/video/';
   $img_allowed_file = array('jpg','png','jpeg');
   $vid_allowed_file = array('mov','mp4');
   $arrayFile_name = $_FILES['files']['name'];
   $array_count = count($arrayFile_name);
   for ($i=0; $i < $array_count; $i++) { 
    $image_name = $_FILES['files']['name'][$i];
    $image_tmp = $_FILES['files']['tmp_name'][$i];
    $image_error = $_FILES['files']['error'][$i];
    $image_size = $_FILES['files']['size'][$i];
    $image_type = $_FILES['files']['type'][$i];
    $file_ext = explode('.', $image_name);
       $fileLow_ext = strtolower(end($file_ext));
       $file_type = strtoupper($fileLow_ext);        
       if (in_array($fileLow_ext, $img_allowed_file)) {
           if ($image_error === 0) {
               $assetId = uniqid('img_',true);
               $imageName = $assetId.'.'. $fileLow_ext;
               $localtion = $imgfolder.$imageName;
               $fileDesti = '../'.$localtion ;
               $status = move_uploaded_file($image_tmp, $fileDesti);
               if ($status) {
                   $sqlImg = "INSERT INTO `assets`(`asset_id`, `name`, `asset_name`, `location`, `type`,`cont_type`, `size`, `ext`, `status`) VALUES ('$assetId','$image_name','$imageName','$localtion','$image_type','IMAGE','$image_size','$file_type','1')";
                   mysqli_query($conn,$sqlImg);    
                }
            }
        } elseif (in_array($fileLow_ext, $img_allowed_file)) {
            if ($image_error === 0) {
                $assetId = uniqid('vid_',true);
                $imageName = $assetId.'.'. $fileLow_ext;
                $localtion = $vidfolder.$imageName;
                $fileDesti = '../'.$localtion ;
                $status = move_uploaded_file($image_tmp, $fileDesti);
                if ($status) {
                    $sqlImg = "INSERT INTO `assets`(`asset_id`, `name`, `asset_name`, `location`, `type`,`cont_type`, `size`, `ext`, `status`) VALUES ('$assetId','$image_name','$imageName','$localtion','$image_type','VIDEOS','$image_size','$file_type','1')";
                    mysqli_query($conn,$sqlImg);
                }
            }
        }
    }
} else {
    header("Location: 500");
    exit();
}


// $dir = 'videoss';
// mkdir("../uploads/$dir", 1000);

//