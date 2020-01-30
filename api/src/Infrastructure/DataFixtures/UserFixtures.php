<?php
declare(strict_types=1);

namespace Infrastructure\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Domain\Entity\User;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $names = ['Steve', 'Ross', 'Jason', 'Bob', 'Sherlock', 'Phoebe ', 'Alison', 'Rachel'];
        $surname = ['Doe', 'Geller', 'Dick', 'Babe', 'Boufe', 'Tribbiani', 'Body', 'Some'];

        for ($i = 1; $i < count($names); $i++) {
            $user = $this->createUser($names[rand(0,6)], $surname[rand(0,6)]);
            $manager->persist($user);
        }
        $manager->persist($this->createAdmin());

        $manager->flush();
    }

    private function createUser(string $name, string $surname): User
    {
        $user = new User(
            Uuid::uuid4()->toString(),
            strtolower($name.$surname).'@test.com',
            $name,
            $surname,
            [User::DEFAULT_ROLE],
            true
        );
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));

        return $user;
    }

    private function createAdmin(): User
    {
        $user = new User(
            Uuid::uuid4()->toString(),
            'admin@smarthouse.com',
            'John',
            'Doe',
            ['ROLE_ADMIN'],
            true
        );
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));

        return $user;
    }
}
