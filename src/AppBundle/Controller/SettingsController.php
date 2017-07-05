<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SettingsController extends Controller
{
    /**
    * @Route("/settings", name="settings")
    */
    public function settingsAction(Request $request)
    {
    	$temperatureService = $this->container->get('io_temperature_service');
	    $sensors = $temperatureService->getSensorNameArray();
	    
	    return $this->render('default/settings.html.twig', [
	    	'sensors' => $sensors	
	    ]);
    }
}
