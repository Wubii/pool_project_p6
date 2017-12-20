<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Response;

class ValveController extends Controller
{
	/**
     * @Route("/control/valve", name="CONTROL_get_valve_state", options={"expose"=true})
     */
    public function testValveStateAction()
    {
    	$valveService = $this->container->get('control_valve_state_service');
    	$valveState = $valveService->getValveState();
    	
    	return new Response(intval($valveState));
    }
    
    /**
     * @Route("/control/valve/{state}", name="CONTROL_set_valve_state", options={"expose"=true})
     */
    public function testSetValveStateAction($state)
    {
    	$state = boolval($state);
    	$valveService = $this->container->get('control_valve_state_service');
    	$setValveState = $valveService->SetValveState($state);
    	
    	return new Response(intval($valveService->getValveState()));
    }
}
    