<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:30
 */

namespace App\Controller;


use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticlesController extends Controller
{
    public function article(Connection $db) {

        /*dump($db->fetchAll('SELECT * from article'));*/
        $articles = $db->fetchAll('SELECT * from article');
        return $this->render('articles.html.twig', ['articles' => $articles
        ]);

    }
}