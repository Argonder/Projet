<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:20
 */

namespace App\Controller ;
use App\Entity\Slider;
use App\Entity\Article;
use Doctrine\DBAL\Connection;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AdminController extends Controller
{
    //connection BDD
    public function admin(Connection $db)
    {
        $articles = $db->fetchAll('SELECT * from article');
        $slider = $db->fetchAll('SELECT * from slider');
        return $this->render('admin.html.twig', [
            'articles' => $articles,
            'sliders' => $slider
        ]);

    }

    //Connection
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

    //fonction d'insertion d'image dans le slider
    public function insertSlider(Request $request)
    {

        $slider = new Slider();
        //creation du formulaire d'ajout
        $form = $this->createFormBuilder($slider)
            ->add('libelle', TextType::class, [
                'required'  => true,
                'label'     => 'Titre: ',
                'attr'      => [
                    'name'  => 'libelle',
                    'class' => 'form-control' ,
                    'placeholder' => 'titre'
                ]
            ])

            ->add('image', FileType::class, [
                'required'   => true ,
                'label'     => 'Importer un fichier: ' ,
                'attr'     => [
                    'name'  => 'image',
                    'class'   => 'dropify form-inline'
                ]
            ])

            ->add('active', CheckBoxType::class,[
                'required'  => false,
                'label'     => 'Activé l\'image:  ',
                'attr'      => [
                    'name'  => 'active',
                    'class' => 'form-control' ,
                    'placeholder' => 'description de l\'article...'
                ]
            ])

            ->getForm();

        $form->handleRequest($request);
        //insertion dans la BDD
        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $slider = $form->getData();
            $file = $slider->getImage();
            //generation d'un nom unique à l'image
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // deplacement du fichier récupéré (image) dans un dossier.
            $file->move(
                '../public/images/',
                $fileName);
            //changement du nom de l'image
            $slider->setImage('images/'.$fileName);
            $entityManager->persist($slider);
            $entityManager->flush();
        }

        //afficher toutes les images
        $repository = $this->getDoctrine()->getRepository(Slider::class);
        $products = $repository->findAll();

        return $this->render('admin/slider/ajouter.html.twig',[
            'form' =>$form->createView(), 'data'=>'','product' =>$products
        ]);
    }

    //fonction modification/suppression Slider image
    public function modifImg($id)
    {
        $request = Request::createFromGlobals();
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Slider::class)->find($id);

        //creation du formulaire
        $form = $this->createFormBuilder()

            ->add('supprimer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-danger'),
            ))

            ->getForm();



        $form->handleRequest($request);
        if ($form->get('supprimer')->isClicked()) {
            unlink($product->getImage());
            $entityManager->remove($product);
            $entityManager->flush();
            return $this->redirect('../../admin', 308);
        }
        if($form->isSubmitted() && $product->getActive(1)) {
            $product->setActive(0);
            $active='activé';
        }else{
            $product->setActive(1);
            $active='désactivé';
        };

        dump($form);
        $entityManager->flush();

        return $this->render('admin/slider/modifier.html.twig',[
            'form' =>$form->createView(),'product' =>$product, 'active'=>$active,
        ]);


    }

    //Fonction d'insertion d'article
    public function insertarticle(Request $request)
    {
        $article = new Article();
        $form = $this->createFormBuilder($article)
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
                'required'   => true ,
                'label'     => false ,
                'attr'     => [
                    'class'   => 'dropify'
                ]
            ])
            ->add('date', DateType::class, [
                'required'   => true ,
                'label'     => false ,
                'attr'     => [
                    'class'   => 'dropify'
                ]
            ])
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $file = $form['image']->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $article = $form->getData();
            $file = $article->getImage();

            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                '../public/images/',
                $fileName);
            $article->setImage('images/'.$fileName);
            $entityManager->persist($article);
            $entityManager->flush();

        }

        return $this->render('admin/article/ajouter.html.twig',[
            'form' =>$form->createView(), 'data'=>$form
        ]);
    }

    //Fonction de génération de nom unique pour l'image
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
