<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ReadmeController extends Controller
{
    /**
     * @Route("/readme", name="readme")
     * 
     */
    public function indexAction(Request $request)
    {
    	return $this->render('default/readme.html.twig', []);
    }
}
