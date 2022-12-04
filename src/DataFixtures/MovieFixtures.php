<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is a test description');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2019/03/27/05/09/batman-4084262_960_720.jpg');
        $movie->addActor($this->getReference('actor'));
        $movie->addActor($this->getReference('actor_1'));
        $manager->persist($movie);

        $movie1 = new Movie();
        $movie1->setTitle('Avengers: End game');
        $movie1->setReleaseYear(20019);
        $movie1->setDescription('This is a test description');
        $movie1->setImagePath('https://cdn.pixabay.com/photo/2019/08/25/06/43/captain-america-4428842_960_720.jpg');
        $movie1->addActor($this->getReference('actor_2'));
        $movie1->addActor($this->getReference('actor_3'));
        $manager->persist($movie1);

        $manager->flush();


    }
}