<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.errored..service_locator.OKbt_kT.Domain\Entity\User' shared service.

include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserInterface.php';
include_once \dirname(__DIR__, 4).'/src/Domain/Entity/EntityInterface.php';
include_once \dirname(__DIR__, 4).'/src/Domain/Entity/User.php';

return $this->privates['.errored..service_locator.OKbt_kT.Domain\\Entity\\User'] = new \Domain\Entity\User();