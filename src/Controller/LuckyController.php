<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2018
 * Time: 12:11
 */
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL\Connection;

class LuckyController extends Controller
{
    private function getArticles(Connection $db)
    {
        return $db->fetchAll('SELECT * from article ORDER BY id DESC LIMIT 4');
    }

    public function affichage(Connection $db) {

        $slider = $db->fetchAll('SELECT * from slider WHERE active=1');
        $articles = $this->getArticles($db);

        //retourne la vue
        return $this->render('accueil.html.twig', [
            'slider' => $slider, 'articles' => $articles
        ]);
    }
}
