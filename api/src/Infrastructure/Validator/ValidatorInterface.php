<?php
declare(strict_types=1);

namespace Infrastructure\Validator;

interface ValidatorInterface
{
    /**
     * @param $entity
     * @param null $constraints
     * @param null $groups
     */
    public function validate($entity, $constraints = null, $groups = null): void;
}