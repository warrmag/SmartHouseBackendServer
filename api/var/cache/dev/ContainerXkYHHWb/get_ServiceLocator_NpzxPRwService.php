<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.NpzxPRw' shared service.

return $this->privates['.service_locator.NpzxPRw'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
    'house' => ['privates', '.errored..service_locator.NpzxPRw.Domain\\Entity\\House', NULL, 'Cannot autowire service ".service_locator.NpzxPRw": it references class "Domain\\Entity\\House" but no such service exists.'],
], [
    'house' => 'Domain\\Entity\\House',
]);
