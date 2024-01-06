<?php

namespace App\DataFixtures;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Users;

class UsersFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 20; $i++){
            $user = new Users();
            $user->setUsername('user' . $i);
            $user->setEmail('user' . $i . '@gmail.com');
        
            $password = $this->hasher->hashPassword($user, 'pass_1234');
            $user->setPassword($password);

            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }
            $manager->flush();
    }
}
