<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ControlController extends Controller
{
    /**
     * @Route("/control/mode", name="CONTROL_get_mode", options={"expose"=true})
     */
    public function getModeAction()
    {
		$setup = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "setup"));
		$mode = $setup->getMode();
		
		return new Response($mode ? "auto" : "manual");
    }
    
    
	/**
     * @Route("/control/mode/{mode}", name="CONTROL_set_mode", options={"expose"=true})
     */
    public function setModeAction($mode)
    {	
		$setup = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "setup"));

    	$em = $this->getDoctrine()->getManager();
    	
		if($mode == "auto")
		{
		    $setup->setMode(true);
		
            $em->persist($setup);
            $em->flush();
		}
		elseif($mode == "manual")
		{
			$setup->setMode(false);
		
            $em->persist($setup);
            $em->flush();
		}
		else
		{
			$mode = "error : wrong mode";
		}
        
        return new Response($mode);
    }
    
    /**
     * @Route("/control/isSunny", name="CONTROL_is_sunny", options={"expose"=true})
     */
    public function getLightValueAction()
    {
    	$luminosityThresholdService = $this->container->get('control_light_threshold_service');
    	$weather = $luminosityThresholdService->isSunny();
    	
        return new Response($weather ? "1" : "0");
    }
}
