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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\component\Routing\Annotation\Route;

class contactController extends Controller
{
    public function contact(Request $request, Connection $db, \Swift_Mailer $mailer) {
        $contact = $db->fetchAll('SELECT * from contact');



        if ($request->isMethod('POST')) {
            $message= (new\Swift_Message('Hello Email'))
                ->setFrom($request->get('email'))
                ->setTo('titi@titi.fr')
                ->setBody(
                    $request->get('name').'     '.
                    $request->get('message')

                );
            $mailer->send($message);

        }




        return $this->render('contact.html.twig', ['contacts' => $contact
        ]);
    }
}
