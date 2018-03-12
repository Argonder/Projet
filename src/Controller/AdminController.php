<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:20
 */

namespace App\Controller ;
use Doctrine\DBAL\Connection;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\component\Routing\Annotation\Route;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\NotBlank;

class AdminController extends Controller
{
    public function admin(Connection $db)
    {
        $articles = $db->fetchAll('SELECT * from article');
        return $this->render('admin.html.twig', [
            'articles' => $articles
        ]);
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
    public function insertarticle(Request $request)
    {
        $form = $this->createFormBuilder()
        ->add('titre_article', TextType::class, [
            'required'  => true,
            'label'     => false,
            'constraints' => [new NotBlank()],
            'attr'      => [
                'class' => 'form-control' ,
                'placeholder' => 'titre de l\'article...'
                        ]
                                                ])
            ->add('description', TextType::class,[

                'required'  => true,
                'label'     => false,
                'constraints' => [new NotBlank()],
                'attr'      => [
                    'class' => 'form-control' ,
                    'placeholder' => 'description de l\'article...'
                ]
            ])
            ->add('image', FileType::class, [
                'required'   => false ,
                'label'     => false ,
                'attr'     => [
                    'class'   => 'dropify'
                ]
            ])
        ->getForm();
        $form->handleRequest($request);

        return $this->render('admin/article/ajouter.html.twig',[
            'form' =>$form->createView()
        ]);
    }

}
