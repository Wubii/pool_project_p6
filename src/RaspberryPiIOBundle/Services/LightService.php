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
    			$file = fopen("/var/www/pool.com/data/light.txt", "r");
    			$result = 100 - intval(floatval(trim(fgets($file))) * 100);
    			fclose($file);
    			break;
    			
    		default:
    			$result = 0;
    	}
    	
    	return $result;
	}
}



