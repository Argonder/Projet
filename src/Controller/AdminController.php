<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:20
 */

namespace App\Controller ;
use Symfony\component\Routing\Annotation\Route;


    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class AdminController extends controller
    {
        public function yo() {
            return $this->render('admin.html.twig', [

            ]);

    }
}