<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TestController extends Controller
{
    /**
     * @Route("/test/control/pump")
     */
    public function testPumpAction()
    {
    	$pumpService = $this->container->get('pump_service');
	    
	    $pumpNameArray = $pumpService->getNameArray();
	    
        var_dump($pumpNameArray);
    }
}
