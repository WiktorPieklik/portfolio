<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 13/04/2019
 * Time: 17:12
 */

require_once 'db_functions.php';
$db = new DB_Functions();

/*
 * Endpoint http://<domain>/drinkshop/getuser.php
 * Method : POST
 * Params: phone, name, birthdate, address
 * Result: JSON
 */

$response = array();
if(isset($_POST['phone']))
{
    $phone = $_POST['phone'];

        $user = $db->getUserInformation($phone);
        if($user)
        {
            $response['phone'] = $user['Phone'];
            $response['name'] = $user['Name'];
            $response['birthdate'] = $user['Birthdate'];
            $response['address'] = $user['Address'];
            $response['avatarUrl'] = $user['AvatarUrl'];
            echo json_encode($response);
        }
        else
        {
            $response['error_msg'] = "User does not exist";
            echo json_encode($response);
        }
}
else
{
    $response['error_msg'] = "Required parameter (phone) is missing";
    echo json_encode($response);
}