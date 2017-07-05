<?php

namespace RaspberryPiIOBundle\Services;

use Symfony\Component\HttpFoundation\Response;

class LightService
{  
	const LIGHT_SENSOR_1 = "lightSensor1";
	
	function getSensorNameArray()
	{
	    $lightSensorNameArray[] = self::LIGHT_SENSOR_1;
	    
	    return $lightSensorNameArray;
	}
	
	function getValue($sensor)
	{
		$result;
		
    	switch($sensor)
    	{
    		case self::LIGHT_SENSOR_1:
    			$result = 2;
    			break;
    			
    		default:
    			$result = 0;
    	}
    	
    	return $result;
	}
}



