<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 07/03/2018
 * Time: 10:20
 */

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;
use App\Entity\Slider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\DBAL\Connection;

class sliderController extends Controller
{

    public function insertslider()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $slider = new Slider();
        $slider->setLibelle('plumes');
        $slider->setImage("images/plumes.jpg");
        $slider->setActive(1);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($slider);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$slider->getId());
    }
}