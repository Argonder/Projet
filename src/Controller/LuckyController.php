<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 06/03/2018
 * Time: 12:11
 */
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
class LuckyController
{

    public function number()
    {
        $number = 10;

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }


}