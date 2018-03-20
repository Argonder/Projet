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
use Symfony\Component\HttpFoundation\Request;

class ArticlesController extends Controller
{
    public function article(Request $resquest, Connection $db) {

        $id = $resquest->get('id');
        $articles = $db->fetchAll('SELECT * from article');
        return $this->render('articles.html.twig', ['articles' => $articles, 'id' => $id
        ]);

    }
}