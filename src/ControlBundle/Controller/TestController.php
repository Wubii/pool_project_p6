<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
    /**
     * @Route("/test/control/pump")
     */
    public function testPumpAction()
    {
    	$pumpService = $this->container->get('pump_service');
	    
	    $pumpNameArray = $pumpService->getNameArray();
	    
	    $pumpService->setPumpState($pumpNameArray[0], false);
	    
	    $pumpState1 = $pumpService->getPumpState($pumpNameArray[0]);
        
        return new Response($pumpState1 ? "On" : "Off");
    }
}
