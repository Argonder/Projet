<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2018
 * Time: 12:11
 */
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\component\Routing\Annotation\Route;

class contactController extends Controller
{

    public function affichage() {
        return $this->render('contact.html.twig', [

        ]);
    }
}
