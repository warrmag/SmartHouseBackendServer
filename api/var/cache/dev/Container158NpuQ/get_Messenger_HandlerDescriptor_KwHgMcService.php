<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.messenger.handler_descriptor.kwHg_Mc' shared service.

return $this->privates['.messenger.handler_descriptor.kwHg_Mc'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(($this->services['Application\\Command\\User\\CreateUserCommandHandler'] ?? $this->load('getCreateUserCommandHandlerService.php')), []);
