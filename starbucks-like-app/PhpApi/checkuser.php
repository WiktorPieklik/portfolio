<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 13/04/2019
 * Time: 12:16
 */

require_once 'db_functions.php';
$db = new DB_Functions();

/*
 * Endpoint http://<domain>/drinkshop/checkuser.php
 * Method : POST
 * Params: phone
 * Result: JSON
 */

$response = array();
if(isset($_POST['phone']))
{
    $phone = $_POST['phone'];

    if($db->isUserExisting($phone))
    {
        $response['exist'] = TRUE;
        echo json_encode($response);
    }
    else
    {
        $response['exist'] = FALSE;
        echo json_encode($response);
    }
}
else
{
    $response['error_msg'] = "Required parameter (phone) is missing";
    echo json_encode($response);
}