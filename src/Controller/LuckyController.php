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

    public function affichage(Connection $db) {

        $slider = $db->fetchAll('SELECT * from slider WHERE active=1');
        $articles = $db->fetchAll('SELECT * from article ORDER BY date LIMIT 4');
        $presentation = $db->fetchAll('SELECT * from presentation');
        //retourne la vue
        return $this->render('accueil.html.twig', [
            'slider' => $slider, 'articles' => $articles, 'presentation' => $presentation
        ]);
    }
}
