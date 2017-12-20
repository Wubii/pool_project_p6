<?php

namespace ControlBundle\Services;

use Doctrine\ORM\EntityManager;

use RaspberryPiIOBundle\Services\TemperatureService;
use RaspberryPiIOBundle\Services\LightService;

class SensorService
{ 
	private $em = null;
	private $ts = null;
	private $ls = null;
    
    public function __construct(EntityManager $em, TemperatureService $ts, LightService $ls) 
    { 
    	//Son constructeur avec l'entity manager en paramètre
        $this->em = $em;
        $this->ts = $ts;
        $this->ls = $ls;
    }
    
	public function getAirTemp()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
	    return $this->ts->getValue($setup->getAirTemp()->getSerialNumber());
	}
    
	public function getPoolTemp()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
	    return $this->ts->getValue($setup->getPoolTemp()->getSerialNumber());
	}
    
	public function getPanelTemp()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
	    return $this->ts->getValue($setup->getPanelTemp()->getSerialNumber());
	}
    
	public function getLuminosity()
	{
	    $setup = $this->em->getRepository('ControlBundle:MbSetup')->findOneBy(array('name' => 'Setup'));
		
	    return $this->ls->getValue($setup->getLuminosity()->getSerialNumber());
	}
}
