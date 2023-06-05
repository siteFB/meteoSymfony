<?php

namespace App\DataFixtures;

use App\Entity\Ephemeride;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class Ephemeridefixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $ephemeride = new Ephemeride();

        $ephemeride->setTitre('Titre');
        $ephemeride->setSlug($this->slugger->slug($ephemeride->getTitre()));

        $ephemeride->setDescription('Description');
        $ephemeride->setSlug($this->slugger->slug($ephemeride->getDescription()));

        $manager->persist($ephemeride);

        $faker = Faker\Factory::create('fr_FR');

        for($eph = 1; $eph <= 9; $eph++){
            $ephemeride = new Ephemeride();
            $ephemeride->setTitre($faker->text(20));
            $ephemeride->setDescription($faker->text(255));
            $ephemeride->setSlug($faker->text(10));

            dump($ephemeride);

            $manager->persist($ephemeride);
        }

        $manager->flush();
    }
}
