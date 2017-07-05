<?php

namespace RaspberryPiIOBundle\Services;

use Symfony\Component\HttpFoundation\Response;

class TemperatureService
{  
	function getSensorNameArray()
	{
	    $sensorNameArray = [];
	    
	    $file = fopen("/sys/bus/w1/devices/w1_bus_master1/w1_master_slaves", "r");
	
	    if($file)
	    {
			while(($sensor = fgets($file)) !== false)
			{
				array_push($sensorNameArray, trim($sensor));
			}
	    
	    	fclose($file);
	    } 
	    
	    return $sensorNameArray;
	}
	
	function getValue($sensor)
	{
    	$filename = "/sys/bus/w1/devices/" . $sensor . "/w1_slave";
    	
    	$file = fopen($filename, "r");
    	
    	$temperature = 0;
    
    	if($file)
    	{   
        	$termometerReading = fread($file, filesize($filename));
        
        	fclose($file);
         
    		preg_match("/t=(.+)/", preg_split("/\n/", $termometerReading)[1], $matches);
        	
        	$temperature = $matches[1] / 1000;
    	}
    	
    	return $temperature;
	}
}



