<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ControlController extends Controller
{
    /**
     * @Route("/lowlevel/pump")
     */
    public function getPumpStatusAction()
    {
    	return new Response("getPumpStatusAction");
    }
    
    /**
     * @Route("/lowlevel/valve")
     */
    public function getValveStatusAction()
    {
        return new Response("getValveStatusAction");
    }
}
