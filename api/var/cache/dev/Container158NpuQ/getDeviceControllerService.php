<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'UI\Controller\DeviceController' shared autowired service.

$this->services['UI\\Controller\\DeviceController'] = $instance = new \UI\Controller\DeviceController(($this->services['jms_serializer'] ?? $this->load('getJmsSerializerService.php')), ($this->services['message_bus'] ?? $this->load('getMessageBusService.php')));

$instance->setContainer(($this->privates['.service_locator.CDOTD6.'] ?? $this->load('get_ServiceLocator_CDOTD6_Service.php'))->withContext('UI\\Controller\\DeviceController', $this));

return $instance;
