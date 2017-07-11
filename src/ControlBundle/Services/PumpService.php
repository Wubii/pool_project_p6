<?php

namespace ControlBundle\Services;

class PumpService
{ 
	private $em = null;
    
    public function __construct(Doctrine\ORM\EntityManager $em) 
    { //Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
    }
    
	function getNameArray()
	{
		$pumpArray = $em->getRepository('ControlBundle:MbPump')->findAll();
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
