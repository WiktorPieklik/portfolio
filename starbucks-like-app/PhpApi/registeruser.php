<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 13/04/2019
 * Time: 12:53
 */

require_once 'db_functions.php';
$db = new DB_Functions();

/*
 * Endpoint http://<domain>/drinkshop/registeruser.php
 * Method : POST
 * Params: phone, name, birthdate, address
 * Result: JSON
 */

$response = array();
if(isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['birthdate']) && isset($_POST['address']))
{
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $birthdate = $_POST['birthdate'];
    $address = $_POST['address'];

    if($db->isUserExisting($phone))
    {
        $response['error_msg'] = "User is already existing whith phoneNo: ".$phone;
        echo json_encode($response);
    }
    else
    {
       //Create new user
        $user = $db->registerUser($phone,$name,$birthdate,$address);
        if($user)
        {
            $response['phone'] = $user['Phone'];
            $response['name'] = $user['Name'];
            $response['birthdate'] = $user['Birthdate'];
            $response['address'] = $user['Address'];
            echo json_encode($response);
        }
        else
        {
            $response['error_msg'] = "Unknown error occured during registartion";
            echo json_encode($response);
        }
    }
}
else
{
    $response['error_msg'] = "Required parameters (phone, name, birthdate, address) are missing";
    echo json_encode($response);
}