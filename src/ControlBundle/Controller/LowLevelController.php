<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LowLevelController extends Controller
{
    /**
     * @Route("/lowlevel/temperature/air", name="LOW_LEVEL_get_air_temperature", options={"expose"=true})
     */
    public function getAirTemperatureAction()
    {
    	$temperatureService = $this->container->get('io_temperature_service');
	    
	    $sensorNameArray = $temperatureService->getSensorNameArray();
	    
	    $temperature = $temperatureService->getValue($sensorNameArray[0]);
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/lowlevel/temperature/poolwater", name="LOW_LEVEL_get_poolwater_temperature", options={"expose"=true})
     */
    public function getPoolWaterTemperatureAction()
    {
    	$temperatureService = $this->container->get('io_temperature_service');
	    
	    $sensorNameArray = $temperatureService->getSensorNameArray();
	    
	    $temperature = $temperatureService->getValue($sensorNameArray[1]);
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/lowlevel/temperature/solarpanel", name="LOW_LEVEL_get_solarpanel_temperature", options={"expose"=true})
     */
    public function getSolarPanelTemperatureAction()
    {
    	$temperatureService = $this->container->get('io_temperature_service');
	    
	    $sensorNameArray = $temperatureService->getSensorNameArray();
	    
	    $temperature = $temperatureService->getValue($sensorNameArray[2]);
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/lowlevel/light", name="LOW_LEVEL_get_light_intensity", options={"expose"=true})
     */
    public function getLightIntensityAction()
    {
    	$lightService = $this->container->get('io_light_service');
	    
	    $sensorNameArray = $lightService->getSensorNameArray();
	    
	    $light = $lightService->getValue($sensorNameArray[0]);
	    
        return new Response($light);
    }
    
    /**
     * @Route("/lowlevel/relay/{relay}", name="LOW_LEVEL_get_relay_state", options={"expose"=true})
     */
    public function getRelayAction($relay)
    {
    	$relayService = $this->container->get('io_relay_service');
	    
	    $relay = $relayService->getValue($relay);
	    
        return new Response($relay ? "On" : "Off");
    }
    
    /**
     * @Route("/lowlevel/relay/{relay}/{value}", name="LOW_LEVEL_set_relay_state", options={"expose"=true})
     */
    public function setRelayAction($relay, $value)
    {
    	$relayService = $this->container->get('io_relay_service');
	    
	    $relay = $relayService->setValue($relay, boolval($value));
	    
        return self::getRelayAction($relay);
    }
}
