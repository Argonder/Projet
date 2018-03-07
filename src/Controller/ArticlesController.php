<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:30
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticlesController extends Controller
{
    public function affichage() {
        return $this->render('articles.html.twig', [

        ]);
    }
}