<?php

namespace Myweb\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MywebTestBundle:Default:index.html.twig', array('name' => $name));
    }
    public function oneAction(){
        $this->get('test_service')->two();
        exit();
    }

}
