<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'messenger.default_bus' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/MessageBusInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/MessageBus.php';

return $this->services['messenger.default_bus'] = new \Symfony\Component\Messenger\MessageBus(new RewindableGenerator(function () {
    yield 0 => ($this->privates['messenger.bus.default.middleware.traceable'] ?? $this->load('getMessenger_Bus_Default_Middleware_TraceableService.php'));
    yield 1 => ($this->privates['messenger.bus.default.middleware.add_bus_name_stamp_middleware'] ?? ($this->privates['messenger.bus.default.middleware.add_bus_name_stamp_middleware'] = new \Symfony\Component\Messenger\Middleware\AddBusNameStampMiddleware('messenger.bus.default')));
    yield 2 => ($this->privates['messenger.middleware.reject_redelivered_message_middleware'] ?? ($this->privates['messenger.middleware.reject_redelivered_message_middleware'] = new \Symfony\Component\Messenger\Middleware\RejectRedeliveredMessageMiddleware()));
    yield 3 => ($this->privates['messenger.middleware.dispatch_after_current_bus'] ?? ($this->privates['messenger.middleware.dispatch_after_current_bus'] = new \Symfony\Component\Messenger\Middleware\DispatchAfterCurrentBusMiddleware()));
    yield 4 => ($this->privates['messenger.middleware.failed_message_processing_middleware'] ?? ($this->privates['messenger.middleware.failed_message_processing_middleware'] = new \Symfony\Component\Messenger\Middleware\FailedMessageProcessingMiddleware()));
    yield 5 => ($this->privates['messenger.middleware.send_message'] ?? $this->load('getMessenger_Middleware_SendMessageService.php'));
    yield 6 => ($this->privates['messenger.bus.default.middleware.handle_message'] ?? $this->load('getMessenger_Bus_Default_Middleware_HandleMessageService.php'));
}, 7));
