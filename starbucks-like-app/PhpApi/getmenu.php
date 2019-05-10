<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 16/04/2019
 * Time: 18:31
 */

require_once "db_functions.php";

$db = new DB_Functions();

$menu = $db->getMenu();
echo json_encode($menu);