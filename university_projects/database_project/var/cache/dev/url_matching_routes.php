<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/user/basket' => [[['_route' => 'basket_index', '_controller' => 'App\\Controller\\BasketController::index'], null, null, null, false, false, null]],
        '/departments' => [[['_route' => 'department_index', '_controller' => 'App\\Controller\\DepartmentController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [
            [['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null],
            [['_route' => 'user_logout', '_controller' => 'App\\Controller\\UserController::logOut'], null, null, null, false, false, null],
        ],
        '/' => [[['_route' => 'user_index', '_controller' => 'App\\Controller\\UserController::index'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'user_register', '_controller' => 'App\\Controller\\UserController::register'], null, null, null, false, false, null]],
        '/serviceman' => [[['_route' => 'serviceman_index', '_controller' => 'App\\Controller\\UserController::servicemanIndex'], null, null, null, false, false, null]],
        '/serviceman/myservicereports' => [[['_route' => 'serviceman_servicereports', '_controller' => 'App\\Controller\\UserController::myServiceReports'], null, null, null, false, false, null]],
        '/serviceman/mydamagereports' => [[['_route' => 'serviceman_damagereports', '_controller' => 'App\\Controller\\UserController::myDamageReports'], null, null, null, false, false, null]],
        '/serviceman/handleequipments' => [[['_route' => 'serviceman_handleequipments', '_controller' => 'App\\Controller\\UserController::handleEquipmentAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/user(?'
                    .'|/(?'
                        .'|basket/delete_equipment/([^/]++)(*:213)'
                        .'|([^/]++)/(?'
                            .'|activeorders(*:245)'
                            .'|myreservations(*:267)'
                        .')'
                    .')'
                    .'|([^/]++)/finishedorders(*:300)'
                    .'|/([^/]++)/(?'
                        .'|makeorder(*:330)'
                        .'|emptybasket(*:349)'
                    .')'
                    .'|([^/]++)/makereservation(*:382)'
                .')'
                .'|/department/([^/]++)/equipment(?'
                    .'|s(*:425)'
                    .'|/([^/]++)(*:442)'
                .')'
                .'|/order/([^/]++)(?'
                    .'|(*:469)'
                    .'|/damagereport(*:490)'
                .')'
                .'|/serviceman/(?'
                    .'|assign(?'
                        .'|damagereport/([^/]++)(*:544)'
                        .'|service/([^/]++)(*:568)'
                    .')'
                    .'|finish(?'
                        .'|damagereport/([^/]++)(*:607)'
                        .'|servicereport/([^/]++)(*:637)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        213 => [[['_route' => 'basket_delete', '_controller' => 'App\\Controller\\BasketController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        245 => [[['_route' => 'user_myorders', '_controller' => 'App\\Controller\\UserController::myActiveOrders'], ['id'], null, null, false, false, null]],
        267 => [[['_route' => 'user_myreservations', '_controller' => 'App\\Controller\\UserController::myReservations'], ['id'], null, null, false, false, null]],
        300 => [[['_route' => 'user_myfinishedorders', '_controller' => 'App\\Controller\\UserController::myFinishedOrders'], ['id'], null, null, false, false, null]],
        330 => [[['_route' => 'user_makeorder', '_controller' => 'App\\Controller\\UserController::makeOrder'], ['id'], ['POST' => 0], null, false, false, null]],
        349 => [[['_route' => 'user_emptybasket', '_controller' => 'App\\Controller\\UserController::emptyBasket'], ['id'], ['POST' => 0], null, false, false, null]],
        382 => [[['_route' => 'user_makereservation', '_controller' => 'App\\Controller\\UserController::makeReservation'], ['id'], ['POST' => 0], null, false, false, null]],
        425 => [[['_route' => 'equipment_index', '_controller' => 'App\\Controller\\EquipmentController::index'], ['id'], null, null, false, false, null]],
        442 => [[['_route' => 'equipment_addToBasket', '_controller' => 'App\\Controller\\EquipmentController::addToBasket'], ['dep_id', 'e_id'], null, null, false, true, null]],
        469 => [[['_route' => 'user_finishorder', '_controller' => 'App\\Controller\\UserController::finishOrder'], ['id'], ['POST' => 0], null, true, true, null]],
        490 => [[['_route' => 'user_damagereport', '_controller' => 'App\\Controller\\UserController::reportDamage'], ['id'], ['POST' => 0], null, false, false, null]],
        544 => [[['_route' => 'serviceman_assigndamage', '_controller' => 'App\\Controller\\UserController::assignDamageReport'], ['id'], ['POST' => 0], null, false, true, null]],
        568 => [[['_route' => 'serviceman_assignservice', '_controller' => 'App\\Controller\\UserController::assignEquipmentService'], ['id'], ['POST' => 0], null, false, true, null]],
        607 => [[['_route' => 'serviceman_finishdamagereport', '_controller' => 'App\\Controller\\UserController::finishDamageReport'], ['id'], null, null, false, true, null]],
        637 => [
            [['_route' => 'serviceman_finishservicereport', '_controller' => 'App\\Controller\\UserController::finishServiceReport'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
