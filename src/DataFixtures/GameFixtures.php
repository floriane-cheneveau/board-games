<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        $game0 = new Game();
        $game0->setName("monopoly");
        $game0->setPlayerNumber(6);
        $game0->setMinimumAge(8);
        $game0->setDescription("Etre le dernier joueur à faire faillite");
        $game0->setCategory($this->getReference("category_0"));                     
        $manager->persist($game0);

        $game1 = new Game();
        $game1->setName("uno");
        $game1->setPlayerNumber(10);
        $game1->setMinimumAge(7);
        $game1->setDescription("basé sur les régles du 8 américain");
        $game1->setCategory($this->getReference("category_0"));                     
        $manager->persist($game1);

        $game2 = new Game();
        $game2->setName("la bonne paye");
        $game2->setPlayerNumber(6);
        $game2->setMinimumAge(8);
        $game2->setDescription("Avoir le plus d'argent à la fin de la partie");
        $game2->setCategory($this->getReference("category_0"));                     
        $manager->persist($game2);

        $game3 = new Game();
        $game3->setName("Le 6 qui prend");
        $game3->setPlayerNumber(10);
        $game3->setMinimumAge(8);
        $game3->setDescription("Il ne faut pas ramasser de cartes Têtes de bœuf");
        $game3->setCategory($this->getReference("category_1"));                     
        $manager->persist($game3);

        $game4 = new Game();
        $game4->setName("blanc manger coco");
        $game4->setPlayerNumber(6);
        $game4->setMinimumAge(12);
        $game4->setDescription("Une carte avec un début, une fin de phrase.
        Dans vos mains, des cartes avec des mots ou bouts de phrases.");
        $game4->setCategory($this->getReference("category_1"));                     
        $manager->persist($game4);

        $game5 = new Game();
        $game5->setName("Shabadabada");
        $game5->setPlayerNumber(10);
        $game5->setMinimumAge(12);
        $game5->setDescription("un jeu où il faudra en effet,
        faire preuve d'inspiration pour retrouver des chansons à partir de simples mots.");
        $game5->setCategory($this->getReference("category_1"));                     
        $manager->persist($game5);

        $game6 = new Game();
        $game6->setName("7wonders");
        $game6->setPlayerNumber(5);
        $game6->setMinimumAge(8);
        $game6->setDescription("À la tête d’une grande Cité du monde antique - exploitez les ressources naturelles de vos terres");
        $game6->setCategory($this->getReference("category_2"));                     
        $manager->persist($game6);

        $game7 = new Game();
        $game7->setName("Colt express");
        $game7->setPlayerNumber(5);
        $game7->setMinimumAge(8);
        $game7->setDescription("Chaque joueur représente un desperado qui doit récupérer,
        la plus grosse somme d'argent à l'intérieur d'un train");
        $game7->setCategory($this->getReference("category_2"));                     
        $manager->persist($game7);

        $game8 = new Game();
        $game8->setName("relic runners");
        $game8->setPlayerNumber(5);
        $game8->setMinimumAge(10);
        $game8->setDescription("Vous incarnez un intrépide aventurier explorant la jungle pour y découvrir les trésors perdus cachés");
        $game8->setCategory($this->getReference("category_2"));                     
        $manager->persist($game8);       
        
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}
