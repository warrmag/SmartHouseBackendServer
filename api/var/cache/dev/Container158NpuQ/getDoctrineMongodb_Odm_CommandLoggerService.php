<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'doctrine_mongodb.odm.command_logger' shared service.

return $this->privates['doctrine_mongodb.odm.command_logger'] = new \Doctrine\Bundle\MongoDBBundle\APM\PSRCommandLogger(($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));