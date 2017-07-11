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
    	$pumpService = $this->container->get('pump_service');
	    
	    $pumpNameArray = $pumpService->getNameArray();
	    
        var_dump($pumpNameArray);
    }
    
    /**
     * @Route("/lowlevel/valve")
     */
    public function getValveStatusAction()
    {
        return new Response("getValveStatusAction");
    }
}
