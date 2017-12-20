<?php

namespace ControlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SensorController extends Controller
{
    /**
     * @Route("/control/sensor/data", name="CONTROL_sensor_data", options={"expose"=true})
     */
    public function getSensorDataAction()
    {
		$sensorLastData = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSensorData')->getLastEntity();
    	
    	$luminosityThresholdService = $this->container->get('control_light_threshold_service');
    	$weather = $luminosityThresholdService->isSunny();
    	
    	$dataArray = array(
    		"airTemp"    => $sensorLastData->getAirTemp(),
    		"poolTemp"   => $sensorLastData->getPoolTemp(),
    		"panelTemp"  => $sensorLastData->getPanelTemp(),
    		"luminosity" => $sensorLastData->getLuminosity(),
    		"weather"    => $luminosityThresholdService->isSunny(),
    		"date"       => $sensorLastData->getDate()->format('dM / His'),
    	);
	    
	    $dataJSON = json_encode($dataArray);
	    
        return new Response($dataJSON);
    }
    /**
     * @Route("/control/sensor/air/temperature", name="CONTROL_sensor_get_air_temperature", options={"expose"=true})
     */
    public function getAirTemperatureAction()
    {
		$temperatureService = $this->container->get('control_sensor_service');
	    
	    $temperature = $temperatureService->getAirTemp();
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/control/sensor/pool/temperature", name="CONTROL_sensor_get_pool_temperature", options={"expose"=true})
     */
    public function getWaterTemperatureAction()
    {
		$temperatureService = $this->container->get('control_sensor_service');
	    
	    $temperature = $temperatureService->getPoolTemp();
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/control/sensor/panel/temperature", name="CONTROL_sensor_get_panel_temperature", options={"expose"=true})
     */
    public function getPanelTemperatureAction()
    {
		$temperatureService = $this->container->get('control_sensor_service');
	    
	    $temperature = $temperatureService->getPanelTemp();
	    
        return new Response($temperature);
    }
    
    /**
     * @Route("/control/sensor/luminosity", name="CONTROL_sensor_get_luminosity", options={"expose"=true})
     */
    public function getLuminosityAction()
    {
		$temperatureService = $this->container->get('control_sensor_service');
	    
	    $temperature = $temperatureService->getLuminosity();
	    
        return new Response($temperature);
    }
 
}
