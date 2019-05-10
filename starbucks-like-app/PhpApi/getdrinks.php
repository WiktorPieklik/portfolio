<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 16/04/2019
 * Time: 19:40
 */

require_once "db_functions.php";
$db = new DB_Functions();

$response = array();

if(isset($_POST['menuId']))
{
    $menuId = $_POST['menuId'];
    $drinks = $db->getDrinksByMenuId($menuId);

    echo json_encode($drinks);
}
else
{
    $response['error_msg'] = "Required parameter (menuId) is missing";
    echo json_encode($response);
}