<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:20
 */

namespace App\Controller ;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\Routing\Annotation\Route;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends Controller
{
    public function admin()
    {
        return $this->render('admin.html.twig', []);
    }


    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}
