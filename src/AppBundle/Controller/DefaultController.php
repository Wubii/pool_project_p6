<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use ControlBundle\Entity\MbSetup;
use ControlBundle\Form\MbSetupType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * 
     */
    public function indexAction(Request $request)
    {
    	$timesheets = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbScheduleTimesheet')->findAll();
    
    	$setup = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "setup"));
    	$mode = $setup->getMode();

		$sensorLastData = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSensorData')->getLastEntity();
	    
	    //$sensorService = $this->container->get('control_sensor_service');
	    $ltService = $this->container->get('control_light_threshold_service');
	    
	    $pumpStateService = $this->container->get('control_pump_state_service');
	    $valveStateService = $this->container->get('control_valve_state_service');

		if($sensorLastData != null)
		{
			$airTemp = $sensorLastData->getAirTemp();
			$poolTemp = $sensorLastData->getPoolTemp();
			$panelTemp = $sensorLastData->getPanelTemp();
			$luminosity = $sensorLastData->getLuminosity();
		}
		else
		{
			$airTemp = 0;
			$poolTemp = 0;
			$panelTemp = 0;
			$luminosity = 0;
		}

		return $this->render('default/index.html.twig', [
            "airTemp"     => $airTemp,
    		"poolTemp"    => $poolTemp,
    		"panelTemp"   => $panelTemp,
    		"luminosity"  => $luminosity,
	        "isSunny"     => $ltService->isSunny(),
            "pumpState"   => $pumpStateService->getPumpState(),
        	"valveState"  => $valveStateService->getValveState(),
        	"timesheets"  => $timesheets,
        	"mode"        => $mode,
    	]);
	    
		return $this->render('default/index.html.twig', [
            "airTemp"     => $sensorLastData->getAirTemp(),
    		"poolTemp"    => $sensorLastData->getPoolTemp(),
    		"panelTemp"   => $sensorLastData->getPanelTemp(),
    		"luminosity"  => $sensorLastData->getLuminosity(),
	        "isSunny"     => $ltService->isSunny(),
            "pumpState"   => $pumpStateService->getPumpState(),
        	"valveState"  => $valveStateService->getValveState(),
        	"timesheets"  => $timesheets,
        	"mode"        => $mode,
    	]);
    }
    
    /**
     * @Route("/exemple", name="fsvdf")
     * 
     */
    public function exempleAction(Request $request)
    {
		$setup = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
		if(is_null($setup))
		{
			return new Response('Error: setup missing');
		}
		
    	
    	$form = $this->get('form.factory')->create(MbSetupType::class, $setup);
	    $form->handleRequest($request);
	           
        if($form->isValid())
        {
	        $em = $this->getDoctrine()->getManager();
            $em->persist($setup);
            $em->flush();
            
            return $this->redirectToRoute('CONTROL_setup');
        }
	    
	    // replace this example code with whatever you need
        return $this->render('control/setup.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
