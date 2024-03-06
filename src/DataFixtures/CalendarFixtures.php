<?php

namespace App\DataFixtures;

use App\Entity\Calendar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CalendarFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
       foreach($days as $day){
            $calendar = new Calendar();
            $calendar->setToday($day);
            $calendar->setMorning("9h-12h");
            $calendar->setAfternoon('12h-22h');
            $calendar->setAllDay('');
            $calendar->setIsMorning(0);
            $calendar->setIsAfternoon(0);
            $calendar->setIsAllDay(0);
            $calendar->setCodeMorning($day.'-9-12');
            $calendar->setCodeAfternoon($day.'-12-22');
            $calendar->setCodeAllDay($day.'-all-day');
            $manager->persist($calendar);
        }

        $manager->flush();
    }
}