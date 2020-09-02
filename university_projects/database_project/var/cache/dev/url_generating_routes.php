<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'basket_index' => [[], ['_controller' => 'App\\Controller\\BasketController::index'], [], [['text', '/user/basket']], [], []],
    'basket_delete' => [['id'], ['_controller' => 'App\\Controller\\BasketController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/user/basket/delete_equipment']], [], []],
    'department_index' => [[], ['_controller' => 'App\\Controller\\DepartmentController::index'], [], [['text', '/departments']], [], []],
    'equipment_index' => [['id'], ['_controller' => 'App\\Controller\\EquipmentController::index'], [], [['text', '/equipments'], ['variable', '/', '[^/]++', 'id', true], ['text', '/department']], [], []],
    'equipment_addToBasket' => [['dep_id', 'e_id'], ['_controller' => 'App\\Controller\\EquipmentController::addToBasket'], [], [['variable', '/', '[^/]++', 'e_id', true], ['text', '/equipment'], ['variable', '/', '[^/]++', 'dep_id', true], ['text', '/department']], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
    'user_index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/']], [], []],
    'user_myorders' => [['id'], ['_controller' => 'App\\Controller\\UserController::myActiveOrders'], [], [['text', '/activeorders'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_finishorder' => [['id'], ['_controller' => 'App\\Controller\\UserController::finishOrder'], [], [['text', '/'], ['variable', '/', '[^/]++', 'id', true], ['text', '/order']], [], []],
    'user_damagereport' => [['id'], ['_controller' => 'App\\Controller\\UserController::reportDamage'], [], [['text', '/damagereport'], ['variable', '/', '[^/]++', 'id', true], ['text', '/order']], [], []],
    'user_myreservations' => [['id'], ['_controller' => 'App\\Controller\\UserController::myReservations'], [], [['text', '/myreservations'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_myfinishedorders' => [['id'], ['_controller' => 'App\\Controller\\UserController::myFinishedOrders'], [], [['text', '/finishedorders'], ['variable', '', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_makeorder' => [['id'], ['_controller' => 'App\\Controller\\UserController::makeOrder'], [], [['text', '/makeorder'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_emptybasket' => [['id'], ['_controller' => 'App\\Controller\\UserController::emptyBasket'], [], [['text', '/emptybasket'], ['variable', '/', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_makereservation' => [['id'], ['_controller' => 'App\\Controller\\UserController::makeReservation'], [], [['text', '/makereservation'], ['variable', '', '[^/]++', 'id', true], ['text', '/user']], [], []],
    'user_logout' => [[], ['_controller' => 'App\\Controller\\UserController::logOut'], [], [['text', '/logout']], [], []],
    'user_register' => [[], ['_controller' => 'App\\Controller\\UserController::register'], [], [['text', '/register']], [], []],
    'serviceman_index' => [[], ['_controller' => 'App\\Controller\\UserController::servicemanIndex'], [], [['text', '/serviceman']], [], []],
    'serviceman_assigndamage' => [['id'], ['_controller' => 'App\\Controller\\UserController::assignDamageReport'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/serviceman/assigndamagereport']], [], []],
    'serviceman_assignservice' => [['id'], ['_controller' => 'App\\Controller\\UserController::assignEquipmentService'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/serviceman/assignservice']], [], []],
    'serviceman_servicereports' => [[], ['_controller' => 'App\\Controller\\UserController::myServiceReports'], [], [['text', '/serviceman/myservicereports']], [], []],
    'serviceman_damagereports' => [[], ['_controller' => 'App\\Controller\\UserController::myDamageReports'], [], [['text', '/serviceman/mydamagereports']], [], []],
    'serviceman_handleequipments' => [[], ['_controller' => 'App\\Controller\\UserController::handleEquipmentAction'], [], [['text', '/serviceman/handleequipments']], [], []],
    'serviceman_finishdamagereport' => [['id'], ['_controller' => 'App\\Controller\\UserController::finishDamageReport'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/serviceman/finishdamagereport']], [], []],
    'serviceman_finishservicereport' => [['id'], ['_controller' => 'App\\Controller\\UserController::finishServiceReport'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/serviceman/finishservicereport']], [], []],
];