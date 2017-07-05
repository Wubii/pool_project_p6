<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
	    $temperatureService = $this->container->get('io_temperature_service');
	    
	    $sensorNameArray = $temperatureService->getSensorNameArray();
	    
	    $temperature1 = $temperatureService->getValue($sensorNameArray[0]);
	    $temperature2 = $temperatureService->getValue($sensorNameArray[1]);

        return $this->render('default/index.html.twig', [
            "temperature1" => $temperature1,
	        "temperature2" => $temperature2	    
        ]);
    }
}
