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
	    
	    $pumpService->setPumpState($pumpNameArray[0], true);
	    
	    $pumpState1 = $pumpService->getPumpState($pumpNameArray[0]);
        
        return new Response($pumpState1 ? "On" : "Off");
    }
    
    /**
     * @Route("/test/valve/state")
     */
    public function testValveStateAction()
    {
    	$valveService = $this->container->get('control_valve_state_service');
    	$valveState = $valveService->getValveState();
    	
    	return new Response(intval($valveState));
    }
    
    /**
     * @Route("/test/set/valve/state/{state}")
     */
    public function testSetValveStateAction($state)
    {
    	$state = boolval($state);
    	$valveService = $this->container->get('control_valve_state_service');
    	$setValveState = $valveService->SetValveState($state);
    	
    	return new Response(intval($valveService->getValveState()));
    }
}
