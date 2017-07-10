<?php

namespace RaspberryPiIOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/test/RaspberryIO/light")
     */
    public function testLightAction()
    {
    	$lightService = $this->container->get('io_light_service');
	    
	    $sensorNameArray = $lightService->getSensorNameArray();
	    
	    $light = $lightService->getValue($sensorNameArray[0]);
	    
        return $this->render('RaspberryPiIOBundle:Test:light.html.twig', [
        	"light"	=> $light,
        ]);
    }
    
    /**
     * @Route("/test/RaspberryIO/temperature")
     */
    public function testTemperatureAction()
    {
    	$temperatureService = $this->container->get('io_temperature_service');
	    
	    $sensorNameArray = $temperatureService->getSensorNameArray();
	    
	    $temperature1 = $temperatureService->getValue($sensorNameArray[0]);
	    $temperature2 = $temperatureService->getValue($sensorNameArray[1]);
	    $temperature3 = $temperatureService->getValue($sensorNameArray[2]);
	    
        return $this->render('RaspberryPiIOBundle:Test:temperature.html.twig', [
        	"temperature1"	=> $temperature1,
        	"temperature2"	=> $temperature2,
        	"temperature3"	=> $temperature3,
        ]);
    }
    
    /**
     * @Route("/test/RaspberryIO/relay")
     */
    public function testRelayAction()
    {
    	$relayService = $this->container->get('io_relay_service');
	    
	    $relayNameArray = $relayService->getNameArray();
	    
	    $relay1 = $relayService->setValue($relayNameArray[0], true);
	    $relay2 = $relayService->setValue($relayNameArray[1], true);
	    $relay2 = $relayService->setValue($relayNameArray[2], false);
	    
	    $relay1 = $relayService->getValue($relayNameArray[0]);
	    $relay2 = $relayService->getValue($relayNameArray[1]);
	    $relay3 = $relayService->getValue($relayNameArray[2]);
	    
        return $this->render('RaspberryPiIOBundle:Test:relay.html.twig', [
        	"relay1"	=> $relay1,
        	"relay2"	=> $relay2,
        	"relay3"	=> $relay3,
        ]);
    }
}
