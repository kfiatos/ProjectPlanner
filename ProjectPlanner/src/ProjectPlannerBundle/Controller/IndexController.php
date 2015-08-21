<?php

namespace ProjectPlannerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function showAction($id){
        // get a Post instance
//        $post = ...;

        $authChecker = $this->get('security.authorization_checker');

        if (false === $authChecker->isGranted('view', $post)) {
           throw $this->createAccessDeniedException('Unauthorized access!');
        }

    return new Response('<h1>' . $post->getName() . '</h1>');
    }
}

?>