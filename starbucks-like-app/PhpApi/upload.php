<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 21/04/2019
 * Time: 15:41
 */

require_once 'db_functions.php';
$db = new DB_Functions();

if(isset($_FILES["uploaded_file"]["name"]))
{
    if(isset($_POST["phone"]))
    {
        $phone = $_POST["phone"];
        $name = $_FILES["uploaded_file"]["name"];
        $tmp_name = $_FILES["uploaded_file"]["tmp_name"];
        $error = $_FILES["uploaded_file"]["error"];

        if(!empty($name))
        {
            $location = "./userAvatar/";
            if(!is_dir($location))
                mkdir($location);

            if(move_uploaded_file($tmp_name,$location . $name))
            {
                $result = $db->uploadAvatar($phone, $name);
                if($result)
                    echo json_encode("Uploaded successfully");
                else
                    echo json_encode("Error while uploading the avatar");
            }
        }
    }
    else
        echo json_encode("Missing phone value!");
}
else
    echo json_encode("Please select file!");