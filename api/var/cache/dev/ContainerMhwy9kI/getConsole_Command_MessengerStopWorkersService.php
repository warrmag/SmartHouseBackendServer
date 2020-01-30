<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'console.command.messenger_stop_workers' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Command/StopWorkersCommand.php';

$this->privates['console.command.messenger_stop_workers'] = $instance = new \Symfony\Component\Messenger\Command\StopWorkersCommand(($this->privates['cache.messenger.restart_workers_signal'] ?? $this->load('getCache_Messenger_RestartWorkersSignalService.php')));

$instance->setName('messenger:stop-workers');

return $instance;
