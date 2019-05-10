<?php
/**
 * Created by PhpStorm.
 * User: WiktorPieklik
 * Date: 16/04/2019
 * Time: 16:35
 */

require_once 'db_functions.php';
$db = new DB_Functions();

$banners = $db->getBanners();
echo json_encode($banners);