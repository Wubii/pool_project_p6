<?php

namespace ControlBundle\Services;

use Symfony\Component\HttpFoundation\Response;

class PumpService
{ 
	function getNameArray()
	{
		$pumpArray = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbPump')->findAll();
		$nameArray = [];
		
		foreach($pumpArray as $pump)
		{
			$nameArray[] = $pumps->getName();
		}
		
		return $nameArray;
	}
	
	function getPumpState($name)
	{
	//	$pumpState = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbPumpRepository')->findBy($name);
	}
}
