<?php

namespace ControlBundle\Services;

use Doctrine\ORM\EntityManager;

use RaspberryPiIOBundle\Services\LightService;

class LightThresholdService
{ 
	private $em = null;
	private $ls = null;
    
    public function __construct(EntityManager $em, LightService $ls) 
    { 
    	//Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
        $this->ls = $ls;
    }
    
	public function isSunny()
	{
		$setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array("name" => "setup"));
	    $luminosityThreshold = $setup->getLuminosityThreshold();
	    
	    $luminosityValue = $this->ls->getValue($setup->getLuminosity()->getSerialNumber());
	    
	    // luminosity < lightValue = 1, sunny
	    // luminosity > lightValue = 0, cloudy
	    $weather = true;
	    
	    if($luminosityValue < $luminosityThreshold )
	    {
	    	// Cloudy
	    	$weather = false;
	    }
	    else
	    {
	    	// Sunny
	    	$weather = true;
	    }
	    
        return $weather;
	}
}
