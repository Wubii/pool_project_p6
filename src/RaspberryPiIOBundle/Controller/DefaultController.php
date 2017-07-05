<?php

namespace RaspberryPiIOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/test/RaspberryIO/light")
     */
    public function indexAction()
    {
    	$lightService = $this->container->get('io_light_service');
	    
	    $sensorNameArray = $lightService->getSensorNameArray();
	    
	    $light = $lightService->getValue($sensorNameArray[0]);
	    
	    var_dump($sensorNameArray);
	    
        return $this->render('RaspberryPiIOBundle:Test:light.html.twig', [
        	"light"	=> $light,
        ]);
    }
}
