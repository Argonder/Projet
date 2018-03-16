<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2018
 * Time: 12:11
 */
namespace App\Controller;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\component\Routing\Annotation\Route;

class contactController extends Controller
{
    public function contact(Connection $db) {
        $contact = $db->fetchAll('SELECT * from contact');
        return $this->render('contact.html.twig', ['contacts' => $contact

        ]);
    }
}
