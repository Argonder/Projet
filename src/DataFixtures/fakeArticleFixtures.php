<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 08/03/2018
 * Time: 17:12
 */

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;

class fakeArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 5 products! Bam!
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitreArticle('test'.$i);
            $article->setDescription('testDesc'.$i);
            $article->setImage('images/elephants.jpg');
            $article->setDate(new \DateTime('now'));
            $manager->persist($article);
        }

        $manager->flush();
    }
}