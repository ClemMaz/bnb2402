<?php

namespace App\DataFixtures;

use App\Entity\Booking;
use Faker\Factory;
use App\Entity\User;
use App\Entity\Offer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Initialisation de Faker
        $faker = Factory::create('fr_FR');

        // Création d'un admin
        $admin = new User();
        $admin->setEmail('admin@admin.fr')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$ZafFA4usDurLdb4tHItctuHPXJW4BKsqJvUEpXwUbFO/bGZ9IU99G')
            ->setFirstname($faker->firstName())
            ->setLastname($faker->lastName())
            ->setPhone($faker->phoneNumber())
            ->setAddress($faker->address())
            ->setCity($faker->city())
            ->setCountry($faker->country());
        $manager->persist($admin);

        // Création de 10 Voyageurs
        $voyagerArray = [];
        for ($i = 0; $i < 10; $i++) {
            # code...
            $voyager = new User();
            $voyager->setEmail('user'. $i . '@user.fr')
                ->setRoles(['ROLE_USER'])
                ->setPassword('$2y$13$ZafFA4usDurLdb4tHItctuHPXJW4BKsqJvUEpXwUbFO/bGZ9IU99G')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setPhone($faker->phoneNumber())
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setCountry($faker->country());

            array_push($voyagerArray, $voyager);
            $manager->persist($voyager);
        }

        // Création de 3 Hosts
        $hostArray = [];
        for ($i = 0; $i < 3; $i++) {
            $host = new User();
            $host->setEmail('host'. $i . '@host.fr')
                ->setRoles(['ROLE_HOST'])
                ->setPassword('$2y$13$ZafFA4usDurLdb4tHItctuHPXJW4BKsqJvUEpXwUbFO/bGZ9IU99G')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setPhone($faker->phoneNumber())
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setCountry($faker->country());

            array_push($hostArray, $host);
            $manager->persist($host);
        }

        // Création de 10 annonces (Offer)
        $offerArray = [];
        for ($i = 0; $i < 10; $i++) {
            $offer = new Offer();
            $offer->setTitle($faker->sentence(6))
                ->setDescription($faker->paragraph(3))
                ->setPrice($faker->numberBetween(50, 200))
                ->setAddress($faker->address())
                ->setCity($faker->city())
                ->setCountry($faker->country())
                ->setOwner($hostArray[$faker->numberBetween(0, 2)])
                ->setCapacity($faker->numberBetween(1, 10))
                ;

            array_push($offerArray, $offer);
            $manager->persist($offer);
        }

        // Création de 5 réservations
        for ($i = 0; $i < 5; $i++) {
            $booking = new Booking();
            $booking->setDateStart($faker->dateTimeBetween('-6 months'))
                ->setDateEnd($faker->dateTimeBetween('-3 months'))
                ->setOffer($offerArray[$faker->numberBetween(0, 9)])
                ->setVoyager($voyagerArray[$faker->numberBetween(0, 9)]);

            $manager->persist($booking);
        }

        $manager->flush();
    }
}
