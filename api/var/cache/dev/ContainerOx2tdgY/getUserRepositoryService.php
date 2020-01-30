<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'user_repository' shared autowired service.

include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectRepository.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Selectable.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityRepository.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Repository/ServiceEntityRepositoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/Repository/ServiceEntityRepository.php';
include_once \dirname(__DIR__, 4).'/src/Domain/Repository/UserRepositoryInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/symfony/doctrine-bridge/Security/User/UserLoaderInterface.php';
include_once \dirname(__DIR__, 4).'/src/Infrastructure/Repository/ORM/UserRepository.php';

return $this->privates['user_repository'] = new \Infrastructure\Repository\ORM\UserRepository(($this->services['doctrine'] ?? $this->getDoctrineService()), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));
