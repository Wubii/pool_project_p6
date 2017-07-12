<?php

namespace ControlBundle\Services;

use Doctrine\ORM\EntityManager;

class PumpService
{ 
	private $em = null;
    
    public function __construct(EntityManager $em) 
    { //Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
    }
    
	function getNameArray()
	{
		$pumpArray = $this->em->getRepository('ControlBundle:MbPump')->findAll();
		$nameArray = [];
		
		foreach($pumpArray as $pump)
		{
			$nameArray[] = $pump->getName();
		}
		
		return $nameArray;
	}
	
	function getPumpState($name)
	{
		$pump = $this->em->getRepository('ControlBundle:MbPump')->findOneBy(array("name" => $name));
		
		return $pump->getState();
	}
	
	function setPumpState($name, $value)
	{
		$pump = $this->em->getRepository('ControlBundle:MbPump')->findOneBy(array("name" => $name));
		
		if($pump)
		{
			$pump->setState($value);
			
			$this->em->persist($pump);
			
			$this->em->flush();
		}
		
		return $value;
	}
}
