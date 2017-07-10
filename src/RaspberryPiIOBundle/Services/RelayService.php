<?php

namespace RaspberryPiIOBundle\Services;

use Symfony\Component\HttpFoundation\Response;

class RelayService
{  
	const RELAY_1 = "relay1";
	const RELAY_2 = "relay2";
	const RELAY_3 = "relay3";
	
	const RELAY_ON = "0";
	const RELAY_OFF = "1";
	
	public function __construct()
	{
		// system("gpio write 0 1");
		// system("gpio write 1 1");
		// system("gpio write 2 1");
		
		exec("gpio mode 0 out");
		exec("gpio mode 1 out");
		exec("gpio mode 2 out");
	}
	
	function getNameArray()
	{
	    $relayNameArray[] = self::RELAY_1;
	    $relayNameArray[] = self::RELAY_2;
	    $relayNameArray[] = self::RELAY_3;
	    
	    return $relayNameArray;
	}
	
	function getValue($relay)
	{	
		$result;
		
    	switch($relay)
    	{
    		case self::RELAY_1:
    			$result = exec("gpio read 0");
    			break;
    			
    		case self::RELAY_2:
    			$result = exec("gpio read 1");
    			break;
    			
    		case self::RELAY_3:
    			$result = exec("gpio read 2");
    			break;
    			
    		default:
    			$result = "";
    	}

    	if($result == "0")
    	{
    		$result = true;
    	}
    	elseif($result == "1")
    	{
    		$result = false;
    	}
    	else
    	{
    		$result = false;
    	}
    	
    	return $result;
	}
	
	function setValue($relay, $value)
	{	
		if(!is_bool($value))
		{
			return false;
		}
		
		$value = $value ? "0" : "1";
		
    	switch($relay)
    	{
    		case self::RELAY_1:
    			exec("gpio write 0 " . $value);
    			break;
    			
    		case self::RELAY_2:
    			exec("gpio write 1 " . $value);
    			break;
    			
    		case self::RELAY_3:
    			exec("gpio write 2 " . $value);
    			break;
    			
    		default:
    			return false;
    	}
    	
    	return true;
	}
}

