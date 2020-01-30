<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    'find_one' => [['uuid'], ['_controller' => 'UI\\Controller\\DeviceController::findOne'], [], [['variable', '/', '[^/]++', 'uuid', true], ['text', '/devices']], [], []],
    'list_devices' => [[], ['_controller' => 'UI\\Controller\\DeviceController::list'], [], [['text', '/devices']], [], []],
    'attach_devices' => [[], ['_controller' => 'UI\\Controller\\DeviceController::attach'], [], [['text', '/devices']], [], []],
    'add house' => [[], ['_controller' => 'UI\\Controller\\HouseController::add'], [], [['text', '/houses']], [], []],
    'get_user' => [['id'], ['_controller' => 'UI\\Controller\\UserController::getOne'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/users']], [], []],
    'user_login' => [[], [], [], [['text', '/login']], [], []],
    'user_logout' => [[], ['_controller' => ''], [], [['text', '/logout']], [], []],
];
