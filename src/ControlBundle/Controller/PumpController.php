<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Response;

class PumpController extends Controller
{
	/**
     * @Route("/control/pump", name="CONTROL_get_pump_state", options={"expose"=true})
     */
    public function getPumpStateAction()
    {
    	$pumpService = $this->container->get('control_pump_state_service');
    	$pumpState = $pumpService->getPumpState();
    	
    	return new Response(intval($pumpState));
    }
    
    /**
     * @Route("/control/pump/{state}", name="CONTROL_set_pump_state", options={"expose"=true})
     */
    public function setPumpStateAction($state)
    {
    	$state = boolval($state);
    	$pumpService = $this->container->get('control_pump_state_service');
    	$setPumpState = $pumpService->SetPumpState($state);
    	
    	return new Response(intval($pumpService->getPumpState()));
    }
}
    