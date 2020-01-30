<?php
declare(strict_types=1);

namespace Infrastructure\Validator;

use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidator;

class DataValidator implements ValidatorInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(SymfonyValidator $validator)
    {
        $this->validator = $validator;
    }

    public function validate($entity, $constraints = null, $groups = null): void
    {
        $errors = $this->validator->validate($entity, $constraints, $groups);

        if (count($errors) > 0) {
            $errorsString = (string)$errors;
            throw new ValidatorException($errorsString);
        }
    }
}