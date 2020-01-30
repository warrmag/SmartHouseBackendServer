<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/devices' => [
            [['_route' => 'list_devices', '_controller' => 'UI\\Controller\\DeviceController::list'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'attach_devices', '_controller' => 'UI\\Controller\\DeviceController::attach'], null, ['POST' => 0], null, false, false, null],
        ],
        '/houses' => [[['_route' => 'add house', '_controller' => 'UI\\Controller\\HouseController::add'], null, ['POST' => 0], null, false, false, null]],
        '/login' => [[['_route' => 'user_login'], null, ['POST' => 0, 'OPTIONS' => 1], null, false, false, null]],
        '/logout' => [[['_route' => 'user_logout', '_controller' => ''], null, ['GET' => 0, 'OPTIONS' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/devices/([^/]++)(*:24)'
                .'|/users/([^/]++)(*:46)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => 'find_one', '_controller' => 'UI\\Controller\\DeviceController::findOne'], ['uuid'], ['GET' => 0], null, false, true, null]],
        46 => [
            [['_route' => 'get_user', '_controller' => 'UI\\Controller\\UserController::getOne'], ['id'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
