<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Infrastructure\Repository\ORM\UserRepository' shared autowired service.

return $this->privates['Infrastructure\\Repository\\ORM\\UserRepository'] = new \Infrastructure\Repository\ORM\UserRepository(($this->services['doctrine'] ?? $this->getDoctrineService()), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));
