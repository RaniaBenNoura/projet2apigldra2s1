<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
$this->passwordEncoder = $passwordEncoder;
}
public function load(ObjectManager $manager)
{
    $user = new User();
    $user->setEmail('admin@gmail.com');
    $user->setNom('admin');
    $user->setPassword('admin');
    $user->setRoles(['ROLE_ADMIN']);
    $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));
    $manager->persist($user);
    $user2 = new User();
    $user2->setEmail('rania@gmail.com');
    $user2->setNom('rania');
    $user2->setPassword('rania');
    $user2->setPassword($this->passwordEncoder->encodePassword($user2, 'rania'));
    $manager->persist($user2);
    $manager->flush();
}
}